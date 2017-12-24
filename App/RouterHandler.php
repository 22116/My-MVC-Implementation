<?php

namespace App;

use App\Controllers\ErrorController;
use App\Core\Controller;
use App\Core\Helpers\ServerHelper;
use App\Core\Route;

class RouterHandler extends Router
{
	use ServerHelper;

	public function start() :void
	{
		$routes = $this->getRoutes();
		$routes = array_filter($routes, function (Route $route) {
			return $this->getRequestMethod() == strtoupper($route->getMethod());
		});
		uasort($routes, function (Route $current, Route $next) {
			return strlen($current->getPath()) < strlen($next->getPath());
		});

		$path = strtolower(trim(parse_url($this->getUri(), PHP_URL_PATH), '/'));

		foreach ($routes as $route) {
			/** @var $route Route */
			if (preg_match('#^'.strtolower($route->getPath()).'$#', $path, $args)) {
				$controller = new \ReflectionClass($route->getController());

				if ($controller->getParentClass()->getName() != Controller::class) {
					continue;
				}

				if (!$controller->hasMethod($route->getAction())) {
					continue;
				}

				$method = $controller->hasMethod($route->getAction()) ?
					$controller->getMethod($route->getAction()) :
					$controller->getConstructor();

				$controller = $controller->newInstance();

				unset($args[0]);

				$response = $method->invoke($controller, extract($this->prepareVars($args)));
				echo $response;

				return;
			}
		}

		echo (new ErrorController())->error404();
	}

	private function prepareVars(array $args) :array
	{
		$argsMapper = [];
		foreach ($args as $arg) {
			$argsMapper[preg_replace('/\d/','',md5(random_bytes(20)))] = $arg;
		}

		return $argsMapper;
	}
}