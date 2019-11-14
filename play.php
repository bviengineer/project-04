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

	// private $keyboard = [];
	// private $keys;
	// private $topRowKeys;
	// private $middleRowKeys;
	// private $bottomRowKeys;

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

				echo $phrase->addPhraseToDisplay();

				// Instantiation of Game class
				$game = new Game($phrase);
			?>
			<form method='POST' action='play.php'>
				<div id='qwerty' class='section'>
						<?php
							echo $game->displayKeyboard();
						?>
				</div>
			</form>
				<?php
				// private $keyboard = [];
				// private $keys;
				// private $topRowKeys;
				// private $middleRowKeys;
				// private $bottomRowKeys; 
					// Storing keyboard output into a session variable
					$_SESSION['keys'] = $game->keys;
					// Storing keyboard by rows into individual session variables
					$_SESSION['topRow'] = $game->topRowKeys;
					$_SESSION['middleRow'] = $game->middleRowKeys;
					$_SESSION['bottomRow'] = $game->bottomRowKeys; 

					// Display the visual scoreboard 
					echo $game->displayScore();

					// Check letter pressed against the letters selected & return true or false
					//var_dump($phrase->checkLetter($_POST['input']));
					
					//Returns values in the selected property of the Phrase class
					// echo "<pre>";
					//$game->combineKeyboardRows();
					// echo "</pre>";
					//$game->verifyInputUpdateKeyboard());
					//var_dump($game->rowOneKeys());
					
				?>
		</div>
	</body>
</html>