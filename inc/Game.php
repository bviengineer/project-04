<?php
// Game.php to create a Game class with methods for showing the game, handling interactions, and checking for game over.

class Game 
{
	private $phrase;
	private $lives = 5;
	private $chars; // keybord characters 
	private $hearts; // visual game progress
	public $value;
	private $keyboard = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm'];

	public function __construct($phraseObject) {
		$this->phrase = $phraseObject;
	}

	public function displayKeyboard() {
		//$this->chars .= "<div id='qwerty' class='section'>";
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
		//$this->chars .= "</div>"; //closing for id=qwerty
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
	// Will get user selection > method for handling each letter key, step #10 
	public function playerGuess($keyPress) {
		// function should actually accept a single key from the keyboard
		// then check the keybord key against the array of letters in selected
		// How to get a single key from the keyboard ?
		$key = $keyPress[count($keyPress)-1]; // gets the most recent keypress 
		$keyboard = $this->phrase->selected; // gets the array of letters in the selected property
		return in_array($key, $keyboard);
	}
	// Loop through array of keys
	public function loopThroughKeyboard() {
		foreach ($this->keyboard as $key) {
			echo "<br>" . $key;
		}
	}
}