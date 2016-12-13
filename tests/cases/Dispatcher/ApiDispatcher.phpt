<?php

use Minetro\Api\ApiRequest;
use Minetro\Api\Controller\ControllerFactory;
use Minetro\Api\Dispatcher\ApiDispatcher;
use Minetro\Api\Route;
use Nette\Application\IResponse;
use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

test(function () {
	$controller        = new DummyController();
	$controllerFactory = Mockery::mock(ControllerFactory::class)
		->shouldReceive('create')
		->andReturn($controller)
		->getMock();

	$route = new Route();
	$route->setMask('');
	$route->setClassname(DummyController::class);
	$route->setAction('default');

	$apiRequest = new ApiRequest(DummyController::class, 'default', 'GET');

	$apiDispatcher = new ApiDispatcher($controllerFactory);
	$response      = $apiDispatcher->run($apiRequest);

	Assert::true($response instanceof IResponse);
});
