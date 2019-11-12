<?php 
// play.php to haxndle the HTML, instantiating objects, storing sessions and calling appropriate methods
	session_start();
	
	include "inc/Game.php";
	include 'inc/Phrase.php';

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
				$phrase = new Phrase($_SESSION['phrase'], $_SESSION['selected']);
				// echo "<pre>";
				//var_dump($phrase);
				// echo "</pre>";

				echo $phrase->addPhraseToDisplay();

				$game = new Game($phrase);
				// echo "<pre>";
				// var_dump($game);
				// echo "</pre>";
			?>
				<form method='POST' action='play.php'>
				<div id='qwerty' class='section'>
    			<!-- <div class='keyrow'> -->
						<?php
							echo $game->displayKeyboard();
						?>
					<!-- </div> -->
				</div>
				</form>
				<?php 
					// Will display the visual scoreboard 
					echo $game->displayScore();

					//Will check the letter pressed against the letters already selected & return true or false
					var_dump($phrase->checkLetter($_SESSION['selected']));
					
					//Returns values in the selected property of the Phrase class
					//var_dump($game->playerGuess($_SESSION['selected']));				

					echo "Looping through keyboard <br>";
					$game->loopThroughKeyboard();
					//var_dump($game->playerGuess($_SESSION['selected']));

				?>
		</div>
	</body>
</html>