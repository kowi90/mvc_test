<?php

use Lib\Controller as Controller;
use Lib\Session as Session;
use Models\User as User;

class Login extends Controller
{
	public function logintry($postdata)
	{
		$inputname = $postdata['inputname'];
		$inputpass = $postdata['inputpass'];

		$user = new User;

		$user->findByName($inputname);
		
		if($user->getPassword() === hash('sha256',$inputpass))
		{
			Session::create('user', $user->getName());
		}
		else
		{
			echo 0;	
		}
	}

	public function logout()
	{
		Session::remove('user');
	}

}