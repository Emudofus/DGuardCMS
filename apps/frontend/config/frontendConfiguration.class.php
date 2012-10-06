<?php

class frontendConfiguration extends sfApplicationConfiguration
{
	public function configure()
	{
		//Andaeriel: I don't need this here
		$this->dispatcher->connect('context.load_factories', array($this, 'loadExtraFactories'));
	}

	public function loadExtraFactories(sfEvent $event)
	{
		$event->getSubject()->set('IG_inflector', new IGInflector());
	}
}
