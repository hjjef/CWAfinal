<!DOCTYPE html>
	<html lang="en">
		<?php require "header.inc"; ?>
	
		<body>
			<?php require "menu.inc"; ?>
			
			<header>
				<h1>Manage Quiz Results</h1>
			</header>
			
			<form method="post" action="managequiz.php">
				
			<p>	<input type="submit" name="action" value="List All Attempts" /></p>
			
			<p>	<input type="submit" name="action" value="List All 100% Attempt 1" /></p>
			
			<p>	<input type="submit" name="action" value="List All Under 50% Attempt 3" /></p>
			
			<fieldset><legend>Student Details</legend>
				<p class="row">	<label for="name">First name: </label>
					<input type="text" name="name" id="name" /></p>
				<p class="row">	<label for="surname">Family name: </label>
					<input type="text" name="surname" id="surname" /></p>
				<p class="row">	<label for="sid">Student ID: </label>
					<input type="text" name="sid" id="sid" /></p>
				
				<p>
					<input type="submit" name="action" value="List Attempts" />
					<input type="submit" name="action" value="Delete Attempts" />
				</p>
				
				<p class="row">	<label for="attemptnumber">Attempt Numer: </label>
				<input type="text" name="attemptnumber" id="attemptnumber" /></p>
				
				<p class="row">	<label for="newscore">New Score: </label>
				<input type="text" name="newscore" id="newscore" /></p>
				
				<p>	<input type="submit" name="action" value="Change Attempt Score" /></p>
				
			</fieldset>
			</form>

		<?php require "footer.inc"; ?>
		</body>
	</html>