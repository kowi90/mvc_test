<?php

namespace Lib;

abstract class Error{

	
	public static function __callStatic($method, $args)	
	{
		echo '<meta charset="UTF-8">';
		return call_user_func_array(array(get_called_class(), $method), $args);
	}

	protected static function FileNotFound($file)
	{
		
		echo "ERR001:A file nem található: ".$file;
		die();
	}

	protected static function RouteNotFound($route)
	{
		
		echo "ERR002:Az útvonal nem található: ".$route;
		die();
	}

	protected static function TooMuchArgument()
	{
		
		echo "ERR003:Túl sok argumentum!";
		die();
	}

	protected static function MethodNotExists($controller,$method)
	{
		
		echo "ERR004:Nincs ilyen metódusa a ".$controller." kontrollernek: ".$method." !";
		die();
	}
	protected static function authFail()
	{
		
		echo "ERR005:Nincs jogosultsága a megtekintéshez !";
		die();
	}

	protected static function saveFail()
	{
		
		echo "ERR006:Nem menthető a modell (hiányzó értékek) !";
		die();
	}

}



