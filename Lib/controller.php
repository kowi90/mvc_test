<?php

namespace Lib;

class Controller
{
	protected $view;

	function __construct()
	{

		$this->view = new View;
		
	}
}