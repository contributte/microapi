<?php

namespace Minetro\Api\RouteBuilder;

use Minetro\Api\Controller\Controller;
use Minetro\Api\Route;
use Nette\DI\ContainerBuilder;
use Nette\Reflection\ClassType;
use Nette\Utils\Strings;

class ApiRouteBuilder implements RouteBuilder
{

	/**
	 * @param ContainerBuilder $builder
	 *
	 * @return Route[]
	 */
	public function create(ContainerBuilder $builder)
	{
		$routes = [];

		foreach ($builder->findByType(Controller::class) as $definition) {
			$ref = new ClassType($definition->getClass());
			foreach ($ref->getMethods() as $method) {
				if (Strings::startsWith($method->getName(), 'action')) {

					$annotations = $method->getAnnotations();

					if (isset($annotations['Route'][0])) {
						$route = new Route();
						$route->setMask($annotations['Route'][0]);
						$route->setHandler($definition->getClass(), lcfirst(Strings::substring($method->getName(), 6)));
						if (isset($annotations['Method'][0])) {
							$route->setMethod($annotations['Method'][0]);
						}

						$routes[] = $route;
					}
				}
			}
		}

		return $routes;
	}

}
