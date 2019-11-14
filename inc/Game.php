<?php
// Game.php to create a Game class with methods for showing the game, handling interactions, and checking for game over.

class Game 
{
	private $phrase;
	private $lives = 5;
	//private $chars; // keybord characters 
	private $hearts; // visual game board
	//public  $value;
	private $top_row = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p'];
	private $middle_row = ['a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l'];
	private $bottom_row = ['z', 'x', 'c', 'v', 'b', 'n', 'm'];
	private $keyboard = [];
	public $keys;
	public $topRowKeys;
	public $middleRowKeys;
	public $bottomRowKeys;
	private $openDivTag = "<div class='keyrow'>";
	private $closeDivTag = "</div>";

	// Constructor method 
	public function __construct($phraseObject) {
		$this->phrase = $phraseObject;
	}
	// Print keyboard to the page
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
		$selectedLetters = $this->phrase->selected; // array of letters in the selected property
		foreach ($this->top_row as $f_row) {
			if (!in_array($f_row, $selectedLetters) && $this->phrase->checkLetter($f_row) == false ) {
					$this->topRowKeys .= "<button type='submit' class='key' name='input' value='" . $f_row . "'>" . $f_row . "</button>";
			}
			if (in_array($f_row, $selectedLetters) && $this->phrase->checkLetter($f_row) == true) {
					$this->topRowKeys .= "<button type='submit' class='correct' name='input' value='" . $f_row . "' disabled>" . $f_row . "</button>";
			}
			if (in_array($f_row, $selectedLetters) && $this->phrase->checkLetter($f_row) == false) {
				$this->topRowKeys .= "<button type='submit' class='incorrect' name='input' value='" . $f_row . "' disabled>" . $f_row . "</button>";
			}		
		}
		return $this->keys .= $this->topRowKeys;
	}
	// Loops through and returns second row of keyboard
	public function rowTwoKeys(){
		foreach ($this->middle_row as $m_row) {
			if (!in_array($m_row, $this->phrase->selected) && $this->phrase->checkLetter($m_row) == false ) {
				$this->middleRowKeys .= "<button type='submit' class='key' name='input' value='" . $m_row . "'>" . $m_row . "</button>";
		}
		if (in_array($m_row, $this->phrase->selected) && $this->phrase->checkLetter($m_row) == true) {
				$this->middleRowKeys .= "<button type='submit' class='key correct' name='input' value='" . $m_row . "' disabled>" . $m_row . "</button>";
		}
		if (in_array($m_row, $this->phrase->selected) && $this->phrase->checkLetter($m_row) == false) {
			$this->middleRowKeys .= "<button type='submit' class='key incorrect' name='input' value='" . $m_row . "' disabled>" . $m_row . "</button>";
		}		
	}
		return $this->keys .= $this->middleRowKeys;
}
	// Loops through and returns third row of keyboard
	public function rowThreeKeys() {
		foreach ($this->bottom_row as $b_row) {
			if (!in_array($b_row, $this->phrase->selected) && $this->phrase->checkLetter($b_row) == false ) {
				$this->bottomRowKeys .= "<button type='submit' class='key' name='input' value='" . $b_row . "'>" . $b_row . "</button>";
		}
		if (in_array($b_row, $this->phrase->selected) && $this->phrase->checkLetter($b_row) == true) {
				$this->bottomRowKeys .= "<button type='submit' class='key correct' name='input' value='" . $b_row . "' disabled>" . $b_row . "</button>";
		}
		if (in_array($b_row, $this->phrase->selected) && $this->phrase->checkLetter($b_row) == false) {
			$this->bottomRowKeys .= "<button type='submit' class='key incorrect' name='input' value='" . $b_row . "' disabled>" . $b_row . "</button>";
		}
		return $this->keys .= $this->bottomRowKeys;
	}
	// Listens for & verifies keyboard selection; update keyboard 
	//public function verifyInputUpdateKeyboard() {

		//foreach ($this->combineKeyboardRows() as $key) {
			// If a key is not selected return defaul HTML buttons
			// if (!in_array($key, $selectedLetters) && in_array($key, $this->top_row)) {
			// 		$this->topRowKeys = "";
			// 		$this->topRowKeys .= "<button class='key' name='input' value='" . $key . "'>" . $key . "</	button>";
			// 		$this->$keys .= $this->topRowKeys;
			// } 
			// if (!in_array($key, $selectedLetters) && in_array($key, $this->middle_row)) {
			// 		$this->middleRowKeys = "";
			// 		$this->middleRowKeys[$key] .= "<button class='key' name='input' value='" . $key . "'>" . $key . "</	button>";
			// 		$this->$keys .= $this->middleRowKeys;
			// } 
			// if (!in_array($key, $selectedLetters) && in_array($key, $this->bottom_row)) {
			// 		$this->bottomRowKeys = "";
			// 		$this->bottomRowKeys[$key] .= "<button class='key' name='input' value='" . $key . "'>" . $key . "</	button>";
			// 		$this->$keys .= $this->bottomRowKeys;
			// }
			// If key is selected & not in the phrase
		// if (in_array($key, $selectedLetters) && $this->phrase->checkLetter($key) == false) {
		// 		$this->keys .= "<button class='key incorrect' name='input' value='" . $key . "' style='background-color: red' disabled>" . $key . "</	button>";
		// } elseif (!in_array($key, $selectedLetters) && in_array($key, $this->middle_row)) {
		// 		$this->keys .= "<button class='key incorrect' name='input' value='" . $key . "' style='background-color: red' disabled>" . $key . "</	button>";
		// } elseif (!in_array($key, $selectedLetters) && in_array($key, $this->bottom_row)) {
		// 		$this->keys .= "<button class='key incorrect' name='input' value='" . $key . "' style='background-color: red' disabled>" . $key . "</	button>";
		// 	}
		// }
	// If a key is selected and is in the phrase
	// 		if (in_array($key, $selectedLetters) && $this->phrase->checkLetter($key) == true) {
	// 				// $this->keys .=  "<button class='key correct' name='input' value='" . $key .  "' disabled>" . $key . "</button>";
	// 				echo $key . " is a correct guess <br>";
	// 		}
	//  }
	public function displayScore() {
		$this->hearts = "<div id='scoreboard' class='section'><ol>";
		for ($i = 0; $i <= $this->lives-1; $i++) {
        	$this->hearts .= "<li class='tries'><img src='images/liveHeart.png' height='35px' widght='30px'></li>";
		}
		$this->hearts .= "</ol></div>";
		return $this->hearts;
	}
	// Combine keyboard rows 
	public function combineKeyboardRows() {
		$row1 = implode($this->top_row);
		$row2 = implode($this->middle_row);
		$row3 = implode($this->bottom_row);
		$allrows = $row1 . $row2 . $row3;
		return $this->keyboard = str_split($allrows);
	}
}
