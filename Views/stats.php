<?php use Lib\Helper as Helper; ?>

		<h1>Statistics</h1>
		<p><b>Your ip:</b> <?=$ip ?></p>
		<p><b>Your browser:</b> <?=$browser?></p>
		
		<div class="panel panel-default"> 
			  <div class="panel-heading">
					<h3 class="panel-title">Visitors</h3>
			  </div>
			  <div class="panel-body">
					<table class="table table-hover">
				<thead>
					<tr>
						<th>Date</th>
						<th>Unique visitors</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($daily as $d):?>
					<tr>
						<td><?=$d['date']?></td>
						<td><?=$d['count']?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>			
			  </div>
		</div>

		<div class="panel panel-default"> 
			  <div class="panel-heading">
					<h3 class="panel-title">Browser use by percentage</h3>
			  </div>
			  <div class="panel-body">
					<table class="table table-hover">
				<thead>
					<tr>
						<th>Browser</th>
						<th>Percent</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($browserpercent as $bp):?>
					<tr>
						<td><?=$bp['browser']?></td>
						<td><?=$bp['percent'].'%'?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>			
			  </div>
		</div>
		<div class="panel panel-default"> 
			  <div class="panel-heading">
					<h3 class="panel-title">Page views</h3>
			  </div>
			  <div class="panel-body">
					<table class="table table-hover">
				<thead>
					<tr>
						<th>Page</th>
						<th>Date</th>
						<th>Count</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pages as $p):?>
					<tr>
						<td><?=$p['name']?></td>
						<td><?=$p['date']?></td>
						<td><?=$p['count']?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>			
			  </div>
		</div>
