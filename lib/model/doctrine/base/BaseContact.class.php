<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Contact', 'accounts');

/**
 * BaseContact
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $author_id
 * @property text $content
 * @property integer $deleted
 * @property Account $Author
 * 
 * @method integer getAuthorId()  Returns the current record's "author_id" value
 * @method text    getContent()   Returns the current record's "content" value
 * @method integer getDeleted()   Returns the current record's "deleted" value
 * @method Account getAuthor()    Returns the current record's "Author" value
 * @method Contact setAuthorId()  Sets the current record's "author_id" value
 * @method Contact setContent()   Sets the current record's "content" value
 * @method Contact setDeleted()   Sets the current record's "deleted" value
 * @method Contact setAuthor()    Sets the current record's "Author" value
 * 
 * @package    DGuardCMS
 * @subpackage model
 * @author     Andaeriel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseContact extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('contact');
        $this->hasColumn('author_id', 'integer', 9, array(
             'type' => 'integer',
             'length' => 9,
             ));
        $this->hasColumn('content', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('deleted', 'integer', 1, array(
             'type' => 'integer',
             'default' => 0,
             'notnull' => true,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Account as Author', array(
             'local' => 'author_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             'updated' => 
             array(
              'disabled' => true,
             ),
             ));
        $this->actAs($timestampable0);
    }
}