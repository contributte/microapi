<?php

namespace Minetro\Api\Route;

class Route
{

	/** @var string */
	private $method;

	/** @var string */
	private $mask;

	/** @var string */
	private $classname;

	/** @var string */
	private $action;

	/**
	 * @return string
	 */
	public function getMethod()
	{
		return $this->method;
	}

	/**
	 * @param string $method
	 *
	 * @return void
	 */
	public function setMethod($method)
	{
		$this->method = $method;
	}

	/**
	 * @return string
	 */
	public function getMask()
	{
		return $this->mask;
	}

	/**
	 * @param string $mask
	 *
	 * @return void
	 */
	public function setMask($mask)
	{
		$this->mask = $mask;
	}

	/**
	 * @return string
	 */
	public function getClassname()
	{
		return $this->classname;
	}

	/**
	 * @param string $classname
	 *
	 * @return void
	 */
	public function setClassname($classname)
	{
		$this->classname = $classname;
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
	 * @return void
	 */
	public function setAction($action)
	{
		$this->action = $action;
	}

	/**
	 * @param string $className
	 * @param string $action
	 *
	 * @return void
	 */
	public function setHandler($className, $action)
	{
		$this->classname = $className;
		$this->action    = $action;
	}

}
