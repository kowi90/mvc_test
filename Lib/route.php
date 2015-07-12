<?php

namespace Lib;

use ReflectionMethod;


abstract class Route
{

	protected static $url;			//A lekért cím
	protected static $path;			//a cím első paramétere az útvonal
	protected static $arguments;	//a többi paraméter argumentum
	protected static $controller;	//az adott kontroller
	protected static $method;		//az adott kontroller lefuttatandó metódusa

	protected static $routes = array();

	//Útvonal hozzáadása (routes.php)
	public static function set($route,$cont_method)
		{
			self::$routes[$route]=$cont_method;
		}

	//Útvonal kiválasztás
	public static function get($route, $postdata = NULL)
		
		{		
				self::$url = explode('/',$route);
				
					

				self::$path= self::$url[0];

				if (isset(self::$url[1])) //GET esetén csak az első argumentumot vesszük figyelembe
					{
						self::$arguments= self::$url[1];
					}
					


				if (count($postdata)) //POST esetén a teljes tömb feldolgozásra kerül
				{
					self::$arguments=$postdata;

				}

				

				foreach (self::$routes as $route_url => $route_method) {
					if ($route_url === self::$path){

						$route_array = explode('.',$route_method);
						
						self::$controller = $route_array[0];

						self::$method = $route_array[1];
					}
				}


			//útvonal helyességének ellenőrzése a kontrolleren

			if (file_exists(__CONTROLLERS__.'/'.self::$controller.'.php'))
			{
				require (__CONTROLLERS__.'/'.self::$controller.'.php');

			}
			else if (self::$controller === '')
			{
				$currentController = '';
			}
			else
			{	
				
				Error::RouteNotFound(self::$url[0]);
			}

			
			//kontroller létrehozása	
			$currentController = new self::$controller;
			

			//kontroller metódusának ellenőrzése, argumentumkezelés
			if (method_exists ( $currentController , self::$method ))
			{
				$method = self::$method;
				$arguments = self::$arguments;

				$argument_array = new ReflectionMethod($currentController,$method);
				$argument_count = count($argument_array->getParameters());
				
				($argument_count>0)?$currentController->$method($arguments):$currentController->$method();

			}
			else
			{
				Error::MethodNotExists(self::$controller,self::$method);
			}

		}


}
