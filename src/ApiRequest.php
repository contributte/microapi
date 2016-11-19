<?php

namespace Minetro\Api;

use Nette\Application\Request;

class ApiRequest extends Request
{

	/** @var string */
	private $action;

	/**
	 * ApiRequest constructor.
	 *
	 * @param string $name
	 * @param null   $action
	 * @param null   $method
	 * @param array  $params
	 * @param array  $post
	 * @param array  $files
	 * @param array  $flags
	 */
	public function __construct(
		$name,
		$action,
		$method = NULL,
		array $params = [],
		array $post = [],
		array $files = [],
		array $flags = []
	)
	{
		$this->action = $action;

		parent::__construct($name, $method, $params, $post, $files, $flags);
	}

	/**
	 * @return string
	 */
	public function getAction()
	{
		return $this->action;
	}

	/**
	 * @param string $action
	 *
	 * @return ApiRequest
	 */
	public function setAction($action)
	{
		$this->action = $action;

		return $this;
	}

}
