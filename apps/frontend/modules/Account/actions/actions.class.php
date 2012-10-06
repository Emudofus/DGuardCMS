<?php

/**
 * Account actions.
 *
 * @package    DGuardCMS
 * @subpackage Account
 * @author     Andaeriel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AccountActions extends sfActions
{
	public function executeLog(sfWebRequest $request)
	{
		if ($this->getUser()->isAuthenticated())
		{
			$this->getUser()->logOut();
		}
		else
		{
			//code against brute force
			$time = sfDbConfigHandler::get('log_wait');
			$max = sfDbConfigHandler::get('log_max');
			if (!isset($_SESSION['log_try']))
			{
				$_SESSION['log_try'] = array('wait' => strtotime($time), 'count' => 0);
			}
			++$_SESSION['log_try']['count']; //here, because the check is just lower
			if (-1 != $max && $_SESSION['log_try']['count'] > $max)
			{
				if ($_SESSION['log_try']['wait'] < time())
				{ //reset
					$_SESSION['log_try'] = array('wait' => strtotime($time), 'count' => 1);
				}
				else
				{
					$this->wait = $_SESSION['log_try']['wait'];
					return sfView::ERROR;
				}
			}

			$this->forward404Unless($username = $request->getParameter('username'));
			$this->forward404Unless($password = $request->getParameter('password'));

			$this->account = Doctrine_Core::getTable('Account')
							->findOneByUsernameAndPasswordAndBanned($username, $password, false);
			if ($this->account)
			{
				/**
				$this->forward404If($this->account->getValidationToken());
				 */
				$this->getUser()->logIn($this->account);
				unset($_SESSION['log_try']); //reset attempts infos
			}
		}
	}

	public function executeStaff(sfWebRequest $request)
	{
		$this->staff = Doctrine_Query::create()
						->from('Account a')
							->leftJoin('a.Ranks r')
						->where('a.gmlevel > 0')
						->execute();
	}

	public function executeNew(sfWebRequest $request)
	{
//		$this->forward404If($this->getUser()->hasLevel(myUser::LEVEL_LOGGED));
		$this->form = new FrontendAccountForm();
	}
	public function executeCreate(sfWebRequest $request)
	{
		$this->forward404If($this->getUser()->hasLevel(myUser::LEVEL_LOGGED));
		$this->form = new FrontendAccountForm();

		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			/**This is a bench of lines used for send a validation-mail
			$validationToken = rand(0, 999999999);
			$account = $form->getObject();
			$account->setValidationToken($validationToken);
			$account->save();

			$subject = sprintf(__('Your account on %s'), sfDbConfigHandler::get('app_infos_name'));
			$mail = "
Hi %name% %prenom%.<br /><br />\n
You just subscribed to %server% (if you don't, just don't reply/click this mail).<br />
For play, you need to validate your account first. You just have to click here: <a href=\"%link%\">Validate!</a> (if you can't click on the link, paste this in your adress bar: %link%).\n
<br /><br />
Thank for you registration, %server%'s Team.";
			$mail = __($mail, array(
				//not secure !
					'%name%' => strtoupper($account->getNom()),
					'%prenom%' => ucfirst(strtolower($account->getPrenom)),
					'%link%' => url_for($this->getModuleName().'/validation?id='.$account->getId().'&token='.$validationToken),
					'%server%' => sfDbConfigHandler::get('app_infos_name'),
				);
			$this->getMailer()->composeAndSend(sfDbConfigHandler::get('app_infos_mail'), $account->getMail(), $subject, $mail);
			 */
			$account = $form->save();
			$this->redirect('@log?username=' . $account->getUsername() . '&password=' . $account->getPassword());
		}
	}

	public function executeValidation(sfWebRequest $request)
	{
		$this->forward404(); //not used
		$this->forward404Unless($accountID = $request->getParameter('id'));
		$this->forward404Unless($account = Doctrine_Core::getTable('Account')->find($accountID));

		$this->forward404Unless($account->getValidationToken()); //already validated

		$account->setValidationToken(null);
		$account->save();

		$this->redirect('@log?username=' . $account->getUsername() . '&password=' . $account->getPassword());
	}

	public function executeJoin(sfWebRequest $request)
	{ }

	public function executeVote(sfWebRequest $request)
	{
		$this->forward404Unless($id = sfDbConfigHandler::get('vote_id'));
		$this->forward404Unless($earn = sfDbConfigHandler::get('vote_value'));

		if ($this->getUser()->isAuthenticated())
		{ //sorry, Mr anonymous, but you'll ony get ... a big thanks (and a maybe smack from the server admin, who knows ?)
			$timestamp = $this->getUser()->getAccount()->getTimestamp();
			if (empty($timestamp) //empty timestamp / time is later than timestamp+2.to_hours
			 || time() > strtotime('+2 hours', $timestamp)) //strtotime is not JUST returning
			{ //you can only vote each 2 hours
				$this->getUser()->getAccount()->addPoints($this->earnedPoints = $earn); //credit account
				$this->getUser()->getAccount()->setTimestamp(time()); //update last vote timestamp
			}
			else
			{
				$this->earnedPoints = -1;
			}
		}

		$this->getResponse()->addHttpMeta('refresh', '1; url=http://www.rpg-paradize.com/?page=vote&vote='.$id);
	}

	public function executeCredit(sfWebRequest $request)
	{ //@todo move this to a self-dedicated class
		$this->forward404Unless($this->getUser()->isAuthenticated()); //only logged users
		$this->forward404Unless($this->type = sfDbConfigHandler::get('pass_type'));
		$this->forward404Unless($this->pointsToEarn = sfDbConfigHandler::get('pass_value'));

		switch ($this->type)
		{
			case 'star':
				$code = $request->getParameter('code1');
				$this->forward404Unless($this->idd = sfDbConfigHandler::get('pass_idd'));
			break;
			default: //unexistant type
				$this->forward404();
		}

		if (null === $code)
		{
			$this->setTemplate('creditPrepare'.ucfirst($this->type));
		}
		else
		{ //submitted
			switch ($this->type)
			{
				case 'star':
					$idp = $request->getParameter('idp');
					$datas = $request->getParameter('DATAS');
					$url = sprintf('http://script.starpass.fr/check_php.php?ident=%s;;%s&codes=%s&DATAS=%s', $idp, $this->idd, $code, $datas);
					$this->code_valid = 'OUI' === substr(file_get_contents($url), 0, 3);
				break;
			}

			if ($this->code_valid)
			{
				$this->getUser()->getAccount()->addPoints($this->pointsToEarn);
			}
		}
	}
}
