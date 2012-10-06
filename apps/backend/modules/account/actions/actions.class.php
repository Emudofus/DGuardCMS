<?php

require_once dirname(__FILE__).'/../lib/accountGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/accountGeneratorHelper.class.php';

/**
 * account actions.
 *
 * @package    DGuardCMS
 * @subpackage account
 * @author     Andaeriel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class accountActions extends autoAccountActions
{
	public function executeBatchBan(sfWebRequest $request)
	{
		$ids = $request->getParameter('ids');
		$accounts = Doctrine_Core::getTable('Account')->ban($ids);

		$this->getUser()->setFlash('notice', 'The selected accounts have been banned successfully.');
	}
	public function executeBatchUnban(sfWebRequest $request)
	{
		$ids = $request->getParameter('ids');
		$accounts = Doctrine_Core::getTable('Account')->unBan($ids);

		$this->getUser()->setFlash('notice', 'The selected accounts have been unbanned successfully.');
	}

	public function executeListBan(sfWebRequest $request)
	{
		$account = $this->getRoute()->getObject();
		$account->setBanned(true);
		$account->save();

		$this->getUser()->setFlash('notice', 'The selected account have been banned successfully.');
		$this->redirect('account');
	}
	public function executeListUnban(sfWebRequest $request)
	{
		$account = $this->getRoute()->getObject();
		$account->setBanned(false);
		$account->save();

		$this->getUser()->setFlash('notice', 'The selected account have been unbanned successfully.');
		$this->redirect('account');
	}

	//should I to move this ?
	public function executeNewMail(sfWebRequest $request)
	{
		 $this->form = new MailForm();
	}
	public function executeCreateMail(sfWebRequest $request)
	{
		$this->form = new MailForm();
		$this->form->bind($request->getParameter('mail'));
		if ($this->form->isValid())
		{
			$accounts = Doctrine_Query::create()
									->select('mail')
										->from('Account')
									->where('gmlevel >= ?', $this->form['gmlevel'])
									->fetchArray();
			$emails = array();
			foreach ($accounts as $account)
			{
				$emails[] = $account['mail'];
			}

			$this->getMailer()->composeAndSend(
			 array(sfConfig::get('app_bot_mail') => sfConfig::get('app_bot_name')),
			 $emails,
			 $form['subject'],
			 $form['message']);
		}
		else
		{
			$this->setTemplate('newMail');
		}
	}
}
