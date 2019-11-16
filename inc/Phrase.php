<?php
// Phrase.php to create a Phrase class to handle the phrases
class Phrase 
{
	private $currentPhrase = "dream big"; //"Australia is known as the land Down Under";
	private $selected = [];
	public $randomPhrase = [
		"Birds of a feather flock together",
		"Carry on",
		"Do unto others as you would have them do unto you", // Matthew 7:12
		"Dream big",
		"Empty vessels make the most noise",
		"Hatred stirs up strive, But love covers all offenses", // Proverbs 10:12
		"Love your neighbor as yourself", // Mark 12:31
		"Make haste",
		"Necessity is the mother of invention", 
	];

	public function __construct($currentPhrase = null, $selected = array() ) {
		if (!empty($currentPhrase)) {
			$this->currentPhrase = $currentPhrase;
		}
		if (!empty($selected)) {
			$this->selected = $selected;
		} 
		// if(!isset($currentPhrase)) {
		// 	$this->currentPhrase = "dream big";
		// }
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
}