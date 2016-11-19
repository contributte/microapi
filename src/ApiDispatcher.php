<?php

namespace Minetro\Api;

use Nette\Application\IPresenter;
use Nette\Application\IResponse;
use Nette\Application\Request;

class ApiDispatcher implements IPresenter
{

    /** @var ControllerFactory */
    private $controllerFactory;

	/**
	 * ApiDispatcher constructor.
	 *
	 * @param ControllerFactory $controllerFactory
	 */
	public function __construct(ControllerFactory $controllerFactory)
    {
        $this->controllerFactory = $controllerFactory;
    }

    /**
     * @param ApiRequest|Request $request
     * @return IResponse
     */
    public function run(Request $request)
    {
        return $this->doRun($request);
    }

	/**
	 * @param ApiRequest $request
	 *
	 * @return ApiResponse
	 */
	private function doRun(ApiRequest $request)
	{
		$response = new ApiResponse();

		$controller = $this->controllerFactory->create($request->getPresenterName());

		$action = $request->getAction();
		$controller->$action($request, $response);

		return $response;
    }

}
