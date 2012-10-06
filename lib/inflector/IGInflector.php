<?php
/**
 * IGInflector inflexizes all names related to Dofus
 *
 * @package    DGuardCMS
 * @subpackage inflector
 * @author     Andaeriel
 * @version    SVN: $Id$
 */
class IGInflector
{
	protected $sexes = array(
			0 => 'Male',
			1 => 'Female',
		),

		$effects = array(
			111 => 'AP',
			128 => 'MP',
			117 => 'Scope', //@todo (LoS ?)
			112 => 'Damages',
			138 => '% Damages',
			225 => 'Trap damages',
			226 => '% Trap damages',
			115 => 'Critical Hits',
			158 => 'Weight',
			176 => 'Exploration', //@todo
			178 => 'Heal',
			174 => 'Initiative',
			125 => 'Vitality',
			124 => 'Wisdom',
			118 => 'Strenght',
			126 => 'Intelligence',
			123 => 'Chance',
			119 => 'Agility',
			214 => '%Neutral res',
			210 => '%Earth res',
			213 => '%Fire res',
			211 => '%Water res',
			212 => '%Wind res',
			244 => 'Neutral res',
			240 => 'Earth res',
			243 => 'Fire res',
			241 => 'Water res',
			242 => 'Wind res',
			214 => '%Neutral res(PvP)',
			210 => '%Earth res(PvP)',
			213 => '%Fire res(PvP)',
			211 => '%Water res(PvP)',
			212 => '%Wind res(PvP)',
			264 => 'Neutral res(PvP)',
			260 => 'Earth res(PvP)',
			263 => 'Fire res(PvP)',
			261 => 'Water res(PvP)',
			262 => 'Wing res(PvP)',
			101 => 'PA lost to the cible',
			141 => 'Kill the cible',
			100 => 'Neutral damages',
			97 => 'Earth damages',
			99 => 'Fire damages',
			96 => 'Water damages',
			98 => 'Wing damages',
			92 => 'Earth life stealing',
			94 => 'Fire life stealing',
			91 => 'Water life stealing',
			93 => 'Wind life stealing',
		),
		$reverseEffects = array(
			153 => 125,
			156 => 124,
			157 => 118,
			155 => 126,
			152 => 123,
			154 => 119,
		);

	public function getSexe($sexe)
	{
		if ($this->hasSexe($sexe))
			return sfContext::getInstance()->getI18n()->__($this->sexes[$sexe]);

		return $sexe; //rather than returning null or throwing an exception
	}
	public function hasSexe($sexe)
	{
		return isset($this->sexes[$sexe]);
	}

	public function getEffect($effect)
	{
		if (!is_integer($effect))
			$effect = hexdec($effect);

		if ($this->hasEffect($effect))
			return __($this->effects[$effect]);

		return null;
	}
	public function hasEffect($effect)
	{
		return isset($this->effects[$effect]);
	}
	public function parseEffect($effect, $from, $to)
	{
		$effect = hexdec($effect);
		$from = hexdec($from);
		if (null !== $to)
		{
			$to = hexdec($to);
		}

		if (isset($this->reverseEffects[$effect]))
		{ //idea borrowed from Nami-D0Cs :p
			$effect = $this->reverseEffects[$effect];
			$from *= -1;
			if (null !== $to)
			{
				$to *= -1;
			}
		}

		return array($this->getEffect($effect), $from, $to);
	}
	public function parseValue($value)
	{
		if (null === $value)
		{
			return $value;
		}

		$color = $sign = '';
		if ($value > 0)
		{
			$color = 'green';
			$sign = '+';
		}
		else if ($value < 0)
		{
			$color = 'red';
		}
		if ('' !== $color)
		{
			return sprintf('<b style="color: %s;">%s%d</b>', $color, $sign, $value);
		}
		else
		{
			return sprintf('<b>%d</b>', $value);
		}
	}

	public function parseStats($stats, $isMax)
	{
		$stats = explode(',', $stats);
		$html = '';

		foreach ($stats as $stat)
		{
			if ($text = $this->parseStat($stat, $isMax))
				$html .= $text . '<br />';
		}
		return $html;
	}
	public function parseStat($stat, $isMax)
	{
		$stat = explode('#', $stat);
		$effect = $stat[0];
		$from = $stat[1];
		$to = $stat[2];

		if ($isMax)
		{
			if ($to > $from)
			{
				$from = $to;
			}
			$to = null;
		}

		list($effect, $from, $to) = $this->parseEffect($effect, $from, $to);
		if (null === $effect)
		{
			return; //as 209 ...
		}
		$from = $this->parseValue($from);
		$to = $this->parseValue($to);

		if (null === $to)
		{
			return sprintf('%s %s.', $from, $effect);
		}
		else
		{
			return sprintf(sfContext::getInstance()->getI18n()->__('%s to %s %s.'), $from, $to, $effect);
		}
	}
}
