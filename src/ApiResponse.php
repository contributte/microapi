<?php

namespace Minetro\Api;

use Nette\Application\IResponse;
use Nette\Http\IRequest;
use Nette\Http\IResponse as IHttpResponse;

class ApiResponse implements IResponse
{

	/** @var string */
	private $body;

	/**
	 * Sends response to output.
	 *
	 * @param IRequest      $httpRequest
	 * @param IHttpResponse $httpResponse
	 *
	 * @return void
	 */
	public function send(IRequest $httpRequest, IHttpResponse $httpResponse)
	{
		echo $this->body;
	}

	/**
	 * @param string $body
	 *
	 * @return void
	 */
	public function write($body)
	{
		$this->body = $body;
	}

}
