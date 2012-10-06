<?php

/**
 * sfWidgetFormIp represents an IP widget.
 *
 * @package    nPHP fw symfony
 * @subpackage widget
 * @author     Nami-D0C
 * @version    SVN: $Id$
 */
class sfWidgetFormIp extends sfWidgetForm
{
	/**
 	 * Renders the widget.
	 *
	 * @param  string $name        The element name
	 * @param  string $value       The value selected in this widget
	 * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
	 * @param  array  $errors      An array of errors for the field
	 *
	 * @return string An HTML tag string
	 *
	 * @see sfWidgetForm
	 */
	public function render($name, $value = null, $attributes = array(), $errors = array())
	{
		if (null !== $value && !is_array($value))
		{
			$value = explode('.', $value);
		}
		$name .= '[%s]';

		$inputs = '';
		for ($i = 0; $i < 4; $i++)
		{
			$inputs .= $this->renderTag('input', array('size' => 1, 'value' => isset($value[$i])?$value[$i]:'', 'name' => sprintf($name, $i))).'.';
		}
		return substr($inputs, 0, -1);
	}
}
