<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PollAccount', 'accounts');

/**
 * BasePollAccount
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $poll_option_id
 * @property integer $account_id
 * @property PollOption $Option
 * @property Account $Account
 * 
 * @method integer     getPollOptionId()   Returns the current record's "poll_option_id" value
 * @method integer     getAccountId()      Returns the current record's "account_id" value
 * @method PollOption  getOption()         Returns the current record's "Option" value
 * @method Account     getAccount()        Returns the current record's "Account" value
 * @method PollAccount setPollOptionId()   Sets the current record's "poll_option_id" value
 * @method PollAccount setAccountId()      Sets the current record's "account_id" value
 * @method PollAccount setOption()         Sets the current record's "Option" value
 * @method PollAccount setAccount()        Sets the current record's "Account" value
 * 
 * @package    DGuardCMS
 * @subpackage model
 * @author     Andaeriel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePollAccount extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('poll_account');
        $this->hasColumn('poll_option_id', 'integer', 9, array(
             'type' => 'integer',
             'length' => 9,
             ));
        $this->hasColumn('account_id', 'integer', 9, array(
             'type' => 'integer',
             'length' => 9,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('PollOption as Option', array(
             'local' => 'poll_option_id',
             'foreign' => 'id'));

        $this->hasOne('Account', array(
             'local' => 'account_id',
             'foreign' => 'id'));
    }
}