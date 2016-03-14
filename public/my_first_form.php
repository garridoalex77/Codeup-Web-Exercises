<?php
	var_dump($_GET);
	var_dump($_POST);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My First Form</title>
		<style type="text/css">
			.padding-top {
				padding-top: 10px;
			}
		</style>
	</head>
	<body>
		
		<form method="POST" action="/my_first_form.php">
			<div>
				<label for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="Username">
			</div>
			<div>
				<label for="password">Password</label>
				<input id="password" name="password" type="password" placeholder="Password">
			</div>
			<div>
				<button type="submit" name="submit">Login</button>
			</div>
		</form>
		
		<form method="POST" action="/my_first_form.php">
		
		<h2>User Login</h2>
			<input id="username" name="username" type="text" placeholder="Username">
			<input id="password" name="password" type="password" placeholder="Password">
			<button type="submit" name="submit" value="Login">Login</button>
		
		<h2>Compose an Email</h2>
			<input id="to" name="to" type="text" placeholder="To">
			<input id="from" name="from" type="text" placeholder="From">
			<div class="padding-top">
				<textarea name="body" placeholder="Compose an Email"></textarea>
			</div>
		
			<div class="padding-top">
				<button type="submit" name="send">Send</button>
			</div>
			
			<div>
				<label for="save_copy">Do you want to save a copy?</label>
				<input type="checkbox" name="save_copy" id="save_copy" value="yes" checked>
			</div>
		</form>
		
		<form method="POST" action="/my_first_form.php">
		
		<h2>Multiple Choice Test</h2>
			
			<h3>What language is this?</h3>
				<div>
					<label>
						<input type="radio" name="q1" value="Javascript">Javascript
					</label>
					<label>
						<input type="radio" name="q1" value="HTML">HTML
					</label>
					<label>
						<input type="radio" name="q1" value="PHP">PHP
					</label>
					<label>
						<input type="radio" name="q1" value="English">English
					</label>
				</div>
			
			<h3>How many states are in the US?</h3>
				<div>
					<label>
						<input type="radio" name="q2" value="49">49
					</label>
					<label>
						<input type="radio" name="q2" value="50">50
					</label>
					<label>
						<input type="radio" name="q2" value="4350">4350
					</label>
					<label>
						<input type="radio" name="q2" value="1">1
					</label>
				</div>
			
			<h3>What did you have for breakfast?</h3>
				<div>
					<label>
						<input type="checkbox" name="q3[]" value="fruit">Fruit
					</label>
					<label>
						<input type="checkbox" name="q3[]" value="cereal">Cereal
					</label>
					<label>
						<input type="checkbox" name="q3[]" value="bacon">Bacon
					</label>
					<label>
						<input type="checkbox" name="q3[]" value="eggs">Eggs
					</label>
				</div>
				
				<div class="padding-top">
					<label for="walk">How far did you walk today?</label>
				</div>
						<select id="walk" name="walk[]" multiple>
							<option value="1_block">1 block</option>
							<option value="1_mile">1 mile</option>
							<option value="5_miles">5 miles</option>
							<option value="i_didn't">I didn't</option>
						</select>
			<button type="submit" name="submit">Submit</button>
		</form>

		<form method="POST" action="/my_first_form.php">
		
		<h2>Select Testing</h2>
			<label for="pet">Do you have a pet?</label>
			<select id="pet" name="pet">
				<option value="1">Yes</option>
				<option value="0" selected>No</option>
			</select>
			<button type="submit" name="submit">Submit</button>
		</form>
	</body>
</html>