<?php

namespace Minetro\Api\Router;

use Minetro\Api\Route;
use Nette\Application\IRouter;

interface Router extends IRouter
{

	/**
	 * @return Route[]
	 */
	public function getRoutes();

}
