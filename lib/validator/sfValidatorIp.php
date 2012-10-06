<?php
/**
 * sfValidatorIP validates an input value if it's a correct IPv4.
 *
 * @package    nPHP fw symfony
 * @subpackage validator
 * @author     Nami-D0C
 * @version    SVN: $Id$
 */
class sfValidatorIp extends sfValidatorBase
{
	/**
	 * @inheritdoc
	 */
	protected function configure($options = array(), $attributes = array())
	{
		$this->addOption('allow_range', false);
		parent::configure($options, $attributes);
	}

	/**
	 * @see sfValidatorBase
	 */
	protected function doClean($value)
	{
		if (4 !== count($value))
		{
			throw new sfValidatorError($this, 'invalid', array('value' => $value));
		}

		foreach ($value as $piece)
		{
			if ((strval(intval($piece)) !== $piece || intval($piece) < 0 || intval($piece) > 255)
			 || ('*' === $piece && !$this->getOption('allow_range')))
			{
				throw new sfValidatorError($this, 'invalid', array('value' => $value));
			}
		}
		return implode('.', $value);
	}
}
