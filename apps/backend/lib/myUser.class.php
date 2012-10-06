<?php
//common file for both app
require_once dirname(__FILE__) . '/../../frontend/lib/myUser.class.php';
if(!class_exists('myUser',false)) {
//If you don't know why this is needed: the symfony autoloader search all classes declarations, but don't look at include(s)/require(s)
	class myUser
	{
	}
}