<?php

namespace App\Core;

class Route
{
	private $method;
	private $path;
	private $controller;
	private $action;
	private $args;

	public function __construct(string $method, string $path, string $controller, string $action = '', array $args = [])
	{
		$this->method = $method;
		$this->path = $path;
		$this->controller = $controller;
		$this->action = $action;
		$this->args = $args;
	}

	public function getMethod() :string     { return $this->method; }
	public function getAction() :string     { return $this->action; }
	public function getPath() :string       { return $this->path; }
	public function getController() :string { return $this->controller; }
	public function getArgs() :array        { return $this->args; }
}