<?php

use Lib\Controller as Controller;
use Lib\Session as Session;
use Models\User as User;

class Register extends Controller
{
	function checkName($postdata)
		{
			$regname = $postdata['regname'];
	
			$user = new User();
			
			if ($user->findByName($regname))
			{
				echo "exists";
			}

		}

	function registerUser($postdata)
	{
		$regname = htmlentities($postdata['regname']);	
		$regpass = htmlentities($postdata['regpass']);
		$regauth = htmlentities($postdata['regauth']);

		$regpass = hash('sha256', $regpass);

		$user = new User;
		$user->setName($regname);
		$user->setPassword($regpass);
		$user->setAuthlevel($regauth);
		$user->save();

	}


}