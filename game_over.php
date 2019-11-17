<?php 
	session_start();
	// session_destro();

  // Resets the game
	if (isset($_POST['start'])) {
    unset($_SESSION['selected']);
    unset($_SESSION['phrase']);
  }
?>

<!-- <h1 id="game-over-message">Congratulations on guessing: "The adventure begins"</h1> -->
<div class="main-container">
			<h2 class="header">Phrase Hunter</h2>
<h1 id="game-over-message">The phrase was: <?php echo $_SESSION['phrase']; ?>. Better luck next time!
  <form action="play.php" method="POST">
    <input id="btn__reset" type="submit" name="start" value="Play again!" />
  </form>
  </div>
</h1>