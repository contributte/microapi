<?php

use Minetro\Api\Controller\ControllerFactory;
use Minetro\Api\Dispatcher\ApiDispatcher;
use Minetro\Api\Dispatcher\ApiDispatcherFactory;
use Nette\Http\Request;
use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

test(function () {
	$httpRequest       = Mockery::mock(Request::class);
	$controllerFactory = Mockery::mock(ControllerFactory::class);

	$apiDispatcherFactory = new ApiDispatcherFactory($controllerFactory, $httpRequest);
	$apiDispatcher        = $apiDispatcherFactory->createPresenter('');

	Assert::true($apiDispatcher instanceof ApiDispatcher);
});
