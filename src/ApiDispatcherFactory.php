<?php

namespace Minetro\Api;

use Nette\Application\IPresenterFactory;

class ApiDispatcherFactory implements IPresenterFactory
{

    /** @var ControllerFactory */
    private $controllerFactory;

	/**
	 * ApiDispatcherFactory constructor.
	 *
	 * @param ControllerFactory $controllerFactory
	 */
	public function __construct(ControllerFactory $controllerFactory)
    {
        $this->controllerFactory = $controllerFactory;
    }

	/**
	 * @param string $name
	 *
	 * @return mixed
	 */
	public function getPresenterClass(& $name)
    {
        return ApiDispatcher::class;
    }

	/**
	 * @param string $name
	 *
	 * @return ApiDispatcher
	 */
	public function createPresenter($name)
	{
		$apiDispatcher = new ApiDispatcher($this->controllerFactory);

		return $apiDispatcher;
	}

}
