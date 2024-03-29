<?php 
	/*================================================================
		Play.php: Manage HTML, instantiating objects, storing sessions 
		and calling appropriate methods
	=================================================================*/
	session_start();
	
	/*==================================================================
	 Turn off Warning: Notice: Undefined index: phrase in
	/Users/kaismapenn-titley/Documents/techdegree/project-04/play.php 
	on line 43
	===================================================================*/
	error_reporting(0);
	
	// Include game and phrase files
	include "inc/Game.php";
	include "inc/Phrase.php";

	// Reset game -> resseting session variables 
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
	<body class="bg">
		<div class="main-container">
			<h2 class="header game-pg-header">Phrase Hunter</h2>
			<h3 class="game-title"> "Wise beyond your years"</h3>
			<?php 
				// Instantiation of Phrase class
				$phrase = new Phrase($_SESSION['phrase'], $_SESSION['selected']);
				
				// Setting phrase in session varaible to a random phrase 
				$_SESSION['phrase']= $phrase->getCurrentPhrase();
				
				// Printing empty boxes representing a random phrase, to the page
				echo $phrase->addPhraseToDisplay();

				// Instantiation of Game class
				$game = new Game($phrase);
			?>
			<form method='POST' action='play.php'>
				<div id='qwerty' class='section'>
						<?php
							// Printing the keyboard to the screen
							echo $game->displayKeyboard();
							
							// TESTING CURRENT PHRASE
							//var_dump($phrase->getCurrentPhrase());
						?>
				</div>
			</form>
			<?php
				// Display the visual scoreboard 
				echo $game->displayScore();

				// Verifies if player has 5 or more inccorrect guesses and
				// Calls method that determines if player wins the game
				$game->gameOver();
			?>
		</div>
		<script src="js/script.js"></script>
	</body>
</html>