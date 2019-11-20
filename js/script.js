
// Get all buttons form the play.php page
let buttons = document.getElementsByClassName('key');

// Variable to hold user keypress
let keypress = "";

// Event listener to listen for user keypress 
document.addEventListener('keydown', logKey);

// Is called when the user presses a key and assigns user keypress event denoted by the parameter e, to the o keypress varaible
function logKey(e) {
  keypress = e.key;
  for (let i=0; i <= buttons.length; i++) {
    let theButton = buttons[i].innerText;
    keypress = keypress.toLocaleLowerCase();
      if (keypress.toLowerCase() === theButton) {
          buttons[i].click();
      }
    }
  }
