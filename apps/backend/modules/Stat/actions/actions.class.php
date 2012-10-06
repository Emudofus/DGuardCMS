<?php

/**
 * Stats actions.
 *
 * @package    DGuardCMS
 * @subpackage Stats
 * @author     Andaeriel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StatActions extends sfActions
{
	public function executeIndex()
	{
		//yeah, it's not the better way because it's expensive
		$this->tables = array(
				'Article',
				'Comment',
				'Account',
				array('name' => 'Account', 'conds' => array('gmlevel > ?' => 0), 'alias' => 'Staff'),
				'Rank',
				'Poll',
				'PollOption',
				'Rule',
				'FAQ',
				'Server',
				array('name' => 'Zaap', 'col' => 'mapid'),
				array('name' => 'Zaapi', 'col' => 'mapid'),
				'Exp',
				'ShopItem',
		);
		foreach ($this->tables as $table)
		{
			if (!is_array($table))
			{
				$table = array('name' => $table);
			}

			$col = isset($table['col'])?$table['col']:Doctrine_Core::getTable($table['name'])->getIdentifier();
			$q = Doctrine_Query::create()
							->select('COUNT('.$col.') as count')
								->from($table['name']);
			if (isset($table['conds']))
			{
				foreach ($table['conds'] as $cause)
				{
					call_user_func_array(array($q, 'where'), $clause));
				}
			}
			$q = $q->fetchOne();

			if (isset($table['alias']))
				$region = $table['alias'];
			else
				$region = $table['name'] . 's';
			$this->$region = $q['count'];
		}
		/**Nami-Doc: sadly mysql (and surely other(s)) does not permit this (lower count when many count() ...)
		$tablesByCnx = array();
		foreach ($tables as $table)
		{
			if (!is_array($table))
			{
				$table = array('name' => $table);
			}
			$table['col'] = isset($table['col'])?$table['col']:Doctrine_Core::getTable($table['name'])->getIdentifier();

			$cnx = ''.Doctrine_Manager::getInstance()->getConnectionForComponent($table['name']);
			if (!isset($tablesByCnx[$cnx]))
			{
				$tablesByCnx[$cnx] = array();
			}

			$name = $table['name'];
			unset($table['name']);
			$tablesByCnx[$cnx][isset($table['conds'])?'+':'-'][$name] = $table;
		}

		foreach ($tablesByCnx as $tables)
		{ //I can't use double-level foreach directly here (btw it requires PHP gte 5.3)
			foreach ($tables['+'] as $name => $opts)
			{
				$q = Doctrine_Query::create()
							->select('COUNT('.$opts['col'].') as count')
								->from($name);
				foreach ($opts['conds'] as $clause => $param)
				{
					call_user_func_array(array($q, 'where'), array_merge($clause, $param));
				}

				if (isset($opts['alias']))
					$region = $opts['alias'];
				else
					$region = $opts['name'] . 's';

				$q = $q->fetchOne();
				$this->$region = $q['count'];
				$q->free();
			}
			$cols = array();
			foreach ($tables['-'] as $name => $opts)
			{ //it's useless to use alias in "as c...": alias have conds
				$cols[] = sprintf('COUNT(%1$s.%2$s) as c%1$s', $name, $opts['col']);
			}
			$q = Doctrine_Query::create()
							->select(implode(', ', $cols))
								->from(implode(', ', array_keys($tables['-'])))
							->fetchArray();
			var_dump($q);exit;
		}
		*/
	}
}
