<?php
// Game.php to create a Game class with methods for showing the game, handling interactions, and checking for game over.

class Game 
{
	private $phrase;
	private $lives = 5;
	private $html; // keybord characters 

	public function __construct($phraseObject) {
		$this->phrase = $phraseObject;
	}

	public function displayKeyboard() {
		$this->html = "<form>";
		$this->html .= "<div id='qwerty' class='section'>";
    $this->html .= "<div class='keyrow'>";
		$this->html .= "<button class='key'>q</button>";
		$this->html .= "<button class='key'>w</button>";
		$this->html .= "<button class='key'>e</button>";
		$this->html .= "<button class='key'>r</button>";
		$this->html .= "<button class='key' style='background-color: red' disabled>t</button>";
		$this->html .= "<button class='key'>y</button>";
		$this->html .= "<button class='key'>u</button>";
		$this->html .= "<button class='key'>i</button>";
		$this->html .= "<button class='key'>o</button>";
		$this->html .= "<button class='key'>p</button>";
		$this->html .= "</div>";

		$this->html .= "<div class='keyrow'>";
		$this->html .= "<button class='key'>a</button>";
		$this->html .= "<button class='key'>s</button>";
		$this->html .= "<button class='key'>d</button>";
		$this->html .= "<button class='key'>f</button>";
		$this->html .= "<button class='key'>g</button>";
		$this->html .= "<button class='key'>h</button>";
		$this->html .= "<button class='key'>j</button>";
		$this->html .= "<button class='key'>k</button>";
		$this->html .= "<button class='key'>l</button>";
		$this->html .= "</div>";

		$this->html .= "<div class='keyrow'>";
		$this->html .= "<button class='key'>z</button>";
		$this->html .= "<button class='key'>x</button>";
		$this->html .= "<button class='key'>c</button>";
		$this->html .= "<button class='key'>v</button>";
		$this->html .= "<button class='key'>b</button>";
		$this->html .= "<button class='key'>n</button>";
		$this->html .= "<button class='key'>m</button>";
		$this->html .= "</div>";
		
		$this->html .= "</form>";
		$this->html .= "<form>";
		$this->html .= "<div id='qwerty' class='section'>";
		$this->html .= "<div class='keyrow'>";
		$this->html .= "<button class='key'>q</button>";
		$this->html .= "<button class='key'>w</button>";
		$this->html .= "<button class='key'>e</button>";
		$this->html .= "<button class='key'>r</button>";
		$this->html .= "</div>";
		
		return $this->html;
	}
}