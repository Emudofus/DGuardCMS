<?php

/**
 * Poll form.
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PollForm extends BasePollForm
{
	public function configure()
	{
		$this->useFields(array('name', 'date_start', 'date_end'));

		$this->widgetSchema->setHelp('name', 'You can put the <b>english</b> name, it\'ll be translated');
		$this->validatorSchema['name']->setOption('required', true);

		$this->widgetSchema->setLabel('date_start', 'Start Date');
		$this->widgetSchema->setLabel('date_end', 'End Date');

		$base_date = array('year' => date('Y'), 'month' => date('m'), 'day' => date('d'));
		$years = range($base_date['year'], $base_date['year']+1);
		$years = array_combine($years, $years);
		foreach (array('start', 'end') as $period)
		{
			$this->widgetSchema['date_'.$period]->setOption('can_be_empty', false);
			$this->widgetSchema['date_'.$period]->setOption('empty_values', $base_date);
			$this->widgetSchema['date_'.$period]->setOption('years', $years);
		}

		$this->validatorSchema->setPostValidator(new sfValidatorSchemaCompare('date_start', sfValidatorSchemaCompare::LESS_THAN_EQUAL, 'date_end'));
	}
}
