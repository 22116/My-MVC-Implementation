<?php

namespace App\Core\Config\Fetchers;

interface IFetcher
{
	function fetch() :array;
	function fetchOne(string $name) :string;
}