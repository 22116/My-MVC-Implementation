<?php

define('ROOT_PATH', __DIR__);

require_once "vendor/autoload.php";

$conf = new \App\Core\Config\Config();

define('DEV_MODE', $conf->isDevMode());

$schema = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration([__DIR__ . "/App/DataModels"], $conf->isDevMode());
$conn = [
	'host'     => $conf->getHost(),
	'driver'   => $conf->getDriver(),
	'user'     => $conf->getUser(),
	'password' => $conf->getPass(),
	'dbname'   => $conf->getDbName()
];

try {
	\App\Core\DataBase::getInstance()->setup(
		\Doctrine\ORM\EntityManager::create($conn, $schema)
	);
}
catch (Exception $err) {
	die('Connection problem');
}
