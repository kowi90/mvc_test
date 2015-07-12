<?php 
use Lib\Session as Session;
use Lib\Helper as Helper;
 ?>

<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
	<div class="panel panel-danger">
		  <div class="panel-heading">
				<h3 class="panel-title">Edit post</h3>
		  </div>
		  <div class="panel-body">
				<form id="post">
					<input type="hidden" id="posted_by" class="form-control" value="<?=Session::getData('user')?>">
					<input type="hidden" id="id" class="form-control" value="<?=$data['id']?>">

					<input type="text" id="post_title" class="form-control" placeholder="Post title" value="<?=$data['title']?>">
					<br>
					<textarea name="" id="post_text" class="form-control" rows="3" required="required" placeholder="Post text"><?=$data['text']?></textarea>
					<br>
					<button type="button" class="btn btn-success" id="savebtn">Save post</button>
					<a href="http://<?=__MAIN__?>">
						<button type="button" class="btn btn-warning" id="cancelbtn">Cancel</button>
					</a>
				</form>
		  </div>
	
	</div>
</div>

<?php Helper::addJS('edit'); ?>