<?php

namespace Lib;
/**
* 
*/
 class Model
{
	protected $db;

	function __construct()
	{
		$this->db = new DatabaseConnection;
		
	}




}

?>
