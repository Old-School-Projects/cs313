<?php
	$gender = $_POST["gender"];
	$eat = $_POST["eat"];
	$sleep = $_POST["sleep"];
	$meal = $_POST["meal"];

	

?>

<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="mainstyles.css">
	<title>Paul's Site | Results</title>

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
		<div id="center">
			<h3>RESULTS</h3>

			<?php 

			$results = "<p>Thank you for taking the survey!</p>";
			$results .= "<p>You are <b>$gender</b>.</p>";
			$results .= "<p>Do you eat breakfast in the morning? <b>$eat</b></p>";
			$results .= "<p>Do you fall asleep in class ever? <b>$sleep</b></p>";
			$results .= "<p>What's the most important meal of the day? <b>$meal</b></p>";



			$file = file_get_contents("surveyText.txt");

			if ($file) {
				print($file);
			} 
			else {

			$file = fopen("surveyText.txt", "w");

				if ($file){
					fwrite($file, $results);
					print($results);
					fclose($file);
				} 

				else {
				die("File could not be found or created!");
				}
			}

		?>

		</div>
	</body>

</hmtl>