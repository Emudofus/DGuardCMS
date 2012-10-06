<?php

class myUser extends sfBasicSecurityUser
{
	protected $account = null;

	const LEVEL_ANONYMOUS = -1,
		LEVEL_LOGGED = 0,
		LEVEL_MOD = 1,
		LEVEL_GM = 2,
		LEVEL_ADM = 3;

	/**
	 * determinates if the current user is logged on or not
	 *
	 * @return bool status
	 */
	public function isAuthenticated()
	{
		return (bool) $this->getAccount();
	}

	/**
	 * return the Account instance associated to the user.
	 * If the user is not logged, return null
	 *
	 * @return Account current account
	 */
	public function getAccount()
	{
		if (isset($_SESSION['id']))
		{
			if (null === $this->account)
			{
				$accountQ = Doctrine_Query::create()
									->from('Account a')
										->leftJoin('a.Comments c')
										->leftJoin('a.Contact co')
										->leftJoin('a.Votes v')
											->leftJoin('v.Option o')
									->where('id = ?', $_SESSION['id']);
				if ($this->hasCredential('article.manage'))
					$accountQ->leftJoin('a.Articles ar');

				$this->account = $accountQ->fetchOne();
				$accountQ->free();

				if (false === $this->account)
				{
					$this->logOut();
					return null;
				}

				if ($this->account->getGmlevel() != $_SESSION['level'])
				{ //level changed (i.e. in the admin panel)
					$this->refreshCredentials($this->account->getGmlevel());
					$_SESSION['level'] = $this->account->getGmlevel();
				}
			}
			return $this->account;
		}
		else
			return null;
	}
	/**
	 * update the info based on a Account Record
	 *
	 * @param Account $account infos
	 */
	public function logIn(Account $account)
	{
		$this->account = $account;
		$this->refreshCredentials($account->getGmlevel());
		$_SESSION['id'] = $account->getId();
		$_SESSION['level'] = $account->getGmlevel(); //@see self::getAccount()
	}
	/**
	 * unlog the current user
	 */
	public function logOut()
	{
		$this->account = null;
		$this->clearCredentials();
		unset($_SESSION['id'], $_SESSION['level']);
	}
	/**
	 * refresh the credentials
	 *
	 * @var int $level GMLevel
	 */
	protected function refreshCredentials($level)
	{
		$this->clearCredentials();
		switch ($level)
		{
			case self::LEVEL_ADM:
				$this->addCredentials('admin', 'article.manage');
			case self::LEVEL_GM:
				$this->addCredentials('gm');
			case self::LEVEL_MOD:
				$this->addCredentials('mod', 'comment.manage');
			case self::LEVEL_LOGGED:
				$this->addCredentials('comment.create', 'poll.vote', 'contact.create');
		}
	}
	/**
	 * check the level required
	 *
	 * @param int $required Required level
	 * @param bool $reverse if the user must NOT have this level
	 */
	public function hasLevel($required, $reverse = false)
	{
		if ($this->isAuthenticated())
			$level = $this->getAccount()->getGmlevel();
		else
			$level = self::LEVEL_ANONYMOUS;

		if ($reverse) //must NOT have
			return $level < $required;
		else
			return $level >= $required;
	}
	/**
	 * return the level as a string
	 *
	 * @return string level (I18n)
	 */
	public function getLevel()
	{
		if ($this->isAuthenticated())
			$level = $this->getAccount()->getGmlevel();
		else
			$level = self::LEVEL_ANONYMOUS;

		$ranks = self::getRanks();
		return $ranks[$level];
	}

	public function canComment(Article $article)
	{
		return $this->hasCredential('comment.manage')
		 || ($this->hasCredential('comment.create')
		  && !$this->getAccount()->hasCommented($article)
		  && !$article->getDeletedAt() );
	}

	public static function getRanks($expanded = true)
	{
		$ranks = array();
		if ($expanded)
		{
			$ranks += array(self::LEVEL_ANONYMOUS => sfContext::getInstance()->getI18n()->__('Visitor'));
		}
		return $ranks + array(
				self::LEVEL_LOGGED => sfContext::getInstance()->getI18n()->__('Player'),
				self::LEVEL_MOD => sfContext::getInstance()->getI18n()->__('Moderator'),
				self::LEVEL_GM => sfContext::getInstance()->getI18n()->__('Master of Game'),
				self::LEVEL_ADM => sfContext::getInstance()->getI18n()->__('Administrator'),
			);
	}

	public function setFlash($name, $value, $persist = true)
	{
		parent::setFlash($name, sfContext::getInstance()->getI18n()->__($value), $persist);
	}

	public function shutdown()
	{
		if ($this->isAuthenticated())
		{
			$this->getAccount()->save();
		}
		parent::shutdown();
	}
}
