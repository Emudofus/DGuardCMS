<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Pano', 'others');

/**
 * BasePano
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nom
 * @property string $items
 * @property string $effects2
 * @property string $effects3
 * @property string $effects4
 * @property string $effects5
 * @property string $effects6
 * @property string $effects7
 * @property string $effects8
 * 
 * @method integer getId()       Returns the current record's "id" value
 * @method string  getNom()      Returns the current record's "nom" value
 * @method string  getItems()    Returns the current record's "items" value
 * @method string  getEffects2() Returns the current record's "effects2" value
 * @method string  getEffects3() Returns the current record's "effects3" value
 * @method string  getEffects4() Returns the current record's "effects4" value
 * @method string  getEffects5() Returns the current record's "effects5" value
 * @method string  getEffects6() Returns the current record's "effects6" value
 * @method string  getEffects7() Returns the current record's "effects7" value
 * @method string  getEffects8() Returns the current record's "effects8" value
 * @method Pano    setId()       Sets the current record's "id" value
 * @method Pano    setNom()      Sets the current record's "nom" value
 * @method Pano    setItems()    Sets the current record's "items" value
 * @method Pano    setEffects2() Sets the current record's "effects2" value
 * @method Pano    setEffects3() Sets the current record's "effects3" value
 * @method Pano    setEffects4() Sets the current record's "effects4" value
 * @method Pano    setEffects5() Sets the current record's "effects5" value
 * @method Pano    setEffects6() Sets the current record's "effects6" value
 * @method Pano    setEffects7() Sets the current record's "effects7" value
 * @method Pano    setEffects8() Sets the current record's "effects8" value
 * 
 * @package    DGuardCMS
 * @subpackage model
 * @author     Andaeriel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePano extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('items_pano');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('nom', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('items', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('effects2', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('effects3', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('effects4', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('effects5', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('effects6', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('effects7', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('effects8', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}