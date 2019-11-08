<?php
// Phrase.php to create a Phrase class to handle the phrases
class Phrase 
{
	private $currentPhrase; //= "dream big"; //"Australia is known as the land Down Under";
	private $selected = [];
	private $myPhrase; // holds return string from addPhraseToDisplay()

	public function __construct($currentPhrase = null, $selected = array() ) {
		if (!empty($currentPhrase) || !empty($selected) ) {
			$this->currentPhrase = $currentPhrase;
			$this->selected = $selected;
		} 
		if(!isset($currentPhrase) || !isset($selected)) {
			$this->currentPhrase = "dream big";
		}
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

	public function checkLetter($letter) {
		return array_unique(str_split(strtolower(str_replace(" ", "", $this->currentPhrase))));
	}
}