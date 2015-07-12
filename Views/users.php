<h1>Users</h1>

 <table class="table table-hover">
 	<thead>
 		<tr>
 			<th>Username</th>
 			<th>Authentication level</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($users as $user):?>
 		 			 		
 		<tr>
 			<td><span class="glyphicon glyphicon-user"></span>&nbsp;<?=$user['name'] ?></td>

 			<td>
 			<?php
 			
 				switch($user['authlevel'])
 				{
 					case 1 : echo 'View only'; break;
 					case 2 : echo 'View & Create'; break;
 					case 3 : echo 'View & Create & Edit'; break;
 					case 4 : echo 'View & Create & Edit & Delete'; break;
 					default:;
 				}

 			 ?>
 			</td>
 		</tr>
 	<?php endforeach; ?>
 	</tbody>
 </table>