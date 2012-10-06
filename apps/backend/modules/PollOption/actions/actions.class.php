<?php

/**
 * PollOption actions.
 *
 * @package		DGuardCMS
 * @subpackage PollOption
 * @author		 Andaeriel
 * @version		SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PollOptionActions extends sfActions
{
	public function executeNew(sfWebRequest $request)
	{
		$this->forward404Unless($this->poll = Doctrine_Core::getTable('Poll')->find($request->getParameter('poll')));
		$this->form = new PollOptionForm();
	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->form = new PollOptionForm();

		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->form = new PollOptionForm($this->getOption($request));
	}

	public function executeUpdate(sfWebRequest $request)
	{
		$this->form = new PollOptionForm($this->getOption($request));

		$this->processForm($request, $this->form);

		$this->setTemplate('edit');
	}

	public function executeDelete(sfWebRequest $request)
	{
		$poll_option = $this->getOption($request);
		$poll = $poll_option->Poll;

		$poll_option->delete();

		$this->redirect('@Poll_show?id=' . $poll->getId());
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$poll_option = $form->save();
			if ($poll = $request->getParameter('poll'))
			{
				$this->forward404Unless($poll = Doctrine_Core::getTable('Poll')->find($poll));
				$poll_option->Poll = $poll;
				$poll_option->save();
			}
			else
			{
				$poll_option->delete();
				$this->forward404();
			}

			$this->redirect('@Poll_show?id=' . $poll_option->Poll->getId());
		}
	}
	protected function getOption(sfWebRequest $request)
	{
		$this->forward404Unless($poll_optionID = $request->getParameter('option'));
		$this->poll_option = Doctrine_Query::create()
									->from('PollOption o')
										->leftJoin('o.Poll p')
									->where('o.id = ?', $poll_optionID)
									->fetchOne();
		$this->forward404Unless($this->poll_option);
		$this->forward404Unless($this->poll = $this->poll_option->Poll);
		return $this->poll_option;
	}
}
