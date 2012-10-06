<?php

/**
 * Account filter form.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AccountFormFilter extends BaseAccountFormFilter
{
	public function configure()
	{
		unset($this['password'], $this['timestamp']);
	}
}
