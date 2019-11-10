<?php
// Game.php to create a Game class with methods for showing the game, handling interactions, and checking for game over.

class Game 
{
	private $phrase;
	private $lives = 5;
	private $chars; // keybord characters 
	private $hearts; // visual game progress

	public function __construct($phraseObject) {
		$this->phrase = $phraseObject;
	}

	public function displayKeyboard() {
		//$this->html = "<form method='POST'>";
		$this->chars .= "<div id='qwerty' class='section'>";
    	$this->chars .= "<div class='keyrow'>";
		$this->chars .= "<button class='key' name='input' value='q'>q</button>";
		$this->chars .= "<button class='key' name='input' value='w'>w</button>";
		$this->chars .= "<button class='key' name='input' value='e'>e</button>";
		$this->chars .= "<button class='key' name='input' value='r'>r</button>";
		$this->chars .= "<button class='key' name='input' value='t' style='background-color: red' disabled>t</button>";
		$this->chars .= "<button class='key' name='input' value='y'>y</button>";
		$this->chars .= "<button class='key' name='input' value='u'>u</button>";
		$this->chars .= "<button class='key' name='input' value='i'>i</button>";
		$this->chars .= "<button class='key' name='input' value='o'>o</button>";
		$this->chars .= "<button class='key' name='input' value='p'>p</button>";
		$this->chars .= "</div>";

		$this->chars .= "<div class='keyrow'>";
		$this->chars .= "<button class='key' name='input' value='a'>a</button>";
		$this->chars .= "<button class='key' name='input' value='s'>s</button>";
		$this->chars .= "<button class='key' name='input' value='d'>d</button>";
		$this->chars .= "<button class='key' name='input' value='f'>f</button>";
		$this->chars .= "<button class='key' name='input' value='g'>g</button>";
		$this->chars .= "<button class='key' name='input' value='h'>h</button>";
		$this->chars .= "<button class='key' name='input' value='j'>j</button>";
		$this->chars .= "<button class='key' name='input' value='k'>k</button>";
		$this->chars .= "<button class='key' name='input' value='l'>l</button>";
		$this->chars .= "</div>";

		$this->chars .= "<div class='keyrow'>";
		$this->chars .= "<button class='key' name='input' value='z'>z</button>";
		$this->chars .= "<button class='key' name='input' value='x'>x</button>";
		$this->chars .= "<button class='key' name='input' value='c'>c</button>";
		$this->chars .= "<button class='key' name='input' value='v'>v</button>";
		$this->chars .= "<button class='key' name='input' value='b'>b</button>";
		$this->chars .= "<button class='key' name='input' value='n'>n</button>";
		$this->chars .= "<button class='key' name='input' value='m'>m</button>";
		$this->chars .= "</div>";
		$this->chars .= "</div>"; //closing for id=qwerty
		return $this->chars;
	}

	public function displayScore() {
		$this->hearts = "<div id='scoreboard' class='section'><ol>";
		for($i = 0; $i <= $this->lives-1; $i++) {
        	$this->hearts .= "<li class='tries'><img src='images/liveHeart.png' height='35px' widght='30px'></li>";
		}
		$this->hearts .= "</ol></div>";
		return $this->hearts;
	}

	public function playerGuess($keyPress) {

		// Returns last key pressed by first counting the # of elements in the array & then subtracting 1 from the total count, since the array begins at index 0
		$key = $keyPress[count($keyPress)-1];
		return $key;
	}
}