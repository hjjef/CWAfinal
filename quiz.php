<!DOCTYPE html>
	<html lang="en">
		<?php require "header.inc"; ?>
	
		<body>
			<?php require "menu.inc"; ?>
			
			<header>
				<h1>APNG - Animated PNG</h1>
			</header>
			
			<form id="quizform" method="post" action="markquiz.php">
				<fieldset>
					<legend>Student Details</legend>
					<p>
						<label for="sid">Student ID</label>
						<input type="text" id="sid" name= "student_id" maxlength="10" size="10" pattern="\d{7}|\d{10}" required="required"/>
					</p>
					<p>
						<label for="name">Given Name</label> 
						<input type="text" id="name" name="given_name" pattern="[A-Za-z\s-]{0,25}" required="required"/>
						<label for="famname">Family Name</label>
						<input type="text" id="famname" name="family_name" pattern="[A-Za-z\s-]{0,25}" required="required"/>
					</p>
				</fieldset>
				<fieldset id="question1">
					<legend>Question 1</legend>
					<p>Which one of the following is one of three required extra chunks to extend PNG to APNG.</p>
					<p>
						<label for="answer1A">A. Ftad</label>
						<input type="radio" id="answer1A" name="question1[]" required="required" value="A"/>
					</p>	
					<p>
						<label for="answer1B">B. foTL</label>
						<input type="radio" id="answer1B" name="question1[]" value="B"/>
					</p>
					<p>
						<label for="answer1C">C. acTL</label>
						<input type="radio" id="answer1C" name="question1[]" value="C"/>
					</p>
					<p>
						<label for="answer1D">D. modL</label>
						<input type="radio" id="answer1D" name="question1[]" value="D"/>
					</p>
				</fieldset>	
				<fieldset>
					<legend>Question 2</legend>
					<p>
						<label for="question2">What is the colour resolution of APNG?</label>
						<br/><br/>
						<select name="question2" id="question2">
							<option value="">Please Select</option>
							<option value="32bit">32 bit</option>
							<option value="16bit">16 bit</option>
							<option value="8bit">8 bit</option>
							<option value="24bit">24 bit</option>
						</select>
					</p>
				</fieldset>
				<fieldset>
					<legend>Question 3</legend>
					<p>
						<label for="question3">Describe why APNG was not approved by the PNG development group.</label> <br/><br/>
						<textarea id="question3" name="question3" rows="4" cols="40" required="required" placeholder="Write your answer here..."></textarea>
					</p>
				</fieldset>
				<fieldset id="question4">
					<legend>Question 4</legend>
					<p>Who are the two creators of APNG?</p>
					<p>
						<label for="answer4A">A. Stuart Parmenter</label>
						<input type="checkbox" id="answer4A" name="question4[]" value="A"/>
					</p>
					<p>
						<label for="answer4B">B. Vladimir Parmenter</label>
						<input type="checkbox" id="answer4B" name="question4[]" value="B"/>
					</p>
					<p>
						<label for="answer4C">C. Vladimir Vukicevic</label>
						<input type="checkbox" id="answer4C" name="question4[]" value="C"/>
					</p>
					<p>
						<label for="answer4D">D. Stuart Vukicevic</label>
						<input type="checkbox" id="answer4D" name="question4[]" value="D"/>
					</p>
				</fieldset>
				<fieldset>
					<legend>Question 5</legend>
					<p>
						<label for="question5">What year was APNG Created?</label>
						<br/><br/>
						<input type="number" id="question5" name="question5" required="required"/>
					</p>
				</fieldset>
				<input type= "submit" value="Submit"/>
				<input type= "reset" value="Clear Answers" class="bottom"/>
			</form>
			<?php require "footer.inc"; ?> 
		</body>
	</html>