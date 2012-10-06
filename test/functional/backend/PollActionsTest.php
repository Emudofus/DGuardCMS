﻿<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser
->get('/Poll/index')
	->with('request')->begin()
		->isParameter('module', 'Poll')
		->isParameter('action', 'index')
	->end()
	->with('response')->begin()
		->isStatusCode(200)
		->checkElement('body', '!/This is a temporary page/')
	->end()
->get('Poll/new')
	->with('request')->begin()
		->isParameter('module', 'Poll')
		->isParameter('action', 'index')
	->end()
	->with('response')->begin()
		->isStatusCode(200)
		->checkElement('body', '!/This is a temporary page/')
	->end();