<?php


namespace Lib;
use PDO;

class DatabaseConnection
{
	protected $db;
	protected $query_result;

	function __construct()
	{
		try {
			  $this->db = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME, DB_USER, DB_PASS);  
            $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $this->db->exec("SET CHARACTER SET utf8"); 
		} catch (PDOException $ex) {
			print($ex->getMessage());
		}
	}

	function query($query_data)

	{

		try {
    
      
      if ( strpos($query_data,'SELECT') !== false)
      	{
      		return $this->db->query($query_data, PDO::FETCH_ASSOC)->fetchAll();
  		}

  		else
  		{
  			return $this->db->query($query_data);	
  		}

		} catch(PDOException $ex) {
		    echo "Egy hiba jelentkezett!!"; 
		    print($ex->getMessage());
		}


		
	}
}