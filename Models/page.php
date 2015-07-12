<?php

namespace Models;

use Lib\Model as Model;


class Page extends Model
{

	//Oldalletöltés regisztrálása
	public function register($name)
	{
		$date = date('Y-m-d');

		$this->db->query("INSERT INTO pages (name, date)
							  VALUES ('$name', '$date') ");
	}

	//Napi oldalletöltés
	public function getDaily()
	{
		return $this->db->query("SELECT name,DATE_FORMAT(date,'%Y.%m.%d') AS date,COUNT(*) AS count FROM pages GROUP BY name ORDER BY count DESC");
	}

}
