<?php

namespace App\Core\Helpers;

trait ServerHelper
{
	private function getUri() :string
	{
		return $_SERVER['REQUEST_URI'];
	}

	private function getRequestMethod() :string
	{
		return $_SERVER['REQUEST_METHOD'];
	}
}