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

			$maleCount = 0;
			$femaleCount = 0;
			$bfastY = 0;
			$bfastN = 0;
			$sleepY = 0;
			$sleepN = 0;
			$breakfast = 0;
			$lunch = 0;
			$dinner = 0;
			$secondBr = 0;

			$list[10];

			$file = fopen("surveyResults.txt", "r");

			$count = 0;
			if ($file) {
				while ($line = fgets($file)){
					$list[$count] = intval($line);
					$count++;
				}
			} 

			//*************************************************

			if ($gender == "male"){
				$maleCount = $list[0];
				$maleCount++;
				$list[0] = $maleCount;

			} else {
				$femaleCount = $list[1];
				$femaleCount++;
				$list[1] = $femaleCount;

			}

			if ($eat == "yes"){
				$bfastY = $list[2];
				$bfastY++;
				$list[2] = $bfastY;

			} else {
				$bfastN = $list[3];
				$bfastN++;
				$list[3] = $bfastN;
			}

			if ($sleep == "yes") {
				$sleepY = $list[4];
				$sleepY++;
				$list[4] = $sleepY;

			} else {
				$sleepN = $list[5];
				$sleepN++;
				$list[5] = $sleepN;
			}

			if ($meal == "Breakfast"){
				$breakfast = $list[6];
				$breakfast++;
				$list[6] = $breakfast;

			} elseif ($meal == "Lunch") {
				$lunch = $list[7];
				$lunch++;
				$list[7] = $lunch;

			} elseif ($meal == "Dinner") {
				$dinner = $list[8];
				$dinner++;
				$list[8] = $dinner;

			} elseif ($meal == "SecondBreakfast") {
				$secondBr = $list[9];
				$secondBr++;
				$list[9] = $secondBr;
			}

		?>


		<p>
			This many females took the survey: <?php echo "<b>$list[1]</b>"; ?>
		</p>
		<p>
			This many males took the survey: <?php echo "<b>$list[0]</b>"; ?>
		</p>
		<p>
			Eat breakfast in the morning: <?php echo "<b>$list[2]</b>"; ?>
		</p>
		<p>
			Do not eat breakfast in the morning: <?php echo "<b>$list[3]</b>"; ?>
		</p>
		<p>
			Fall asleep during class: <?php echo "<b>$list[4]</b>"; ?>
		</p>
		<p>
			Do not fall asleep during class: <?php echo "<b>$list[5]</b>"; ?>
		</p>
		<p>
			The most important meal of the day: <br />
			Breakfast: <?php echo "<b>$list[6]</b>"; ?> <br />
			Lunch: <?php echo "<b>$list[7]</b>"; ?> <br />
			Dinner: <?php echo "<b>$list[8]</b>"; ?> <br />
			SecondBreakfast: <?php echo "<b>$list[9]</b>"; ?> <br />
		</p>

		<?php

		$results = "";
		foreach ($list as $key => $thing) {
   			$results .= "$thing" . "\n";
		}

		file_put_contents("surveyResults.txt", "$results");

		?>


		</div>
	</body>

</hmtl>