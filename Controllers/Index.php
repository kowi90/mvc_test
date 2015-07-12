<?php 

use Lib\Controller as Controller;
use Lib\Session as Session;
use Lib\Error as Error;
use Lib\Helper as Helper;
use Models\User as User;
use Models\Post as Post;
use Models\Visitor as Visitor;
use Models\Page as Page;

class Index extends Controller
{
	
	public function __construct()
	{

		 parent::__construct();

		
		 if (Session::isSession('user'))
		{
			$user = new User;
			$user->findByName(Session::getData('user'));
			$authlevel = $user->getAuthlevel();
			$this->view->addAuthlevel($authlevel);
			$this->view->addLogged(1);
		}
		else
		{	
			$this->view->addLogged(0);
		}

		$posts = new Post;
		$this->view->addPosts($posts->getAll());
	}
	
	function wall()
	{	
		$this->view->make('index');
	}
	function ajaxwall()
	{			
		$this->view->forAjax('index');
	}

	function register()
	{
		$this->view->forAjax('register');
	}

	function stats()
	{
		if (Session::isSession('user'))
		{
			$getstat = new Visitor();
			$daily = $getstat->getDaily();
			$bpercent = $getstat->getBrowser();
			
			$getstat2 = new Page();
			$pages= $getstat2->getDaily();

			$this->view->addIp($_SERVER['REMOTE_ADDR']);
			$this->view->addBrowser(Helper::getBrowser());
			$this->view->addDaily($daily);
			$this->view->addPages($pages);
			$this->view->addBrowserpercent($bpercent);
			$this->view->forAjax('stats');

		}
		else
		{
			Error::authFail();
		}
	}

	function users()
	{
		if (Session::isSession('user'))
		{
			
			$user = new User;
			$usersData = $user->getAll();
			$this->view->addUsers($usersData);
			$this->view->forAjax('users');

		}
		else
		{
			Error::authFail();
		}
	}

}