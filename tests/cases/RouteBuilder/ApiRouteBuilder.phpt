<?php

use Minetro\Api\Controller\Controller;
use Minetro\Api\Route;
use Minetro\Api\RouteBuilder\ApiRouteBuilder;
use Nette\DI\ContainerBuilder;
use Nette\DI\ServiceDefinition;
use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

test(function () {
	$definition = new ServiceDefinition();
	$definition->setClass(DummyController::class);

	$route = new Route();
	$route->setMask('');
	$route->setMethod('GET');
	$route->setClassname(DummyController::class);
	$route->setAction('default');

	$containerBuilder = Mockery::mock(ContainerBuilder::class)
		->shouldReceive('findByType')
		->with(Controller::class)
		->andReturn([$definition])
		->getMock();

	$routeBuilder = new ApiRouteBuilder();
	$routes       = $routeBuilder->create($containerBuilder);
	Assert::equal([$route], $routes);
});
