	<?php 
	use Lib\Helper as Helper;
	use Lib\Session as Session;
	 ?>

	<!DOCTYPE html>
	<html lang="hu">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>My Blog</title>
	
			<!-- Bootstrap CSS -->
			<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
			<script src="//code.jquery.com/jquery.js"></script>
			<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

			<?php Helper::addCSS('main'); ?>
			
		</head>
		<body>
		<input type="hidden" id="site_folder" value="<?=SITE_FOLDER?>">

		<nav class="navbar navbar-default" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">My Blog</a>
			</div>
		
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li id="menu_posts"><a href="http://<?=__MAIN__?>"><span class="glyphicon glyphicon-book"></span>&nbsp;Posts</a></li>
					
					<?php if ($logged): ?>

					<li id="menu_users"><a href="#"><span class="glyphicon glyphicon-user" ></span>&nbsp;Users</a></li>
					<li id="menu_stats"><a href="#"><span class="glyphicon glyphicon-signal" ></span>&nbsp;Stats</a></li>
					<button type="button" class="btn btn-danger login-button" id="logout">
						Logout
						( 
						<span class="glyphicon glyphicon-user"></span><?=Session::getData('user')?> 
						)
					</button>

					<?php endif; ?>

					
					<?php if (!$logged): ?>
						
							<input type="text" name="uname" id="inputname" class="form-control login-input" value="" required="required" pattern="" title="" placeholder="Username">
							<input type="password" name="uname" id="inputpass" class="form-control login-input" value="" required="required" pattern="" placeholder="******" title="">
							<button type="button" class="btn btn-danger login-button" id="login">
								<span class="glyphicon glyphicon-circle-arrow-right"></span>&nbsp;
								Login
							</button>
							<button type="button" class="btn btn-warning login-button" id="register">
								<span class="glyphicon glyphicon-plus-sign"></span>&nbsp;
								Register
							</button>
					<?php endif; ?>
				
				</ul>
				
			</div><!-- /.navbar-collapse -->
		</nav>

		<div class="container">
			<div class="row content">
				
			
		