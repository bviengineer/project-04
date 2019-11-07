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
		//$this->html = "<form method='POST'>";
		$this->html .= "<div id='qwerty' class='section'>";
    	$this->html .= "<div class='keyrow'>";
		$this->html .= "<button class='key' name='q' value='q'>q</button>";
		$this->html .= "<button class='key' name='w' value='w'>w</button>";
		$this->html .= "<button class='key' name='e' value='e'>e</button>";
		$this->html .= "<button class='key' name='r' value='r'>r</button>";
		$this->html .= "<button class='key' name='t' value='t' style='background-color: red' disabled>t</button>";
		$this->html .= "<button class='key' name='y' value='y'>y</button>";
		$this->html .= "<button class='key' name='u' value='u'>u</button>";
		$this->html .= "<button class='key' name='i' value='i'>i</button>";
		$this->html .= "<button class='key' name='o' value='o'>o</button>";
		$this->html .= "<button class='key' name='p' value='p'>p</button>";
		$this->html .= "</div>";

		$this->html .= "<div class='keyrow'>";
		$this->html .= "<button class='key' name='a' value='a'>a</button>";
		$this->html .= "<button class='key' name='s' value='s'>s</button>";
		$this->html .= "<button class='key' name='d' value='d'>d</button>";
		$this->html .= "<button class='key' name='f' value='f'>f</button>";
		$this->html .= "<button class='key' name='g' value='g'>g</button>";
		$this->html .= "<button class='key' name='h' value='h'>h</button>";
		$this->html .= "<button class='key' name='j' value='j'>j</button>";
		$this->html .= "<button class='key' name='k' value='k'>k</button>";
		$this->html .= "<button class='key' name='l' value='l'>l</button>";
		$this->html .= "</div>";

		$this->html .= "<div class='keyrow'>";
		$this->html .= "<button class='key' name='z' value='z'>z</button>";
		$this->html .= "<button class='key' name='x' value='x'>x</button>";
		$this->html .= "<button class='key' name='c' value='c'>c</button>";
		$this->html .= "<button class='key' name='v' value='v'>v</button>";
		$this->html .= "<button class='key' name='b' value='b'>b</button>";
		$this->html .= "<button class='key' name='n' value='n'>n</button>";
		$this->html .= "<button class='key' name='m' value='m'>m</button>";
		$this->html .= "</div>";
		
		$this->html .= "<div class='keyrow'>";
		$this->html .= "<button class='key' name='q' value='q'>q</button>";
		$this->html .= "<button class='key' name='w' value='w'>w</button>";
		$this->html .= "<button class='key' name='e' value='e'>e</button>";
		$this->html .= "<button class='key' name='r' value='r'>r</button>";
		$this->html .= "</div>";
		$this->html .= "</div>"; //closing for id=qwerty

		return $this->html;
	}

	public function displayScore() {

	}
}