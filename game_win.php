<?php 
	session_start();
	// session_destroy();

  // Resets the game
	if (isset($_POST['start'])) {
    unset($_SESSION['selected']);
    unset($_SESSION['phrase']);
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

	<body>
<div class="main-container">    
    <h1 id="game-over-message">Congratulations on guessing: "<?php echo $_SESSION['phrase']; ?>."</h1>
  <form action="play.php" method="POST">
    <input id="btn__reset" type="submit" name="start" value="Play again!" />
  </form>
  </div>
</h1>
</body>
</html>