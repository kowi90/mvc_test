<?php 
use Lib\Session as Session;
use Lib\Helper as Helper;
 ?>

<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
	<h1>Posts</h1>	
	<?php if(isset($authlevel) && $authlevel>1): ?>	
	<div class="panel panel-success">
		  <div class="panel-heading">
				<h3 class="panel-title">Create post</h3>
		  </div>
		  <div class="panel-body">
				<form id="post">
					<input type="hidden" id="posted_by" class="form-control" value="<?=Session::getData('user')?>">
					<input type="text" id="post_title" class="form-control" placeholder="Post title">
					<br>
					<textarea name="" id="post_text" class="form-control" rows="3" required="required" placeholder="Post text"></textarea>
					<br>
					<button type="button" class="btn btn-success" id="postbtn">Create post</button>
				</form>
		  </div>
	
	</div>
	<?php endif; ?>

	
	
	<?php foreach ($posts as $post ): ?>
	
	<h3><?=$post['title']?>
	
	
	<?php if(isset($authlevel) && $authlevel>2): ?>	
	<button type="button" class="btn btn-xs btn-warning postedit" data-alias="<?=$post['alias']?>">
		<span class="glyphicon glyphicon-pencil"></span>
			&nbsp;Edit
	</button>
	<?php endif; ?>

	<?php if(isset($authlevel) && $authlevel>3): ?>	
	<button type="button" class="btn btn-xs btn-danger postdelete" data-alias="<?=$post['alias']?>">
		<span class="glyphicon glyphicon-remove"></span>
			&nbsp;Delete
	</button>
	<?php endif; ?>

	</h3>
	<h6><b>Author:</b> <?=$post['posted_by']?></h6>
	<h6><b>Date:</b> <?=$post['date']?></h6>
	<p style="word-break: break-all;"><?=$post['text']?>...</p>
	

	<button type="button" class="btn btn-sm btn-success readmore"  data-alias="<?=$post['alias']?>" >Read more</button>
	

	<hr>

	<?php endforeach; ?>

	<?php  Helper::addJS('index'); ?>
	
</div>