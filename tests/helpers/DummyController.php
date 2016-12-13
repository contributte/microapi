<?php

use Minetro\Api\ApiRequest;
use Minetro\Api\ApiResponse;
use Minetro\Api\Controller\Controller;

class DummyController implements Controller
{

	/**
	 * @Route('')
	 * @Method('GET')
	 *
	 * @param ApiRequest  $request
	 * @param ApiResponse $response
	 */
	public function actionDefault(ApiRequest $request, ApiResponse $response)
	{

	}

}
