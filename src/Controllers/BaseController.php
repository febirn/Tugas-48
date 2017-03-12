<?php

namespace App\Controllers;

abstract class BaseController
{
	protected $container;

	public function __construct($container)
	{
		return $this->container = $container;
	}

	public function __get($property)
	{
		return $this->container->{$property};
	}
}

?>