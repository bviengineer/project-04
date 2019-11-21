// Get all buttons from the play.php page
let buttons = document.getElementsByClassName('key');

// Variable to hold user keypress
let keypress = "";

// Event listener to listen for user keypress on gameboard keys
document.addEventListener('keydown', logKey);

// Called on user presses a key & will emulated a button click which triggers the PHP side of the application
function logKey(e) {
  keypress = e.key;
  for (let i=0; i <= buttons.length - 1; i++) {
    let theButton = buttons[i].innerText;
    keypress = keypress.toLocaleLowerCase();
      if (keypress === theButton) {
          buttons[i].click();
      }
    }
  }