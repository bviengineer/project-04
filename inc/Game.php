<?php
// Game.php to create a Game class with methods for showing the game, handling interactions, and checking for game over.

class Game 
{
	private $phrase;
	private $lives = 5;
	private $chars; // keybord characters 
	private $hearts; // visual game board
	public $value;
	private $top_row = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p'];
	private $middle_row = ['a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l'];
	private $bottom_row = ['z', 'x', 'c', 'v', 'b', 'n', 'm'];
	private $keyboard = [];
	private $keys;
	private $openDivTag = "<div class='keyrow'>";
	private $closeDivTag = "</div>";

	public function __construct($phraseObject) {
		$this->phrase = $phraseObject;
	}

	// Prints keyboard to the page
	public function displayKeyboard() {
		$this->keys .= $this->openDivTag;
		$this->rowOneKeys();
		$this->keys .= $this->closeDivTag;

		$this->keys .= $this->openDivTag;
		$this->rowTwoKeys();
		$this->keys .= $this->closeDivTag;

		$this->keys .= $this->openDivTag;
		$this->rowThreeKeys();
		$this->keys .= $this->closeDivTag;

		return $this->keys;
	}
	// Loops through and returns first row of keyboard 
	public function rowOneKeys() {
		foreach ($this->top_row as $f_row) {
			$this->keys .= "<button class='key' name='input' value='" . $f_row . "'>" . $f_row . "</button>";
		}
		return $this->keys;
	}
	// Loops through and returns second row of keyboard
	public function rowTwoKeys(){
		foreach ($this->middle_row as $m_row) {
			$this->keys .= "<button class='key' name='input' value='" . $m_row . "'>" . $m_row . "</	button>";	
		}
		return $this->keys;
	}
	// Loops through and returns third row of keyboard
	public function rowThreeKeys() {
		foreach ($this->bottom_row as $b_row) {
			$this->keys .= "<button class='key' name='input' value='" . $b_row . "'>" . $b_row . "</button>";	
		}
	}
	public function displayScore() {
		$this->hearts = "<div id='scoreboard' class='section'><ol>";
		for ($i = 0; $i <= $this->lives-1; $i++) {
        	$this->hearts .= "<li class='tries'><img src='images/liveHeart.png' height='35px' widght='30px'></li>";
		}
		$this->hearts .= "</ol></div>";
		return $this->hearts;
	}
	// Check keyboard keys against the selected property 
	public function keyboard() {
		$selectedLetters = $this->phrase->selected; // array of letters in the selected property
		$row1 = implode($this->top_row);
		$row2 = implode($this->middle_row);
		$row3 = implode($this->bottom_row);
		$allrows = $row1 . $row2 . $row3;
		$this->keyboard = str_split($allrows);

		foreach ($this->keyboard as $key) {
			if (!in_array($key, $selectedLetters)) {
					// $this->keys .= "<button class='key' name='input' value='" . $key . "'>" . $key . "</button>";
					echo $key . " player didn't select a key <br>";
			}
			if (in_array($key, $selectedLetters) && $this->phrase->checkLetter($key) == false) {
					// $this->keys .= "<button class='key incorrect' name='input' value='" . $key .  "' disabled>" . $key . "</button>";
					echo $key . " is not a correct guess <br>";
			} 
			if (in_array($key, $selectedLetters) && $this->phrase->checkLetter($key) == true) {
					// $this->keys .=  "<button class='key correct' name='input' value='" . $key .  "' disabled>" . $key . "</button>";
					echo $key . " is a correct guess <br>";
			}
		}
	}
}
