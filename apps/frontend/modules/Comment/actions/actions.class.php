<?php

/**
 * Comment actions.
 *
 * @package    DGuardCMS
 * @subpackage Comment
 * @author     Andaeriel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentActions extends sfActions
{
	protected function retrieveArticle(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->hasCredential('comment.create')); //only registered users

		$this->article = Doctrine_Core::getTable('Article')->find($request->getParameter('article'));
		$this->forward404Unless($this->article); //article *must* exists
	}

	public function executeDelete(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->hasCredential('comment.manage'));

		$this->retrieveArticle($request);
		$commentID = $request->getParameter('comment');
		foreach ($this->article->Comments as $comment)
		{
			if ($comment->getId() == $commentID)
			{
				$commentID = $comment;
				break;
			}
		}
		$this->forward404Unless($comment instanceof Comment);

		$commentID->delete();
	}
	public function executeRestore(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->hasCredential('comment.manage'));
		$this->retrieveArticle($request);
		$commentID = $request->getParameter('comment');
		foreach ($this->article->Comments as $comment)
		{
			if ($comment->getId() == $commentID)
			{
				$commentID = $comment;
				break;
			}
		}
		$this->forward404Unless($comment instanceof Comment);
		$commentID->setDeletedAt(null);
		$commentID->save();
	}
	public function executeCreate(sfWebRequest $request)
	{
		$this->retrieveArticle($request);
		//1 comment / _player_
		$this->forward404Unless($this->getUser()->canComment($this->article));

		$comment = new Comment();
		$comment->Article = $this->article;
		$comment->Author = $this->getUser()->getAccount();

		$form = new CommentForm($comment);
		$form->bind($request->getParameter($form->getName()));
		if ($form->isValid())
		{
			$form->save();
		}
	}

	public function postExecute()
	{
		$this->redirect('@News_show?id=' . $this->article->getId());
	}
}
