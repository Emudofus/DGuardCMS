<?php

/**
 * Poll actions.
 *
 * @package		DGuardCMS
 * @subpackage Poll
 * @author		 Andaeriel
 * @version		SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PollActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->pager = new sfDoctrinePager('Poll', sfConfig::get('app_polls_by_page'));
		
	}
	public function executeShow(sfWebRequest $request)
	{
		$this->forward404Unless($pollID = $request->getParameter('id'));
		$this->poll = Doctrine_Query::create()
									->from('Poll p')
										->leftJoin('p.Options o')
									->where('p.id = ?', $pollID)
									->fetchOne();
		$this->forward404Unless($this->poll);
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->form = new PollForm();
	}
	public function executeCreate(sfWebRequest $request)
	{
		$this->form = new PollForm();

		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->form = new PollForm($this->getRoute()->getObject());
	}
	public function executeUpdate(sfWebRequest $request)
	{
		$this->form = new PollForm($this->getRoute()->getObject());

		$this->processForm($request, $this->form);

		$this->setTemplate('edit');
	}

	public function executeDelete(sfWebRequest $request)
	{
		$request->checkCSRFProtection();

		$this->getRoute()->getObject()->delete();

		$this->redirect('@Poll');
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$poll = $form->save();

			$this->redirect('@Poll_show?id='.$poll->getId());
		}
	}
}
