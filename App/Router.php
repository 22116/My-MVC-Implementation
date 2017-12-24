<?php

namespace App;

use App\Controllers\ErrorController;
use App\Controllers\QuestionController;
use App\Core\Route;

class Router
{
	protected function getRoutes() :array
	{
		return [
			new Route('get', 'question', QuestionController::class, 'getAll'),
			new Route('get', 'question/(\d{1,})', QuestionController::class, 'get'),
		];
	}
}