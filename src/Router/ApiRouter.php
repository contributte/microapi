<?php

namespace Minetro\Api\Router;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Minetro\Api\ApiRequest;
use Minetro\Api\Route;
use Nette\Application\Request;
use Nette\Http\IRequest;
use Nette\Http\Url;
use Nette\NotImplementedException;

class ApiRouter implements Router
{

	/** @var Route[] */
	private $routes;

	/**
	 * CustomRouter constructor.
	 *
	 * @param Route[] $routes
	 */
	public function __construct($routes)
	{
		$this->routes = $routes;
	}

	/**
	 * Maps HTTP request to a Request object.
	 *
	 * @param IRequest $httpRequest
	 *
	 * @return Request|NULL
	 */
	public function match(IRequest $httpRequest)
	{
		$routeInfo = $this->matchRoute($httpRequest);
		if ($routeInfo[0] != Dispatcher::FOUND) {
			return NULL;
		}

		/** @var Route $route */
		$route = $routeInfo[1];
		$vars  = $routeInfo[2];

		$request = new ApiRequest(
			$route->getClassname(),
			$route->getAction(),
			$httpRequest->getMethod(),
			$vars,
			$httpRequest->getPost(),
			$httpRequest->getFiles(),
			[Request::SECURED => $httpRequest->isSecured()]
		);

		return $request;
	}

	/**
	 * Constructs absolute URL from Request object.
	 *
	 * @param Request $appRequest
	 * @param Url     $refUrl
	 *
	 * @return void //NULL|string
	 */
	public function constructUrl(Request $appRequest, Url $refUrl)
	{
		throw new NotImplementedException;
	}

	/**
	 * @param IRequest $httpRequest
	 *
	 * @return array
	 */
	private function matchRoute(IRequest $httpRequest)
	{
		$dispatcher = \FastRoute\simpleDispatcher(function (RouteCollector $collector) {
			foreach ($this->routes as $route) {
				$collector->addRoute($route->getMethod(), $route->getMask(), $route);
			}
		});

		$routeInfo = $dispatcher->dispatch($httpRequest->getMethod(), $httpRequest->getUrl()->getRelativeUrl());

		return $routeInfo;
	}

	/**
	 * @return Route[]
	 */
	public function getRoutes()
	{
		return $this->routes;
	}

}
