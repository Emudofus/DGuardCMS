<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Item', 'others');

/**
 * BaseItem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $level
 * @property integer $weight
 * @property string $weaponinfo
 * @property integer $twohands
 * @property integer $isethereal
 * @property integer $forgemageable
 * @property integer $isbuff
 * @property integer $usable
 * @property integer $targetable
 * @property integer $price
 * @property string $conditions
 * @property string $stats
 * @property Doctrine_Collection $GiftTemplate
 * 
 * @method integer             getId()            Returns the current record's "id" value
 * @method string              getName()          Returns the current record's "name" value
 * @method integer             getType()          Returns the current record's "type" value
 * @method integer             getLevel()         Returns the current record's "level" value
 * @method integer             getWeight()        Returns the current record's "weight" value
 * @method string              getWeaponinfo()    Returns the current record's "weaponinfo" value
 * @method integer             getTwohands()      Returns the current record's "twohands" value
 * @method integer             getIsethereal()    Returns the current record's "isethereal" value
 * @method integer             getForgemageable() Returns the current record's "forgemageable" value
 * @method integer             getIsbuff()        Returns the current record's "isbuff" value
 * @method integer             getUsable()        Returns the current record's "usable" value
 * @method integer             getTargetable()    Returns the current record's "targetable" value
 * @method integer             getPrice()         Returns the current record's "price" value
 * @method string              getConditions()    Returns the current record's "conditions" value
 * @method string              getStats()         Returns the current record's "stats" value
 * @method Doctrine_Collection getGiftTemplate()  Returns the current record's "GiftTemplate" collection
 * @method Item                setId()            Sets the current record's "id" value
 * @method Item                setName()          Sets the current record's "name" value
 * @method Item                setType()          Sets the current record's "type" value
 * @method Item                setLevel()         Sets the current record's "level" value
 * @method Item                setWeight()        Sets the current record's "weight" value
 * @method Item                setWeaponinfo()    Sets the current record's "weaponinfo" value
 * @method Item                setTwohands()      Sets the current record's "twohands" value
 * @method Item                setIsethereal()    Sets the current record's "isethereal" value
 * @method Item                setForgemageable() Sets the current record's "forgemageable" value
 * @method Item                setIsbuff()        Sets the current record's "isbuff" value
 * @method Item                setUsable()        Sets the current record's "usable" value
 * @method Item                setTargetable()    Sets the current record's "targetable" value
 * @method Item                setPrice()         Sets the current record's "price" value
 * @method Item                setConditions()    Sets the current record's "conditions" value
 * @method Item                setStats()         Sets the current record's "stats" value
 * @method Item                setGiftTemplate()  Sets the current record's "GiftTemplate" collection
 * 
 * @package    DGuardCMS
 * @subpackage model
 * @author     Andaeriel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseItem extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('items_data');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('type', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('level', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('weight', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('weaponinfo', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('twohands', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('isethereal', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('forgemageable', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('isbuff', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('usable', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('targetable', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('price', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('conditions', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('stats', 'string', null, array(
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
        $this->hasMany('GiftTemplate', array(
             'local' => 'id',
             'foreign' => 'items'));
    }
}