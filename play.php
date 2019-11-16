<?php 
// play.php to haxndle the HTML, instantiating objects, storing sessions and calling appropriate methods
	session_start();
	
	include "inc/Game.php";
	include 'inc/Phrase.php';

	// Resets the game
	if (isset($_POST['start'])) {
			unset($_SESSION['selected']);
			unset($_SESSION['phrase']);
	}
	// Checks for user selection 
	if (isset($_SESSION['selected']) && isset($_POST['input'])) {
			array_push($_SESSION['selected'], filter_input(INPUT_POST, 'input', FILTER_SANITIZE_STRING));
	} else {
			$_SESSION['selected'] = [];
	}
	$_SESSION['phrase'] = 'start small';

	//var_dump($_SESSION);
	//session_destroy();
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
			<?php 
				// Instantiation of Phrase class
				$phrase = new Phrase($_SESSION['phrase'], $_SESSION['selected']);

				// Printing empty boxes representing phrase, to the page
				echo $phrase->addPhraseToDisplay();

				// Instantiation of Game class
				$game = new Game($phrase);
			?>
			<form method='POST' action='play.php'>
				<div id='qwerty' class='section'>
						<?php
							// Printing the keyboard to the screen
							echo $game->displayKeyboard();
						?>
				</div>
			</form>
			<?php
				// Display the visual scoreboard 
				echo $game->displayScore();
			?>
		</div>
	</body>
</html>