<?php

namespace App\Core\Config;

use App\Core\Config\Fetchers\IFetcher;
use App\Core\Config\Fetchers\IniFetcher;

class Config
{
	private $host;
	private $user;
	private $pass;
	private $dbName;
	private $driver;
	private $devMode;

	public function __construct()
	{
		$fetcher = new IniFetcher(ROOT_PATH . '/configuration.ini');
		$this->parseData($fetcher);
	}

	private function parseData(IFetcher $fetcher)
	{
		$data = $fetcher->fetch();
		$this->host     = $data['database_host'];
		$this->user     = $data['database_user'];
		$this->pass     = $data['database_pass'];
		$this->dbName   = $data['database_name'];
		$this->driver   = $data['database_driver'];
		$this->devMode  = $data['dev_mode'];
	}

	public function isDevMode(): bool
	{
		return $this->devMode;
	}

	public function getDriver(): string
	{
		return $this->driver;
	}

	public function getHost(): string
	{
		return $this->host;
	}

	public function getDbName(): string
	{
		return $this->dbName;
	}

	public function getPass(): string
	{
		return $this->pass;
	}

	public function getUser(): string
	{
		return $this->user;
	}
}