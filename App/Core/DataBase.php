<?php

namespace App\Core;

use Doctrine\ORM\EntityManager;

final class DataBase
{
	private static $instance;
	private $em;

	public static function getInstance(): DataBase
	{
		if (null === static::$instance) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	public function setup(EntityManager $entityManager)
	{
		$this->em = $entityManager;
	}

	public function getEntityManager() :EntityManager
	{
		return $this->em;
	}

	private function __construct() {}
	private function __clone() {}
	private function __wakeup() {}
}