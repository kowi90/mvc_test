<?php

namespace Lib;
/**
* 
*/

class View
{

	protected $varVars = array();

	function __construct()
	{	
		
	}

	protected function add($name,$value)
	{
		$this->varVars[$name] = $value;
	}

	public function __call($method, $args) 
	{


    	if (Helper::startsWidth($method,'add'))
    	{
    		$method = Helper::removeFrom($method,'add');
    		$method = strtolower($method);
    		$this->add($method,$args[0]);
    	}

  	}

  	public function make($view)
  	{	
  		foreach ($this->varVars as $key => $value)
  		{
  			$$key = $value; 
  		}

  		if (file_exists('views/'.$view.'.php'))
  		{
  			require_once('views/fixed/header.php');
  			require_once('views/'.$view.'.php');
  			require_once('views/fixed/footer.php');
  		}
  		else
  		{
  			Error::FileNotFound($view);
  		}
  	}

    public function forAjax($view)
    {
      
      foreach ($this->varVars as $key => $value)
      {
        $$key = $value; 
      }

      require_once('views/'.$view.'.php');
    }

}