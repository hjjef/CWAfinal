/*
filename: quiz.js
author: Henry Jeffers
created: 29/09/2020
last modified: 29/09/2020
description: refers to assign3/quiz.php and assign3/result.php
*/

"use strict";


/* Function to validate the input on the Quiz.
*/
function validateQuiz() {
	
	var errMsg = "";
	var result = true;
	
	sessionStorage.sid = document.getElementById("sid").value;
	var question1 = getAnswer("question1");
	var question2 = document.getElementById("question2").value;
	var question3 = document.getElementById("question3").value;
	var question4 = getAnswer("question4");
	var question5 = document.getElementById("question5").value;
	var marks = markQuiz(question1, question2, question3, question4, question5);
	
	// Check Q2 is answered.
	if (question2 == "") {
		errMsg += "Please answer Question 2\n";
		result = false;
	}
	// Check Q4 is answered.
	if (question4 == "") {
		errMsg += "Please answer Question 4\n";
		result = false;
	}
	// Check that the user has attempts remaining, based on student ID.
	if (localStorage.getItem(sessionStorage.sid) >= "3") {
		errMsg += "You have no attempts remaining.\n";
		result = false;
	}
	// Check that the user received marks.
	if (marks == "0") {
		errMsg += "You have received no marks, please try again\n";
		result = false;
	}
	
	if (errMsg != "") {
		alert(errMsg);
	}
	
	if(result) {
		saveQuiz();
	}
	
	return result;
}

/* Function to reset the quiz if there are attempts available
 */
function resetQuiz() {
	if (localStorage.getItem(sessionStorage.sid) >= "3") {
		alert("You have no attempts remaining.");
	}
	window.location = "quiz.html";
}

/* Function to get results for result.html form. Formats results and displays them.
 */
function getResults() {
	// Add event listener to the reset button on the form.
	document.getElementById("retryButton").addEventListener("click", resetQuiz);
	// Only fill form if student id data is set.
	if(sessionStorage.sid != undefined){
		var marks = markQuiz(sessionStorage.question1, sessionStorage.question2, sessionStorage.question3, sessionStorage.question4, sessionStorage.question5);
		var total = "You have recieved " + marks + "/10 marks";
		document.getElementById("result_name").textContent = sessionStorage.name + " " + sessionStorage.famname;
	    document.getElementById("result_sid").textContent = sessionStorage.sid;
		document.getElementById("result_total").textContent = total;
		document.getElementById("result_attempts").textContent = "You have had " + localStorage.getItem(sessionStorage.sid) + "/3 attempts";
		document.getElementById("result_question1").textContent = "Your answer: " + sessionStorage.question1 + ", Correct answer: C";
		document.getElementById("result_question2").textContent = "Your answer: " + sessionStorage.question2 + ", Correct answer: 24bit";
		document.getElementById("result_question3").textContent = "Your answer: " + sessionStorage.question3 + ", Correct answer: It used the .apng extension";
		document.getElementById("result_question4").textContent = "Your answer: " + sessionStorage.question4 + ", Correct answer: AC";
		document.getElementById("result_question5").textContent = "Your answer: " + sessionStorage.question5 + ", Correct answer: 2004";

		document.getElementById("firstname").value = sessionStorage.firstname;
		document.getElementById("lastname").value = sessionStorage.lastname;
		document.getElementById("sid").value = sessionStorage.sid;
		document.getElementById("question1").value = sessionStorage.question1;
		document.getElementById("question2").value = sessionStorage.question2;
		document.getElementById("question3").value = sessionStorage.question3;
		document.getElementById("question4").value = sessionStorage.question4;
		document.getElementById("question5").value = sessionStorage.question5;
		document.getElementById("total").value = total;
	}
}

/* Function to mark the quiz based on results. Returns a number out of 10.
 */
function markQuiz( Q1, Q2, Q3, Q4, Q5 ) {
	var total = 0;
	if(Q1 == "C") {
		total += 2;
	}
	if(Q2 == "24bit") {
		total += 2;
	}
	if(Q3.includes(".APNG") || Q3.includes(".apng") || Q3.includes("apng") || Q3.includes("APNG"))
	{
		total += 1;
	}
	if(Q3.includes("extension")) {
		total += 1;
	}
	if(Q4.includes("A") || Q4.includes("C")) {
		if(Q4 == "AC") {
			total += 2;
		}
		else {
			total += 1;
		}
	}
	if(Q5 == "2004") {
		total += 2;
	}
	return total;
}

/* Function to save the quiz data as session storage
 * Also increments the number of attempts per user.
 */
function saveQuiz() {
	sessionStorage.sid = document.getElementById("sid").value;
	sessionStorage.name = document.getElementById("name").value;
	sessionStorage.famname = document.getElementById("famname").value;
	sessionStorage.question1 = getAnswer("question1");
	sessionStorage.question2 = document.getElementById("question2").value;
	sessionStorage.question3 = document.getElementById("question3").value;
	sessionStorage.question4 = getAnswer("question4");
	sessionStorage.question5 = document.getElementById("question5").value;
	
	// Increment the counter for user.
	var count = localStorage.getItem(sessionStorage.sid);
	if (Number(count) >= "1") {
		localStorage.setItem(sessionStorage.sid, 1 + Number(count));
	}
	// Initialize the local storage for first time user.
	else {
		localStorage.setItem(sessionStorage.sid, 1);
	}
}

/* Function to return the answer for checkbox questions
 * Will return the value of all checked answers concatenated.
 */
function getAnswer(question) {
	var answer = "";
	var answerArray = document.getElementById(question).getElementsByTagName("input");
	
	for (var i = 0; i < answerArray.length; i++) {
		if (answerArray[i].checked)
			answer += answerArray[i].value;
	}
	
	return answer;
}

/* Initilization function
 * action depends on current form.
 */
function init() {
	var quizForm = document.getElementById("quizform");
	var resultsForm = document.getElementById("resultsform");
	
	if(quizForm != null) {
		quizForm.onsubmit = validateQuiz;
	}
	else if(resultsForm != null) {
		getResults();
	}
	else {
		return false;
	}
}

window.onload = init;


