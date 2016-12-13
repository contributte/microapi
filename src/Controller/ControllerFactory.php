<?php

namespace Minetro\Api\Controller;

use Nette\DI\Container;

class ControllerFactory
{

	/**
	 * @var Container
	 */
	private $container;

	/**
	 * ControllerFactory constructor.
	 *
	 * @param Container $container
	 */
	public function __construct(Container $container)
	{
		$this->container = $container;
	}

	/**
	 * @param string $name
	 *
	 * @return object
	 */
	public function create($name)
	{
		$controller = $this->container->getByType($name);

		return $controller;
	}

}
