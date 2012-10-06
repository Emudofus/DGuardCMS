<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('NpcQuestion', 'others');

/**
 * BaseNpcQuestion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $npcid
 * @property integer $questionid
 * @property string $responses
 * @property Npc $Npc
 * 
 * @method integer     getNpcid()      Returns the current record's "npcid" value
 * @method integer     getQuestionid() Returns the current record's "questionid" value
 * @method string      getResponses()  Returns the current record's "responses" value
 * @method Npc         getNpc()        Returns the current record's "Npc" value
 * @method NpcQuestion setNpcid()      Sets the current record's "npcid" value
 * @method NpcQuestion setQuestionid() Sets the current record's "questionid" value
 * @method NpcQuestion setResponses()  Sets the current record's "responses" value
 * @method NpcQuestion setNpc()        Sets the current record's "Npc" value
 * 
 * @package    DGuardCMS
 * @subpackage model
 * @author     Andaeriel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseNpcQuestion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('npc_question');
        $this->hasColumn('npcid', 'integer', 3, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 3,
             ));
        $this->hasColumn('questionid', 'integer', 3, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 3,
             ));
        $this->hasColumn('responses', 'string', null, array(
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
        $this->hasOne('Npc', array(
             'local' => 'npcid',
             'foreign' => 'id'));
    }
}