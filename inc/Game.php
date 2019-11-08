<?php
// Game.php to create a Game class with methods for showing the game, handling interactions, and checking for game over.

class Game 
{
	private $phrase;
	private $lives = 5;
	private $html; // keybord characters 
	private $hearts; // visual game progress

	public function __construct($phraseObject) {
		$this->phrase = $phraseObject;
	}

	public function displayKeyboard() {
		//$this->html = "<form method='POST'>";
		$this->html .= "<div id='qwerty' class='section'>";
    	$this->html .= "<div class='keyrow'>";
		$this->html .= "<button class='key' name='input' value='q'>q</button>";
		$this->html .= "<button class='key' name='input' value='w'>w</button>";
		$this->html .= "<button class='key' name='input' value='e'>e</button>";
		$this->html .= "<button class='key' name='input' value='r'>r</button>";
		$this->html .= "<button class='key' name='input' value='t' style='background-color: red' disabled>t</button>";
		$this->html .= "<button class='key' name='input' value='y'>y</button>";
		$this->html .= "<button class='key' name='input' value='u'>u</button>";
		$this->html .= "<button class='key' name='input' value='i'>i</button>";
		$this->html .= "<button class='key' name='input' value='o'>o</button>";
		$this->html .= "<button class='key' name='input' value='p'>p</button>";
		$this->html .= "</div>";

		$this->html .= "<div class='keyrow'>";
		$this->html .= "<button class='key' name='input' value='a'>a</button>";
		$this->html .= "<button class='key' name='input' value='s'>s</button>";
		$this->html .= "<button class='key' name='input' value='d'>d</button>";
		$this->html .= "<button class='key' name='input' value='f'>f</button>";
		$this->html .= "<button class='key' name='input' value='g'>g</button>";
		$this->html .= "<button class='key' name='input' value='h'>h</button>";
		$this->html .= "<button class='key' name='input' value='j'>j</button>";
		$this->html .= "<button class='key' name='input' value='k'>k</button>";
		$this->html .= "<button class='key' name='input' value='l'>l</button>";
		$this->html .= "</div>";

		$this->html .= "<div class='keyrow'>";
		$this->html .= "<button class='key' name='input' value='z'>z</button>";
		$this->html .= "<button class='key' name='input' value='x'>x</button>";
		$this->html .= "<button class='key' name='input' value='c'>c</button>";
		$this->html .= "<button class='key' name='input' value='v'>v</button>";
		$this->html .= "<button class='key' name='input' value='b'>b</button>";
		$this->html .= "<button class='key' name='input' value='n'>n</button>";
		$this->html .= "<button class='key' name='input' value='m'>m</button>";
		$this->html .= "</div>";
		
		$this->html .= "<div class='keyrow'>";
		$this->html .= "<button class='key' name='input' value='q'>q</button>";
		$this->html .= "<button class='key' name='input' value='w'>w</button>";
		$this->html .= "<button class='key' name='input' value='e'>e</button>";
		$this->html .= "<button class='key' name='input' value='r'>r</button>";
		$this->html .= "</div>";
		$this->html .= "</div>"; //closing for id=qwerty

		return $this->html;
	}

	public function displayScore() {
		$this->hearts = "<div id='scoreboard' class='section'><ol>";
		for($i = 0; $i <= $this->lives-1; $i++) {
        $this->hearts .= "<li class='tries'><img src='images/liveHeart.png' height='35px' widght='30px'></li>";
		}
		$this->hearts .= "</ol></div>";
		return $this->hearts;
	}
}