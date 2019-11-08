<?php 
	session_start(); 
	$_SESSION['phrase'] = 'start small';
	array_push($_SESSION['selected'], filter_input(INPUT_POST, 'input', FILTER_SANITIZE_STRING));
	//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Phrase Hunter</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	</head>

	<body>
		<div class="main-container">
			<h2 class="header">Phrase Hunter</h2>
			<?php // play.php to haxndle the HTML, instantiating objects, storing sessions and calling appropriate methods 
				include "inc/Game.php";
				include 'inc/Phrase.php';
		
				$phrase = new Phrase();
				// echo "<pre>";
				// var_dump($phrase);
				// echo "</pre>";

				echo $phrase->addPhraseToDisplay();

				$game = new Game($_SESSION);
				// echo "<pre>";
				// var_dump($game);
				// echo "</pre>";
			?>
				<form method='POST' action='play.php'>
					<?php
						echo $game->displayKeyboard();
						echo "<br>";
						//var_dump($_POST);

						// Will display the visual scoreboard 
						// echo $game->displayscore();
						// echo "<pre>";
						// var_dump($game);
						// echo "</pre>";

						var_dump($phrase->checkLetter('a'));
					?>
				</form>
		</div>
	</body>
</html>