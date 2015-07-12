<?php

namespace Lib;
use Models\Visitor as Visitor;
use Models\Page as Page;

require ("routes.php");

class Bootstrap
{
	
	function __construct()
	{

				
		$visitor = new Visitor;
		$visitor->add(Helper::getIP(),Helper::getBrowser());

		$page = new Page;
		

		if (isset($_GET['adress']) && !isset($_POST))
		{
			$page->register($_GET['adress']);
			Route::get($_GET['adress']);
		}
		else if (isset($_GET['adress']) && isset($_POST))
		{
			$page->register($_GET['adress']);
			Route::get($_GET['adress'],$_POST);

		}
		else
		{
			$page->register('/');
			Route::get('/');
		}

	}

}