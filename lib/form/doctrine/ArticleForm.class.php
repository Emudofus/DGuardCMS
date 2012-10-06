<?php

/**
 * Article form.
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleForm extends BaseArticleForm
{
	public function configure()
	{ //should I use ArticleTable::getInstance ... ?
		$this->useFields(Doctrine_Core::getTable('Article')->getBaseFields());
		$this->widgetSchema['content'] = new sfWidgetFormTextarea();
	}
}
