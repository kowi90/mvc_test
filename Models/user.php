<?php

namespace Models;

use Lib\Model as Model;
use Lib\Error as Error;

class User extends Model
{
	protected $name;
	protected $password;
	protected $authlevel;

	//összes felhasználó
	public function getAll()
	{
		 return $this->db->query("SELECT * FROM users");
	}

	//keresés név alapján
	public function findByName($name)
	{
		$user = $this->db->query("SELECT * FROM users WHERE name='$name'");

		if(count($user))
		{
			$this->name= $user[0]['name'];
			$this->password= $user[0]['password'];
			$this->authlevel= $user[0]['authlevel'];

			return true;
		}
		else 
		{
			return false;
		}
	}


	public function getName()	
	{
		return ($this->name != NULL)?$this->name:false;
	}

	public function getPassword()	
	{
		return ($this->password != NULL)?$this->password:false;
	}

	public function getAuthlevel()	
	{
		return ($this->authlevel != NULL)?$this->authlevel:false;
	}

	public function setName($name)	
	{
		$this->name = $name;
	}

	public function setPassword($pass)	
	{
		$this->pass = $pass;
	}

	public function setAuthlevel($authlevel)	
	{
		$this->authlevel = $authlevel;
	}

	//változások elmentése
	public function save()
	{

		if ($this->name != NULL && $this->pass != NULL && $this->authlevel != NULL)
		{
		 	$this->db->query("INSERT INTO users (name, password, authlevel)
							  VALUES ('$this->name', '$this->pass', '$this->authlevel')
								 ");		
		}
		else
		{
			Error::saveFail();			
		}

	}

}