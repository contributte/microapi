<?php

use Minetro\Api\Controller\ControllerFactory;
use Nette\DI\Container;
use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

test(function () {
	$container = Mockery::mock(Container::class)
		->shouldReceive('getByType')
		->with(DummyController::class)
		->andReturn(new DummyController())
		->once()
		->getMock();

	$controllerFactory = new ControllerFactory($container);
	$controller        = $controllerFactory->create(DummyController::class);

	Assert::true($controller instanceof DummyController);
});
