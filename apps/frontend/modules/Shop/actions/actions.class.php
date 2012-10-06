<?php

/**
 * Shop actions.
 *
 * @package    DGuardCMS
 * @subpackage Shop
 * @author     Andaeriel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ShopActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->gifts = Doctrine_Query::create()
									->from('GiftTemplate gt')
										->leftJoin('gt.Item i')
									->execute();
	}
	public function executeShow(sfWebRequest $request)
	{
		$this->forward404If(sfDbConfigHandler::get('shop_expanded'));
		$this->forward404Unless($id = $request->getParameter('id'));
		$this->forward404Unless($this->gift = Doctrine_Query::create()
									->from('GiftTemplate gt')
										->leftJoin('gt.Item i')
									->where('gt.id = ?', $id)
									->fetchOne());
	}

	public function executeBuy(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->isAuthenticated());
		$this->forward404Unless($this->gift = GiftTemplateTable::getInstance()->find($request->getParameter('id')));
		$this->forward404If($this->getUser()->getAccount()->getPoints() < $this->gift->getPrice());

		$this->getUser()->getAccount()->setPoints($this->getUser()->getAccount()->getPoints() - $this->gift->getPrice());

		$record = new GiftAccount;
		$record->setAccount($this->getUser()->getAccount());
		$record->setGift($this->gift);
		$record->save();
	}
}