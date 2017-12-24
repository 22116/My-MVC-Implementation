<?php

namespace App\Controllers;

use App\Core\Controller;

class ErrorController extends Controller
{
	public function error404()
	{
		http_response_code(404);
		return $this->view->render('error.twig', [
			'error' => 404,
			'description' => 'Page not found!'
		]);
	}
}