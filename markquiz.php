<!DOCTYPE html>
	<html lang="en">
		<?php require_once("header.inc"); ?>
		<body>
		<h1>Quiz Results</h1>

		<?php
				/* Function to mark the quiz based on marking criteria.
				 * Paremeters are formatted answers to each question/
				 * Output is a integer mark out of 10.
				 */
				function markQuiz($Q1, $Q2, $Q3, $Q4, $Q5) {
					$total = 0;
					if($Q1 == "C") {
						$total += 2;
					}
					if($Q2 == "24bit") {
						$total += 2;
					}
					if(strpos($Q3,".APNG") !== false || strpos($Q3,".apng") !== false || strpos($Q3,"apng") !== false || strpos($Q3,"APNG") !== false ) {
						$total += 1;
					}
					if(strpos($Q3,"extension")) {
						$total += 1;
					}
					if(strpos($Q4,"A")  !== false || strpos($Q4,"C")  !== false) {
						if($Q4 == "AC") {
							$total += 2;
						}
						else {
							$total += 1;
						}
					}
					if($Q5 == "2004") {
						$total += 2;
					}
					return $total;
				}
				
				/* Function to get an answer for radio and check button questions.
				 * Input string refering to the question number
				 * Output is a formatted string containing the answer
				 */
				function getAnswer($question) {
					$answer = "";
					if(isset($_POST[$question])) {
						$answerArray = $_POST[$question];
						if(!empty($answerArray)) {
							foreach ($answerArray as $selected) {
								$answer = $answer . $selected;
							}
						}
					}
					return $answer;
				}
				
				
				// Store variables from form in local variables
				$firstname = trim($_POST["given_name"]);
				$surname = trim($_POST["family_name"]);
				$sid = trim($_POST["student_id"]);
				$question1 = getAnswer("question1");
				$question2 = trim($_POST["question2"]);
				$question3 = trim($_POST["question3"]);
				$question4 = getAnswer("question4");
				$question5 = trim($_POST["question5"]);
				
				// Formatting text input fields.
				$firstname = htmlspecialchars($firstname);
				$surname = htmlspecialchars($surname);
				$sid = htmlspecialchars($sid);
				$question3 = htmlspecialchars($question3);
				$question5 = htmlspecialchars($question5);
				
				$errMsg = "";
				$result = true;
				
				// Creating the database connection.
				require_once ("settings.php");
				$conn = @mysqli_connect($host,
										$user,
										$pwd,
										$sql_db
				);
				
				if(!$conn) {
					echo "<p> Database connection failure </p>";
				} else {
					
					$marks = markQuiz($question1, $question2, $question3, $question4, $question5);
		
					$sql_table="attempts";
					
					// Query to show all database tables.
					$query = "SHOW TABLES";
					$result = mysqli_query($conn, $query);
					$check = true;
					
					// Look through the tables in the database to see if "attempts" exists. 
					while($row = mysqli_fetch_assoc($result)) {
						foreach($row as $val) {
							if ($val == $sql_table) {
								$check = false;
							}
						}
					}
					
					// If check doesn't exist, create the table.
					if($check) {
						$query = "CREATE TABLE attempts (
								 attempt_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
								 submit_datetime DATETIME ,
								 firstname VARCHAR(40) NOT NULL,
								 surname VARCHAR(40) NOT NULL,
								 sid bigint NOT NULL,
								 attemptnum INT NOT NULL,
								 score FLOAT NOT NULL)";
						$result = mysqli_query($conn, $query);
						if(!$result) {
							$errMsg = $errMsg . "Error creating database table";
						}
					}
					
					
					// Query to select all the attempnumber for all rows which match the student id.
					$query = "SELECT attemptnum FROM attempts WHERE sid = '$sid'";
					$result = mysqli_query($conn, $query);
					$attempts = 0;
					
					if(!$result) {
						echo "<p class=\"wrong\">Something is wrong with ",      $query, "</p>";
					} else {
						
						while ($row = mysqli_fetch_assoc($result)) {
							$attempts = max($row); // The max attempt for the student id.
						}
						
						if($attempts >= 3) {
							$errMsg = $errMsg . "You have had 3 attempts.<br>";
							$result = false;
						}
						if($question2 == "") {
							$errMsg = $errMsg . "Please answer Question 2<br>";
							$result = false;
						}
						
						if($question4 == "") {
							$errMsg = $errMsg . "Please answer Question 4<br>";
							$result = false;
						}
						
						if(strlen($sid) != 7 && strlen($sid) != 10) {
							$errMsg = $errMsg . "Student ID must be 7 or 10 digits<br>";
							$result = false;
						}
						
						if(preg_match("[A-Za-z\s-]", $firstname) || strlen($firstname) > 20) {
							$errMsg = $errMsg . "First name is too long, or uses illegal characers.<br>";
							$result = false;
						}
						
						if(preg_match("[A-Za-z\s-]", $surname) || strlen($surname) > 20) {
							$errMsg = $errMsg . "Last name is too long, or uses illegal characers.<br>";
							$result = false;
						}
					
						if($marks == 0) {
							$errMsg = $errMsg . "You have received no marks, please try again<br>";
							$result = false;
						}
							
						if($result != false) {
							$datetime = date("Y-m-d") . " " . date("h:i:s");
							$attempts++;
							
							// Query to insert attempt record into the database.
							$query = "INSERT INTO $sql_table (submit_datetime, firstname, surname, sid, attemptnum, score) VALUES ('$datetime','$firstname','$surname','$sid', '$attempts', '$marks')";
							$result = mysqli_query($conn, $query);
							if (!$result) {
								echo "<p class=\"wrong\">Something is wrong with ",      $query, "</p>";
							} else {
								
								// Table to output results for the attempt.
								echo "<table>\n";
								echo "<tr>\n "
									."<th scope=\"col\">Name</th>\n "
									."<th scope=\"col\">Student ID</th>\n "
									."<th scope=\"col\">Attempt</th>\n "
									."<th scope=\"col\">Score</th>\n "
									."<th scope=\"col\">Date</th>\n "
									."</tr>\n";
									 
									echo "<tr>\n ";
									echo "<td>",$firstname . " " . $surname,"</td>\n ";
									echo "<td>",$sid,"</td>\n ";
									echo "<td>",$attempts,"</td>\n ";
									echo "<td>",$marks,"</td>\n ";
									echo "<td>",$datetime,"</td>\n ";
									echo "</tr>\n ";
								echo "</table>";
	
								if($attempts <= 3) {
									echo "<p><a href=\"quiz.php\">Retry Quiz</a></p>";
								}
							}
						} else {
							echo "<p>",$errMsg,"</p>";
						}
					} 
				}
				mysqli_close($conn);
		?>
		</body>
	</html>