<?php 
	session_start();
	// session_destro();
	include 'Phrase.php';

?>

<!-- <h1 id="game-over-message">Congratulations on guessing: "The adventure begins"</h1> -->

<h1 id="game-over-message">The phrase was: <?php echo $_SESSION['phrase']; ?>. Better luck next time!
    <form action="/play.php" method="POST">
        <input id="btn__reset" type="submit" name="start" value="Play again!" />
    </form>
</h1>