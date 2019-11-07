<?php
// Phrase.php to create a Phrase class to handle the phrases

class Phrase 
{
	private $currentPhrase = "dream big"; //"Australia is known as the land Down Under";
	private $selected = [];

	public function __construct($currentPhrase = null, $selected = null ) {
		if (!empty($currentPrhase) && !empty($selected) ) {
			$this->currentPhrase = $currentPhrase;
			$this->selected = $selected;
		} //elseif(empty($currentPhrase) && empty($selected)) {
			//$this->currentPhrase = "Australia is known as the land Down Under";
		//}
	}

}