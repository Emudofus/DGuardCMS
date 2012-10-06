<?php

/**
 * Poll actions.
 *
 * @package    DGuardCMS
 * @subpackage Poll
 * @author     Andaeriel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PollActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$query = Doctrine_Query::create()
					->from('Poll p')
						->leftJoin('p.Options o')
							->leftJoin('o.Polleds po');
#								->leftJoin('po.Account a'); //not needed
		if ($this->getUser()->hasCredential('admin'))
		{
			$this->pager = new sfDoctrinePager('Poll', sfConfig::get('app_polls_by_page'));
			$this->pager->setQuery($query);
			$this->pager->setPage($request->getParameter('page'), 1);
			$this->pager->init();
			$this->polls = $this->pager->getResults();
		}
		else
		{
			$this->polls = $query
					->where('date_start < ?', new Doctrine_Expression('NOW()'))
						->andWhere('date_end > ?', new Doctrine_Expression('NOW()'))
					->execute();
		}
	}
	public function executeShow(sfWebRequest $request)
	{
		$this->forward404Unless($pollID = $request->getParameter('poll'));
		$this->pollQ = Doctrine_Query::create()
									->from('Poll p')
										->leftJoin('p.Options o')
											->leftJoin('o.Polleds po')
										->where('p.id = ?', $pollID);
		if (!$this->getUser()->hasCredential('admin'))
		{
			$this->pollQ
					->where('date_start < ?', new Doctrine_Expression('NOW()'))
						->andWhere('date_end > ?', new Doctrine_Expression('NOW()'));
		}
		$this->poll = $this->pollQ->fetchOne();
		$this->pollQ->free();
		$this->forward404Unless($this->poll);
	}

	public function executeVote(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->hasCredential('poll.vote')); //only logged

		$this->forward404Unless($pollID = $request->getParameter('poll'));
		$poll = Doctrine_Query::create()
							->from('Poll p')
								->leftJoin('p.Options o INDEXBY o.id')
									->leftJoin('o.Polleds po')
								->where('p.id = ?', $pollID)
							->fetchOne();
		$this->forward404Unless($poll);
		$this->forward404If($this->getUser()->getAccount()->hasVoted($poll)); //1/Account
		$option = $poll->Options->get($request->getParameter('option'));

		$vote = new PollAccount();
		$vote->Option = $option;
		$vote->Account = $this->getUser()->getAccount();
		$vote->save();

		$this->redirect('@Poll_show?poll=' . $poll->getId());
	}
}
