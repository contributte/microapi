<?php
namespace Minetro\Api\DI;

use Minetro\Api\Controller\ControllerFactory;
use Minetro\Api\Dispatcher\ApiDispatcherFactory;
use Minetro\Api\RouteBuilder\ApiRouteBuilder;
use Minetro\Api\RouteBuilder\SimpleRouteBuilder;
use Minetro\Api\Router\ApiRouter;
use Nette\DI\CompilerExtension;

final class ApiExtension extends CompilerExtension
{

	/** @var array */
	public $defaults = [
		'builder' => NULL,
		'routes'  => [],
	];

	/**
	 * Register services
	 *
	 * @return void
	 */
	public function loadConfiguration()
	{
		$config = $this->validateConfig($this->defaults);

		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('controllerFactory'))
			->setClass(ControllerFactory::class);

		$builder->removeDefinition('application.presenterFactory');
		$builder->addDefinition('application.presenterFactory')
			->setClass(ApiDispatcherFactory::class);

		$routeBuilder = $config['routeBuilder'];

		if (!$routeBuilder) {
			$routeBuilder = new ApiRouteBuilder();
		} elseif ($routeBuilder == 'simple') {
			$routeBuilder = new SimpleRouteBuilder($config['routes']);
		}

		$builder->removeDefinition('routing.router');
		$builder->addDefinition('routing.router')
			->setClass(ApiRouter::class, [$routeBuilder->create($builder)]);
	}

	/**
	 * @return void
	 */
	public function beforeCompile()
	{
		/*$builder = $this->getContainerBuilder();

		foreach ($builder->findByType() as $name => $def) {
			$r = new ClassType($def);
			foreach ($r->getMethods() as $m) {
				$m->getAnnotations()
			}

		}

		$builder->getDefinition(1)->setArguments()
			->addSetup('$a->setMethod(?)', [1]);*/
	}

}
