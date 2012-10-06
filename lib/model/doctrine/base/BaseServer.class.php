<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Server', 'others');

/**
 * BaseServer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $ip
 * @property integer $port
 * @property integer $system_port
 * 
 * @method integer getId()          Returns the current record's "id" value
 * @method string  getIp()          Returns the current record's "ip" value
 * @method integer getPort()        Returns the current record's "port" value
 * @method integer getSystemPort()  Returns the current record's "system_port" value
 * @method Server  setId()          Sets the current record's "id" value
 * @method Server  setIp()          Sets the current record's "ip" value
 * @method Server  setPort()        Sets the current record's "port" value
 * @method Server  setSystemPort()  Sets the current record's "system_port" value
 * 
 * @package    DGuardCMS
 * @subpackage model
 * @author     Andaeriel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseServer extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('servers_list');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('ip', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('port', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('system_port', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}