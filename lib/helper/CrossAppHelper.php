<?php
/**
 * CrossAppHelper.
 *
 * @package    DGuardCMS
 * @subpackage helper
 * @author     Andaeriel
 * @version    SVN: $Id$
 */

/**
 * generates url between two apps
 *
 * @param string $route "app#route(?params)"
 * @param array $params Params to replace
 */
function ca_url_for($route, $extra_parameters = null)
{
	static $env_loaded = array();

	$env = sfConfig::get('sf_environment');
	$host = sfContext::getInstance()->getRequest()->getHost();
	$route = explode('.', $route);
	$app = $route[0];

	if (isset($route[1]))
	{ //we have a Route
		if ('@' === $route[1][0])
		{
			list($route, $parameters) = sfContext::getInstance()->getController()->convertUrlStringToParameters($route[1]);

			if ($parameters)
			{
				$route = $route[1];
			}
			else if (strpos($route, '?'))
			{
				list($route, $parameters) = sfContext::getInstance()->getController()->convertUrlStringToParameters($route[1]);
			}

			if (!in_array($env, $env_loaded))
			{
				$env_loaded[] = $env;
				$routesFile = sprintf('%2$s%1$sapps/%1$s/%3$s%1$sconfig%1$srouting.yml', DIRECTORY_SEPARATOR, sfConfig::get('sf_root_dir'), $app);
				if (file_exists($routesFile))
				{
					$routes = sfYaml::load($routesFile);
				}
				else
				{ //no reason to put this out of the in_array: it'll throw an exception anyway for the 1st call
					throw new InvalidArgumentException('You must pass a valid app');
				}
			}


			if (isset($routes[$route]))
			{
				$route_url = $routes[$route]['url'];

				foreach ($parameters as $key => $value)
				{ #/:k/v
					$route_url = str_replace(':'.$key, $value, $route_url);
					unset($parameters[$key]); //remove this key: processed
				}

				if ('*' === substr($route_url, 0, -1))
				{ //finish by * ? so, remove /*
					$route_url = substr($route_url, -2);
				}
			}
			else
			{
				$route_url = '/'.$route;
			}
		}
		else
		{
			$route_url = '/'.$route[1];
		}
		if ($extra_parameters)
		{
			foreach ($extra_parameters as $key => $value)
			{ //process extra params
				$route_url .= sprintf('/%s/%s', $key, $value);
			}
		}
	}
	else
	{
		$route_url = '';
	}
	if ('dev' === $env || 'frontend' !== $app)
	{
		return sprintf('http://%s/%s%s.php%s', $host, $app, 'dev' == $env ? '_dev' : '', $route_url);
	}
	else
	{
		return sprintf('http://%s%s', $host, $route_url);
	}
}

function ca_link_to($name, $route, $options = array())
{
  $html_options = _convert_options_to_javascript(_parse_attributes($options));

  $absolute = false;
  if (isset($html_options['absolute_url']))
  {
    $html_options['absolute'] = $html_options['absolute_url'];
    unset($html_options['absolute_url']);
  }
  if (isset($html_options['absolute']))
  {
    $absolute = (boolean) $html_options['absolute'];
    unset($html_options['absolute']);
  }

  $html_options['href'] = ca_url_for($route, $absolute);

  if (isset($html_options['query_string']))
  {
    $html_options['href'] .= '?'.$html_options['query_string'];
    unset($html_options['query_string']);
  }

  if (isset($html_options['anchor']))
  {
    $html_options['href'] .= '#'.$html_options['anchor'];
    unset($html_options['anchor']);
  }

  if (is_object($name))
  {
	if ($name instanceof sfCallable)
	{
		$name = $name->call();
	}
    else if (method_exists($name, '__toString'))
    {
      $name = $name->__toString();
    }
    else
    {
      throw new sfException(sprintf('Object of class "%s" cannot be converted to string (Please create a __toString() method/Use a sfCallable object).', get_class($name)));
    }
  }

  if (!strlen($name))
  {
    $name = $html_options['href'];
  }

  return content_tag('a', $name, $html_options);
}

function ca_link_to_if($cond, $name, $route, $options = array())
{
	if ($cond)
	{
		$a=ca_link_to($name, $route, $options);
	}
	else
	{
		return $name;
	}
}
function ca_link_to_unless($cond, $name, $route, $options = array())
{
	return ca_link_to_if(!$cond, $name, $route, $options);
}

function ca_link_to_only_if($cond, $name, $route, $options = array())
{
	if ($cond)
	{
		return ca_link_to($name, $route, $options);
	}
	else
	{
		return '';
	}
}

function ca_link_to_only_unless($cond, $name, $route, $options = array())
{
	return ca_link_to_only_if(!$cond, $name, $route, $options);
}
