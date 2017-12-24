<?php

namespace App\Core\Helpers;

trait RequestHelper
{
	private function getPost()
	{
		return $_POST;
	}

	private function getGet()
	{
		return $_GET;
	}
}