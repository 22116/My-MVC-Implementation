<?php

namespace App\Core\Config\Fetchers;

class IniFetcher implements IFetcher
{
	private $vars;
	private $path;

	public function __construct(string $path)
	{
		$this->path = $path;
	}

	public function fetch(): array
	{
		return $this->vars ?? $this->vars = parse_ini_file($this->path);
	}

	public function fetchOne(string $name): string
	{
		return $this->fetch()[$name];
	}
}