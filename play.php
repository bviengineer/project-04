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
	<?php // play.php to handle the HTML, instantiating objects, storing sessions and calling appropriate methods 
		include "inc/Game.php";
		include 'inc/Phrase.php';

		$game = new Game;
		var_dump($game);
		$phrase = new Phrase;
		var_dump($phrase);
	?>
	<div class="main-container">
			<div id="banner" class="section">
					<h2 class="header">Phrase Hunter</h2>
			</div>
	</div>
</body>
</html>
