<?php 
	session_start();

  // Reset game -> resseting session variables
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
    <link href="https://fonts.googleapis.com/css?family=Codystar&display=swap" rel="stylesheet">
	</head>

	<body>
    <div class="main-container lose-pg">
     <h2 class="header game-overlay-header">Phrase Hunter</h2> 
      <h1 id="game-over-message">
        <span class="remarks fail-pg-remarks">That one was tough!</span>
        <span class="fail-pg-emoji">&#x1F60C;</span><br>
        <span class="phrase" id="fail-pg-phrase"><?php echo $_SESSION['phrase']; ?></span><br> 
        <span class="remarks fail-pg-remarks">is the correct phrase.</span>
        <form action="play.php" method="POST">
          <input id="btn__reset" type="submit" name="start" value="Play again!" />
        </form>
      </h1>
    </div>
  </body>
</html>