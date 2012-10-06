<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Article', 'accounts');

/**
 * BaseArticle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property text $content
 * @property integer $author_id
 * @property Account $Author
 * @property Doctrine_Collection $Comments
 * 
 * @method string              getTitle()     Returns the current record's "title" value
 * @method text                getContent()   Returns the current record's "content" value
 * @method integer             getAuthorId()  Returns the current record's "author_id" value
 * @method Account             getAuthor()    Returns the current record's "Author" value
 * @method Doctrine_Collection getComments()  Returns the current record's "Comments" collection
 * @method Article             setTitle()     Sets the current record's "title" value
 * @method Article             setContent()   Sets the current record's "content" value
 * @method Article             setAuthorId()  Sets the current record's "author_id" value
 * @method Article             setAuthor()    Sets the current record's "Author" value
 * @method Article             setComments()  Sets the current record's "Comments" collection
 * 
 * @package    DGuardCMS
 * @subpackage model
 * @author     Andaeriel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseArticle extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('article');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('content', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('author_id', 'integer', 9, array(
             'type' => 'integer',
             'length' => 9,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Account as Author', array(
             'local' => 'author_id',
             'foreign' => 'id'));

        $this->hasMany('Comment as Comments', array(
             'local' => 'id',
             'foreign' => 'article_id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $softdelete0 = new Doctrine_Template_SoftDelete(array(
             ));
        $this->actAs($timestampable0);
        $this->actAs($softdelete0);
    }
}