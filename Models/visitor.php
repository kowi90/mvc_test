<?php

namespace Models;

use Lib\Model as Model;


class Visitor extends Model
{

	//Egyedi látogató hozzáadása
	public function add($ip,$browser)
	{
		$date = date('Y-m-d');

		$this->db->query("INSERT INTO visitors (ip, browser, date)
							  VALUES ('$ip', '$browser', '$date') ON DUPLICATE KEY UPDATE
							ip=ip
							  ");

	}

	//Napi egyedi látogató
	public function getDaily()
	{

		return $this->db->query("SELECT DATE_FORMAT(date,'%Y.%m.%d') AS date,COUNT(*) AS count FROM visitors GROUP BY date");

	}

	//Böngészőhaználat lekérdezése
	public function getBrowser()
	{

		return $this->db->query("SELECT browser, (ROUND(COUNT(*)/(SELECT COUNT(*) FROM visitors),4)*100) AS percent FROM visitors GROUP BY browser");

	}

}