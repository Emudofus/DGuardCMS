<?php

/**
 * Contact actions.
 *
 * @package    DGuardCMS
 * @subpackage Contact
 * @author     Andaeriel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->hasCredential('admin'));
		$this->pager = new sfDoctrinePager('Contact', sfConfig::get('app_contact_by_page'));
		$this->pager->getQuery()
					->from('Contact c')
						->leftJoin('c.Author a')
					->where('c.deleted = ?', false);
		$this->pager->setPage($request->getParameter('page', 1));
		$this->pager->init();
	}
	public function executeDelete(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->hasCredential('admin'));
		$this->forward404Unless($contact = Doctrine_Core::getTable('Contact')->find($request->getParameter('id')));

		$contact->setDeleted(true);
		$contact->save();

		$this->redirect('Contact/index');
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->isAuthenticated());
		$this->forward404If($this->getUser()->getAccount()->Contact); //one contact / user

		$this->form = new ContactForm();
	}
	public function executeCreate(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->isAuthenticated());
		$this->forward404If($this->getUser()->getAccount()->Contact); //one contact / user
		$this->forward404Unless($this->getUser()->hasCredential('contact.create'));

		$this->form = new ContactForm();

		$this->processForm($request, $this->form);
	}
	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$this->getUser()->getAccount()->setContact($form->save()); //update to refresh the menu
		}
		else
		{
			$this->setTemplate('new');
		}
	}
}
