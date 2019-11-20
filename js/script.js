
let buttons = document.getElementsByClassName('key');

// Keyboard keys
const keyboard = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 
                  'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 
                  'z', 'x', 'c', 'v', 'b', 'n', 'm'];

// Variable to hold user keypress
let keypress = "";

// Event listener to listen for user keypress 
document.addEventListener('keydown', logKey);

// Assigns user keypress to keypress varaible
function logKey(e) {
  keypress = e.key;
  //console.log(e);
   if(keyboard.indexOf(keypress)) {
			//console.log(keypress);
     // console.log(buttons);
    for (i=0; i <= buttons.length; i++) {
        // if (keypress.toLowerCase() == buttons[i].innerText)
             console.log(buttons[i].innerText);
    }
  }
}

