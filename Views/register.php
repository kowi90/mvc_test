<?php use Lib\Helper as Helper; ?>

<div class="col-xs-12 col-sm-8 col-md-8 col-lg-3">
<form id="regform">
	<legend>Register</legend>

	<div class="form-group">
		<label for="regname">Username</label>
		<input type="text" class="form-control" id="regname" placeholder="Username">
	</div>
	
	<div class="form-group">
		<label for="regname">Password</label>
		<input type="password" class="form-control" id="regpass" placeholder="******">
	</div>
	
	<div class="form-group">
		<label for="regname">Password again</label>
		<input type="password" class="form-control" id="regpass2" placeholder="******">
	</div>
	<div class="form-group">
	<label for="authlevel">Authentication level</label>
	<select name="authlevel" id="authlevel" class="form-control" required="required">
		<option value="1">View only</option>
		<option value="2">View & Create</option>
		<option value="3">View & Create & Edit</option>
		<option value="4">View & Create & Edit & Delete</option>
	</select>
</div>
	<div>
	Restrictions:
		<ul>
			<li>Username : >5 characters</li>
			<li>Password : >5 characters</li>
		</ul>
	</div>

	<button type="button" class="btn btn-primary" id="regbtn">Register</button>
</form>	
</div>

<?php  Helper::addJS('register'); ?>