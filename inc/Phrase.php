<?php
// Phrase.php to create a Phrase class to handle the phrases

class Phrase 
{
	private $currentPhrase; //= "dream big"; //"Australia is known as the land Down Under";
	private $selected = [];

	public function __construct($currentPhrase = null, $selected = array() ) {
		if (!empty($currentPhrase) && !empty($selected) ) {
			$this->currentPhrase = $currentPhrase;
			$this->selected = $selected;
		} 
		if(!isset($currentPhrase) && !isset($selected)) {
			$this->currentPhrase = "dream big";
		}
	}
	// Adds letter placeholders to the display when game begins
	public function addPhraseToDisplay() {

	}
}