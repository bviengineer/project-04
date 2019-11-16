<?php
// Phrase.php to create a Phrase class to handle the phrases
class Phrase 
{
	private $currentPhrase; //"Australia is known as the land Down Under";
	private $selected = [];
	public $randomPhrase = [
		"Boldness be my friend",
		"Borken crayons still color",
		"Carry on",
		"Dream big",
		"Dream without fear",
		"Leave no stone unturned",
		"Love without limits",
		"Make haste",
		"The adventure begins", 
	];

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
	// Check selected letter against the current phrase
	public function checkLetter($letter) {
		$parsedPhrase = array_unique(str_split(strtolower(str_replace(" ", "", $this->currentPhrase))));
		//$theLetter = $letter[count($letter)-1]; // gets most recent keypress 
		return in_array($letter, $parsedPhrase);
	}
	//Will return the array of letter seletions using the __get magic method 
	public function __get($selected) {
		return $this->selected;
	}
	public function getCurrentPhrase() {
		return $this->currentPhrase;
	}
}