<?php
// Game.php to create a Game class with methods for showing the game, handling interactions, and checking for game over.

class Game 
{
	private $phrase;
	private $lives = 5;

	public function __construct($phraseObject) {
		$this->phrase = $phraseObject;
	}
}