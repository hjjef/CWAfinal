<!DOCTYPE html>
	<html lang="en">
		<?php require_once("header.inc"); ?>
		<body>
		<h1>Manage Quiz Results</h1>
		<?php
		
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
				$sql_table = "attempts";
				
				$action = $_POST["action"];
				
				$firstname = trim($_POST["name"]);
				$surname = trim($_POST["surname"]);
				$sid = trim($_POST["sid"]);
				$attemptnumber = trim($_POST["attemptnumber"]);
				$newscore = trim($_POST["newscore"]);
				$firstname = htmlspecialchars($firstname);
				$surname = htmlspecialchars($surname);
				$sid = htmlspecialchars($sid);
				$attemptnumber = htmlspecialchars($attemptnumber);
				$newscore = htmlspecialchars($newscore);
				
				// Flags to determine results format.
				$attemptTableFlag = false;
				$studentTableFlag = false;
				$confirmFlag = false;
				
				// Logic to choose which query to use based on form button pressed.
				if ($action == "List All Attempts") {
					$query = "SELECT * FROM attempts";
					$attemptTableFlag = true;
				} else if ($action == "List All 100% Attempt 1") {
					$query = "SELECT firstname, surname, sid FROM attempts WHERE attemptnum = '1' && score = '10'";
					$studentTableFlag = true;
				} else if ($action == "List All Under 50% Attempt 3") {
					$query = "SELECT firstname, surname, sid FROM attempts WHERE attemptnum = '3' && score < '5'";
					$studentTableFlag = true;
				} else if ($action == "List Attempts") {
					$query = "SELECT * FROM attempts WHERE sid = '$sid' || firstname = '$firstname'";
					$attemptTableFlag = true;
				} else if ($action == "Delete Attempts") {
					$query = "DELETE FROM attempts WHERE sid = '$sid'";
					$confirmFlag = true;
				} else if ($action == "Change Attempt Score") {
					$query = "UPDATE attempts SET score = '$newscore' WHERE attemptnum = '$attemptnumber' && sid = '$sid'";
					$confirmFlag = true;
				}
				$result = mysqli_query($conn, $query);
				
				if(!$result) {
					echo "<p>Something is wrong with ", $query, "</p>";
				} else {
					if($attemptTableFlag) {
						echo "<table>\n";
						echo "<tr>\n "
							."<th scope=\"col\">Name</th>\n "
							."<th scope=\"col\">Student ID</th>\n "
							."<th scope=\"col\">Attempt</th>\n "
							."<th scope=\"col\">Score</th>\n "
							."<th scope=\"col\">Date</th>\n "
							."</tr>\n";
						 
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>\n ";
							echo "<td>",$row["firstname"] . " " . $row["surname"],"</td>\n ";
							echo "<td>",$row["sid"],"</td>\n ";
							echo "<td>",$row["attemptnum"],"</td>\n ";
							echo "<td>",$row["score"],"</td>\n ";
							echo "<td>",$row["submit_datetime"],"</td>\n ";
							echo "</tr>\n ";
						}
						echo "</table>\n";
					}
					elseif($studentTableFlag) {
						echo "<table>\n";
						echo "<tr>\n "
							."<th scope=\"col\">Name</th>\n "
							."<th scope=\"col\">Student ID</th>\n "
							."</tr>\n";
						 
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>\n ";
							echo "<td>",$row["firstname"] . " " . $row["surname"],"</td>\n ";
							echo "<td>",$row["sid"],"</td>\n ";
							echo "</tr>\n ";
						}
						echo "</table>\n";
					}
					elseif($confirmFlag) {
						echo "<p>Change Successful</p>";
					}
				}
				echo "<p><a href=\"manage.php\">Back</a></p>";
			}

		?>
		</body>
	</html>
