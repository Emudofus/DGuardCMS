<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');
//@todo: move this to a "DGTestFunctional class
$user = sfContext::getInstance()->getUser();
$user->logIn(Doctrine_Core::getTable('Account')->findOneByUsernameAndPassword('yop', 'yop'));

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  get('/account/index')->

  with('request')->begin()->
    isParameter('module', 'account')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->
    checkElement('body', '!/Erreur/')->
  end()
;
