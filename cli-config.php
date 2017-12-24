<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use App\Core\DataBase;

require_once "bootstrap.php";

return ConsoleRunner::createHelperSet(DataBase::getInstance()->getEntityManager());