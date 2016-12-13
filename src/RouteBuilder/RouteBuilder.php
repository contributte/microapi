<?php

namespace Minetro\Api\RouteBuilder;

use Minetro\Api\Route;
use Nette\DI\ContainerBuilder;

interface RouteBuilder
{

	/**
	 * @param ContainerBuilder $builder
	 *
	 * @return Route[]
	 */
	public function create(ContainerBuilder $builder);

}
