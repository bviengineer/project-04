<?php
// Game.php to create a Game class with methods for showing the game, handling interactions, and checking for game over.

class Game 
{
	private $phrase;
	private $lives = 5;
	private $hearts; // visual game board
	private $top_row = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p'];
	private $middle_row = ['a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l'];
	private $bottom_row = ['z', 'x', 'c', 'v', 'b', 'n', 'm'];
	public 	$keys;
	public 	$topRowKeys;
	public 	$middleRowKeys;
	public 	$bottomRowKeys;
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
		foreach ($this->top_row as $f_row) {
			if (!in_array($f_row, $this->phrase->selected)) {
					$this->topRowKeys .= "<button type='submit' class='key' name='input' value='"; 
					$this->topRowKeys .= $f_row . "'>" . $f_row . "</button>";
			}
			if (in_array($f_row, $this->phrase->selected) && $this->phrase->checkLetter($f_row) == true) {
					$this->topRowKeys .= "<button type='submit' class='key chosen' name='input' value='";
					$this->topRowKeys .= $f_row . "' disabled>" . $f_row . "</button>";
			}
			if (in_array($f_row, $this->phrase->selected) && $this->phrase->checkLetter($f_row) == false) {
				$this->topRowKeys .= "<button type='submit' class='key wrong' name='input' value='"; 
				$this->topRowKeys .= $f_row . "' disabled>" . $f_row . "</button>";
			}		
		}
		return $this->keys .= $this->topRowKeys;
	}
	// Loops through and returns second row of keyboard
	public function rowTwoKeys(){
		foreach ($this->middle_row as $m_row) {
			if (!in_array($m_row, $this->phrase->selected)) {
				$this->middleRowKeys .= "<button type='submit' class='key' name='input' value='";
				$this->middleRowKeys .= $m_row . "'>" . $m_row . "</button>";
		}
		if (in_array($m_row, $this->phrase->selected) && $this->phrase->checkLetter($m_row) == true) {
				$this->middleRowKeys .= "<button type='submit' class='key chosen' name='input' value='";
				$this->middleRowKeys .= $m_row . "' disabled>" . $m_row . "</button>";
		}
		if (in_array($m_row, $this->phrase->selected) && $this->phrase->checkLetter($m_row) == false) {
			$this->middleRowKeys .= "<button type='submit' class='key wrong' name='input' value='";
			$this->middleRowKeys .= $m_row . "' disabled>" . $m_row . "</button>";
		}		
	}
		return $this->keys .= $this->middleRowKeys;
}	// Loops through and returns third row of keyboard
public function rowThreeKeys() {
	foreach ($this->bottom_row as $b_row) {
		if (!in_array($b_row, $this->phrase->selected)) {
			$this->bottomRowKeys .= "<button type='submit' class='key' name='input' value='";
			$this->bottomRowKeys .= $b_row . "'>" . $b_row . "</button>";
		}
		if (in_array($b_row, $this->phrase->selected) && $this->phrase->checkLetter($b_row) == true) {
				$this->bottomRowKeys .= "<button type='submit' class='key chosen' name='input' value='";
				$this->bottomRowKeys .= $b_row . "' disabled>" . $b_row . "</button>";
		}
		if (in_array($b_row, $this->phrase->selected) && $this->phrase->checkLetter($b_row) == false) {
			$this->bottomRowKeys .= "<button type='submit' class='key wrong' name='input' value='";
			$this->bottomRowKeys .= $b_row . "' disabled>" . $b_row . "</button>";
		}
	}
	return $this->keys .= $this->bottomRowKeys;
}
public function displayScore() {
	$this->hearts = "<div id='scoreboard' class='section'><ol>";
	$winHearts = "<li class='tries'><img src='images/liveHeart.png' height='35px' widght='30px'></li>";
	$loseHearts = "<li class='tries'><img src='images/lostHeart.png' height='35px' widght='30px'></li>";

	$this->lives = $this->lives - $this->phrase->numberLost(); // updating # of wins based on losses 
	if ($this->lives == 5) {
			for ($win = 1; $win <= $this->lives; $win++) {
						$this->hearts .= $winHearts;
			} 
		} elseif ($this->lives >= 0 && $this->lives < 5 && $this->phrase->numberLost() >= 1 && $this->phrase->numberLost() <= 5) {
				for ($win = 1; $win <= $this->lives; $win++) {
					$this->hearts .= $winHearts;
				}
				for ($lose = 1; $lose <= $this->phrase->numberLost(); $lose++) {
					$this->hearts .= $loseHearts;
				}
		}
	 $this->hearts .= "</ol></div>";
	 return $this->hearts;
	}
	// Checks whether player unsuccessful attempts have reached 5 tries
	public function checkForLose() {
		if ($this->phrase->numberLost() == 5) {
			return true;
		} else {
			return false;
		}
	}
	// Displays game over message to player 
	public function gameOver() {
		if ($this->checkForLose()) {
				header('Location: game_over.php');
				exit;
		} else { 
				$this->checkForWin();
				//false;
			} 
	}
	public function checkForWin() {
		$arrayIntersect = array_intersect($this->phrase->selected, $this->phrase->getLetterArray()); 
				if (count($arrayIntersect) == count($this->phrase->getLetterArray)) {
						header('Location: game_win.php');
		} else {
				return false;
		}
	}
}
