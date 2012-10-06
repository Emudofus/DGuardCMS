<?php

/**
 * Shop actions.
 *
 * @package		DGuardCMS
 * @subpackage Shop
 * @author		 Andaeriel
 * @version		SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ShopActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->GiftTemplates = Doctrine_Query::create()
										->from('GiftTemplate gt')
											->leftJoin('gt.Item i')
										->execute();
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->form = new GiftTemplateForm();
	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new GiftTemplateForm();

		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->forward404Unless($GiftTemplate = Doctrine_Core::getTable('GiftTemplate')->find(array($request->getParameter('id'))), sprintf('Object GiftTemplate does not exist (%s).', $request->getParameter('id')));
		$this->form = new GiftTemplateForm($GiftTemplate);
	}

	public function executeUpdate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($GiftTemplate = Doctrine_Core::getTable('GiftTemplate')->find(array($request->getParameter('id'))), sprintf('Object GiftTemplate does not exist (%s).', $request->getParameter('id')));
		$this->form = new GiftTemplateForm($GiftTemplate);

		$this->processForm($request, $this->form);

		$this->setTemplate('edit');
	}

	public function executeDelete(sfWebRequest $request)
	{
		$request->checkCSRFProtection();

		$this->forward404Unless($GiftTemplate = Doctrine_Core::getTable('GiftTemplate')->find(array($request->getParameter('id'))), sprintf('Object GiftTemplate does not exist (%s).', $request->getParameter('id')));
		$GiftTemplate->delete();

		$this->redirect('Shop/index');
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$context = sfContext::getInstance();

		$context->getConfiguration()->loadHelpers(array('asset'));

		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$GiftTemplate = $form->getObject();
			$GiftTemplate->name = $GiftTemplate->getItem()->getName();
			$GiftTemplate->img_url = image_path('items/' . $GiftTemplate->items, true);
			$form->save();

			$this->redirect('Shop/edit?id='.$GiftTemplate->getId());
		}
	}
}
