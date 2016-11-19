<?php
namespace Minetro\Api\DI;

use Minetro\Api\ApiDispatcherFactory;
use Minetro\Api\ControllerFactory;
use Minetro\Api\Route\ApiRouteBuilder;
use Minetro\Api\Router\ApiRouter;
use Nette\DI\CompilerExtension;

final class ApiExtension extends CompilerExtension
{

	/** @var array */
	public $defaults = [
		'auto'   => 'true',
		'routes' => [],
		'src'    => '',
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

		$routes = $config['routes'];

		if ($config['auto']) {
			$routeBuilder = $builder->addDefinition($this->prefix('routeBuilder'))
				->setClass(ApiRouteBuilder::class, [$config['src']]);

			$routes = $routeBuilder->create();
		}

		$builder->removeDefinition('routing.router');
		$builder->addDefinition('routing.router')
			->setClass(ApiRouter::class, [$routes]);
	}

	/**
	 * @return void
	 */
	public function beforeCompile()
	{
		//TODO
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
