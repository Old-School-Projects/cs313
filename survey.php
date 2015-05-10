<?php

session_start();
?>

<html>
    <head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="mainstyles.css">
	<title>Paul's Site | Survey</title>

	<nav id="cssmenu">
            <ul>
                <li><a href="index.php"><span>Home</span></a></li>
                <li><a href="assignments.php"><span>CS313 Assignments</span></a></li>
                <li><a href="projects.php"><span>Projects</span></a></li>
                <li class="last"><a href="aboutme.php"><span>About Me</span></a></li>
            </ul>
	</nav>
	</head>

	<body>
		<br />
		<div id="center">
		<form name="survey" onchange="" action="survey_results.php" method="POST">
			<h4>What's your gender?</h4>
			<input type="radio" name="gender" value="male" />Male<br />
            <input type="radio" name="gender" value="female" />Female<br />
			<h4>Did you have breakfast this morning?</h4>
			<input type="radio" name="eat" value="yes" />Yes<br />
            <input type="radio" name="eat" value="no" />No<br />
			<h4>Do you fall asleep during class ever?</h4>
			<input type="radio" name="sleep" value="yes" />Yes<br />
            <input type="radio" name="sleep" value="no" />No<br />
			<h4>What's the most important meal of the day?</h4>
			<input type="radio" name="meal" value="Breakfast" />Breakfast<br />
            <input type="radio" name="meal" value="Lunch" />Lunch<br />
            <input type="radio" name="meal" value="Dinner" />Dinner<br />
            <input type="radio" name="meal" value="SecondBreakfast" />Second Breakfast<br />
            <br />
            <input type="submit" value="Submit">
		</form>  
		</div>          
	</body>

</hmlt>