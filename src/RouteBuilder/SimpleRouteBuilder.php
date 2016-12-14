<?php

namespace Minetro\Api\RouteBuilder;

use Minetro\Api\Route;
use Nette\DI\ContainerBuilder;

class SimpleRouteBuilder implements RouteBuilder
{

	/** @var Route[] */
	private $routes;

	/**
	 * SimpleRouteBuilder constructor.
	 *
	 * @param Route[] $routes
	 */
	public function __construct($routes = [])
	{
		$this->routes = $routes;
	}

	/**
	 * @param ContainerBuilder $builder
	 *
	 * @return Route[]
	 */
	public function create(ContainerBuilder $builder)
	{
		return $this->routes;
	}

}
