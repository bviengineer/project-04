<?php
/*================================================================
	Phrase.php creates Phrase class and handles the phrases
=================================================================*/

class Phrase 
{
	private $currentPhrase;
	private $selected = [];
	public $randomPhrase = [
		"Boldness be my friend",
		"Broken crayons still color",
		"Carry on",
		"Dream big",
		"Dream without fear",
		"Leave no stone unturned",
		"Love without limits",
		"Make haste",
		"The adventure begins", 
	];

// Consturctor method 
public function __construct($currentPhrase = null, $selected = array() ) {
	if (!empty($currentPhrase)) {
		$this->currentPhrase = $currentPhrase;
	}
	if (!empty($selected)) {
		$this->selected = $selected;
	} 
	if(!isset($currentPhrase)) {
		$getPhrase = rand(0, count($this->randomPhrase)-1);
		$this->currentPhrase = $this->randomPhrase[$getPhrase];
	}
}

// Add the phrase to be guessed to the page as blank squares
public function addPhraseToDisplay() {
	$phraseToGuess = str_split(strtolower($this->currentPhrase));
	$phraseDisplay = "<ul>";
	
	foreach ($phraseToGuess as $thePhrase) {
		if ($thePhrase == " ") {
			$phraseDisplay .= "<li class='space'>" . $thePhrase . "</li>";
		} elseif (!in_array($thePhrase, $this->selected)) {
				$phraseDisplay .= "<li class='hide letter'>" . $thePhrase . "</li>";
		} elseif (in_array($thePhrase, $this->selected)) {
				$phraseDisplay .= "<li class='show letter'>" . $thePhrase . "</li>";
		}
	}
		$phraseDisplay .= "</ul>";
		return $phraseDisplay;
}

// Checks and returns user selected letter against the letters in the current phrase
public function checkLetter($letter) {
	return in_array($letter, $this->getLetterArray());
}

// Returns array of letter seletions using the __get magic method 
public function __get($selected) {
	return $this->selected;
}

// Returns the current phrase
public function getCurrentPhrase() {
	return $this->currentPhrase;
}

// Returns lowercase unique letters in the current phrase 
public function getLetterArray() {
	$uniqueLetters = array_unique(str_split(strtolower(str_replace(" ", "", $this->currentPhrase))));
	return $uniqueLetters;
}

// Calculates the number of incorrcet letter guesses in nubmer form 
public function numberLost() {
	$wrongGussess = array_diff($this->selected, $this->getLetterArray());
		return count($wrongGussess);
	}
}