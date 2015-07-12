
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
	<h2><?=$data['title'] ?></h2>
	<h6><b>Author:</b> <?=$data['posted_by']?></h6>
	<h6><b>Date:</b> <?=$data['date']?></h6>
	<hr>
	<p style="word-break:break-all"><?=$data['text'] ?></p>
	<br>
	<a href="http://<?=__MAIN__?>"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>Vissza</button></a>
</div>