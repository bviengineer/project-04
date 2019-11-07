<?php
// Game.php to create a Game class with methods for showing the game, handling interactions, and checking for game over.

class Game 
{
	private $phrase;
	private $lives = 5;

	public function __construct($phraseObject) {
		$this->phrase = $phraseObject;
	}

	public function displayKeyboard() {
		echo "<form>";
		echo "<div id='qwerty' class='section'>";
    echo "<div class='keyrow'>";
		echo "<button class='key'>q</button>";
		echo "<button class='key'>w</button>";
		echo "<button class='key'>e</button>";
		echo "<button class='key'>r</button>";
		echo "<button class='key' style='background-color: red' disabled>t</button>";
		echo "<button class='key'>y</button>";
		echo "<button class='key'>u</button>";
		echo "<button class='key'>i</button>";
		echo "<button class='key'>o</button>";
		echo "<button class='key'>p</button>";
    echo "</div>";

    echo "<div class='keyrow'>";
		echo "<button class='key'>a</button>";
		echo "<button class='key'>s</button>";
		echo "<button class='key'>d</button>";
		echo "<button class='key'>f</button>";
		echo "<button class='key'>g</button>";
		echo "<button class='key'>h</button>";
		echo "<button class='key'>j</button>";
		echo "<button class='key'>k</button>";
		echo "<button class='key'>l</button>";
    echo "</div>";

    echo "<div class='keyrow'>";
		echo "<button class='key'>z</button>";
		echo "<button class='key'>x</button>";
		echo "<button class='key'>c</button>";
		echo "<button class='key'>v</button>";
		echo "<button class='key'>b</button>";
		echo "<button class='key'>n</button>";
		echo "<button class='key'>m</button>";
    echo "</div>";
		echo "</div>";
		echo "</form>";
	}
}