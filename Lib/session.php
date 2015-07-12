<?php

namespace Lib;

abstract class Session
{
	
	public static function create($name, $value)
	{
		$_SESSION[$name] = $value;
	}

	public static function remove($name)
	{
		unset($_SESSION[$name]);
	}

	public static function isSession($name)
	{
		return isset($_SESSION[$name]);
	}	

	public static function getData($name)
	{
		return $_SESSION[$name];
	}
}