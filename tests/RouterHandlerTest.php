<?php

namespace Tests;

use App\RouterHandler;
use PHPUnit\Framework\TestCase;

class RouterHandlerTest extends TestCase
{
	public function testError()
	{
		$router = new RouterHandler();
		$router->start();
		$this->assertEquals(404, http_response_code());
	}
}
