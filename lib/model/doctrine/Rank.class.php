<?php

/**
 * Rank
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    DGuardCMS
 * @subpackage model
 * @author     Andaeriel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Rank extends BaseRank
{
	public function getName()
	{
		return sfContext::getInstance()->getI18n()->__($this->_get('name'));
	}
}