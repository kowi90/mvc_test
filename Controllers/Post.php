<?php 

use Lib\Controller as Controller;
use Lib\Session as Session;
use Lib\Helper as Helper;
use Models\Post as PostModel;
use Models\User as User;
use \Index;

class Post extends Controller
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

		
	}

	function createPost($postdata)
	{

		
		$text  		= htmlentities($postdata['text']);
		$posted_by  = htmlentities($postdata['posted_by']);
		$date		= date("Y-m-d H:i:s");
		$alias		= Helper::createAlias($postdata['title']);
		$title 		= htmlentities($postdata['title']);
		
			$user = new User;
			$user->findByName(Session::getData('user'));
			$authlevel = $user->getAuthlevel();

			if ($authlevel>1)
			{	
				$post = new PostModel;
				$post->create($date,$title,$text,$posted_by,$alias);		
				$post->save();
				
				
				$posts = new PostModel;
				$this->view->addAuthlevel($authlevel);
				$this->view->addPosts($posts->getAll());
				$this->view->forAjax('index');
				
		    }

		
	

	}

	function getPost($alias)
	{
		$post = new PostModel;
		$currentPost= $post->findByAttr('alias',$alias);
		$this->view->addData($currentPost[0]);
		$this->view->make('post');
	}

	function editPost($alias)
	{
		$post = new PostModel;
		$currentPost= $post->findByAttr('alias',$alias);
		$this->view->addData($currentPost[0]);
		$this->view->make('edit');	
		
	}

	function savePost($postdata)
	{
		$id			= htmlentities($postdata['id']);
		$alias		= Helper::createAlias($postdata['title']);
		$title 		= htmlentities($postdata['title']);
		$text  		= htmlentities($postdata['text']);
		$posted_by  = htmlentities($postdata['posted_by']);
		$date		= date("Y-m-d H:i:s");
		

		$post = new PostModel;
		$post->edit($id,$date,$title,$text,$posted_by,$alias);		
		$post->save();
	}

	function deletePost($alias)
	{
		

		if (Session::isSession('user'))
		{
			$user = new User;
			$user->findByName(Session::getData('user'));
			$authlevel = $user->getAuthlevel();

			if ($authlevel>3)
			{	
				$toDelete = new PostModel;
				$toDelete->deleteByAlias($alias);
				
				
				$posts = new PostModel;
				$this->view->addAuthlevel($authlevel);
				$this->view->addPosts($posts->getAll());
				$this->view->forAjax('index');
				
		    }
		}
		

	}
}
