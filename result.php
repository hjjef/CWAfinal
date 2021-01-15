<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8" />
			<meta name="description" content="Information on APNG - Animated PNG." />
			<meta name="keywords" content="COS10011, tags" />
			<meta name="author" content="101884292" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<title>APNG - Animated PNG</title>
			<script src="scripts/quiz.js"></script>
			<link href="styles/style.css" rel="stylesheet" />
		</head>
		
		<header>
			<h1>Results</h1>
		</header>
		
		<form id="resultsform">
			<fieldset>
				<legend>Your Results</legend>
				<p>Student ID: <span id="result_sid"></span></p>
				<p>Your Name: <span id="result_name"></span></p>
				<p>Total: <span id="result_total"></span></p>
				<p><span id="result_attempts"></span></p>
				<p>Q1: <span id="result_question1"></span></p>
				<p>Q2: <span id="result_question2"></span></p>
				<p>Q3: <span id="result_question3"></span></p>
				<p>Q4: <span id="result_question4"></span></p>
				<p>Q5: <span id="result_question5"></span></p>
		
				<input type="hidden" name="sid" id="sid" />
				<input type="hidden" name="name" id="name" />
				<input type="hidden" name="question1" id="question1" />
				<input type="hidden" name="question2" id="question2" />
				<input type="hidden" name="question3" id="question3" />
				<input type="hidden" name="question4" id="question4" />
				<input type="hidden" name="question5" id="question5" />
				<input type="hidden" name="total" id="total" />
				<input type="hidden" name="attempts" id="attempts" />
		
				<button type="button" id="retryButton">Retry</button>
			</fieldset>
		</form>
	</html>
	