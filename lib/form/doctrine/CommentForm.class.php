<?php

/**
 * Comment form.
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentForm extends BaseCommentForm
{
	public function configure()
	{
		$this->useFields(array('content'));
		$this->widgetSchema['content'] = new sfWidgetFormTextarea();
		$this->widgetSchema->setLabels(array('content' => sfContext::getInstance()->getI18N()->__('Comment')));
	}
}