<?php
// Phrase.php to create a Phrase class to handle the phrases

class Phrase 
{
	private $currentPhrase = "dream big"; //"Australia is known as the land Down Under";
	private $selected = [];

	public function __construct($currentPhrase = null, $selected = array() ) {
		if (isset($currentPrhase) && isset($selected) ) {
			$this->currentPhrase = $currentPhrase;
			$this->selected = $selected;
		} elseif(!isset($currentPhrase) && !isset($selected)) {
			$this->currentPhrase = $this->currentPhase;
		}
	}

}