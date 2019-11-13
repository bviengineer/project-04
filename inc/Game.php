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

	public function __construct($phraseObject) {
		$this->phrase = $phraseObject;
	}

	// Prints keyboard to the page
	public function displayKeyboard() {
		$this->keys .= "<div class='keyrow'>";
		foreach ($this->top_row as $f_row) {
			$this->keys .= "<button class='key' name='input' value='" . $f_row . "'>" . $f_row . "</button>";	
		}
		$this->keys .= "</div>";

		$this->keys .= "<div class='keyrow'>";
		foreach ($this->middle_row as $m_row) {
			$this->keys .= "<button class='key' name='input' value='" . $m_row . "'>" . $m_row . "</button>";	
		}
		$this->keys .= "</div>";

		$this->keys .= "<div class='keyrow'>";
		foreach ($this->bottom_row as $b_row) {
			$this->keys .= "<button class='key' name='input' value='" . $b_row . "'>" . $b_row . "</button>";	
		}
		$this->keys .= "</div>";

		// $this->chars .= "<button class='key' name='input' value='t' style='background-color: red' disabled>t</button>";
		return $this->keys;
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
		$keyboard = str_split($allrows);

		foreach ($keyboard as $key) {
			if (in_array($key, $selectedLetters) || !in_array($key, $selectedLetters)) {
					if ($this->phrase->checkLetter($key) == true) {
							echo $key . "<br>";
					} 
			} else {
					echo $key . " is not in the array & not in the phrase<br>";
			}
		}
	}
}
