<?php
// Phrase.php to create a Phrase class to handle the phrases
class Phrase 
{
	private $currentPhrase = "dream big"; //"Australia is known as the land Down Under";
	private $selected = [];
	private $myPhrase; // holds return string from addPhraseToDisplay()
	private $randomPhrase = [
		"Empty vessels make the most noise",
		"Birds of a feather flock together",
		"Do unto others as you would have them do unto you",
		"The greatest servant is the greatest leader",
		"Carry on",
		"Make haste"
	];

	public function __construct($currentPhrase = null, $selected = array() ) {
		if (!empty($currentPhrase)) {
			$this->currentPhrase = $currentPhrase;
		}
		if (!empty($selected)) {
			$this->selected = $selected;
		} 
		// if(!isset($currentPhrase) || !isset($selected)) {
		// 	$this->currentPhrase = "dream big";
		// }
	}
	// Adds letter placeholders to the display when game begins
	public function addPhraseToDisplay() {
		$characters = str_split(strtolower($this->currentPhrase));
		echo "<ul>";
			foreach ($characters as $character) {
				$this->myPhrase .= $character;
				if ($character == " ") {
					echo "<li class='space'>" . $character . "</li>";
				} else {
					echo "<li class='hide letter'>" . $character . "</li>";
				}
			}
		echo "</ul>";
		//return $character; returns only the last letter of the array as a string: "g"
		//return $this->myPhrase;
	}
	// Check selected letter against the current phrase
	public function checkLetter($letter) {
		$parsedPhrase = array_unique(str_split(strtolower(str_replace(" ", "", $this->currentPhrase))));
		$theLetter = $letter[count($letter)-1]; // gets most recent keypress 
		return in_array($theLetter, $parsedPhrase);
	}
	//Will return the array of letter seletions using the __get magic method 
	public function __get($selected) {
		return $this->selected;
	}
}