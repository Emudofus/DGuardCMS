<?php

/**
 * Rank actions.
 *
 * @package    DGuardCMS
 * @subpackage Rank
 * @author     Andaeriel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StaffActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->staff = Doctrine_Query::create()
									->from('Account a')
										->leftJoin('a.Ranks r')
									->where('a.gmlevel > 0')
									->fetchArray();
	}
	public function executeShow(sfWebRequest $request)
	{
		$this->forward404Unless($userID = $request->getParameter('user'));
		$this->member = Doctrine_Query::create()
										->from('Account a')
											->leftJoin('a.Ranks r')
										->where('a.id = ?', $userID)
										->fetchOne(array(), Doctrine_Core::HYDRATE_ARRAY);
		$this->forward404Unless($this->member);
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->forward404Unless($this->account = Doctrine_Core::getTable('Account')->find($request->getParameter('user')));
		$this->form = new RankForm();
	}
	public function executeCreate(sfWebRequest $request)
	{
		$this->forward404Unless($this->account = Doctrine_Core::getTable('Account')->find($request->getParameter('user')));
		$rank = new Rank();
		$rank->Account = $this->account;
		$this->form = new RankForm($rank);

		$this->processForm($request, $this->form, $this->account);

		$this->setTemplate('edit');
	}

	public function executeDelete(sfWebRequest $request)
	{
		$this->forward404Unless($rank = Doctrine_Core::getTable('Rank')->find($request->getParameter('id')));
		$this->forward404Unless($account = $rank->getAccount());
		$rank->delete();

		$this->redirect('@Rank_show?user='.$account->getId());
	}

	protected function processForm(sfWebRequest $request, sfForm $form, Account $account)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$form->save();

			$this->redirect('@Rank_show?user='.$account->getId());
		}
	}
}
