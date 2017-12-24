<?php

namespace App\Core;

use Twig_Loader_Filesystem;
use Twig_Environment;

class View
{
	private $twig;

	public function __construct()
	{
		$loader = new Twig_Loader_Filesystem(ROOT_PATH . '/resources/views');
		$params = [];
		if (!DEV_MODE) {
			$params['cache'] = ROOT_PATH . '/resources/cache'
		}
		$this->twig = new Twig_Environment($loader, [$params]);
	}

	public function getTemplate()
	{
		return $this->twig;
	}
}