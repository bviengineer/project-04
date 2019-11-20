
// Get all buttons from the play.php page
let buttons = document.getElementsByClassName('key');

// Variable to hold user keypress
let keypress = "";

// Event listener to listen for user keypress 
document.addEventListener('keydown', logKey);

/*============================================================================================================
  > Function is called when the user presses a key on the keyboard
  > The keypress is then assigned to the keypress variable
  > e is the event and key is an attribute on the e event that holds the letter value from the keyboard
  > The buttons, stored in buttons variable above, are then looped through and one at a time, EACH ONE 
    is assinged to the variable keypress
  > The keypress text is then converted to lowercase
  > Then, the value or text stored in keypress, is compared to the value on the button on the page to see if
    there is a match
  > If there is a match, a click event is emulated on the button which triggers the PHP side of the application
 ===============================================================================================================*/
function logKey(e) {
  keypress = e.key;
  for (let i=0; i <= buttons.length - 1; i++) {
    let theButton = buttons[i].innerText;
    keypress = keypress.toLocaleLowerCase();
      if (keypress.toLowerCase() === theButton) {
          buttons[i].click();
      }
    }
  }