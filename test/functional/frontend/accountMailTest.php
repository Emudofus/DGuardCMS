<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser
->get('Account/log/yop/yop')
	->with('request')->begin()
		->isParameter('module', 'account')
		->isParameter('action', 'log')
	->end()
	->with('response')->begin()
		->isStatusCode(200)
		->checkElement('body', '!/This is a temporary page/')
		->checkElement('body', '/yop/')
	->end()
	->with('user')->begin()
		->isAuthenticated()
		->hasCredential('admin')
	->end();