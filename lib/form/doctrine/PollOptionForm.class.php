<?php

/**
 * PollOption form.
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PollOptionForm extends BasePollOptionForm
{
	public function configure()
	{
		$this->useFields(array('name'));
		$this->widgetSchema->setHelp('name', 'You can put the <b>english</b> name, it\'ll be translated');
	}
}
