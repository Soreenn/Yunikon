i = 0;
e = i;
var allowedKeys = {
    37: 'left',
    38: 'up',
    39: 'right',
    40: 'down',
    65: 'a',
    66: 'b'
};

// the 'official' Konami Code sequence
var konamiCode = ['up', 'up', 'down', 'down', 'left', 'right', 'left', 'right', 'b', 'a'];
// a variable to remember the 'position' the user has reached so far.
var konamiCodePosition = 0;

// add keydown event listener
document.addEventListener('keydown', function(e) {
    // get the value of the key code from the key map
    var key = allowedKeys[e.keyCode];
    // get the value of the required key from the konami code
    var requiredKey = konamiCode[konamiCodePosition];
  
    // compare the key with the required key
    if (key == requiredKey) {
  
      // move to the next key in the konami code sequence
      konamiCodePosition++;
  
      // if the last key is reached, activate cheats
      if (konamiCodePosition == konamiCode.length) {
        easterStart();
        konamiCodePosition = 0;
      }
    } else {
      konamiCodePosition = 0;
    }
  });

function easterStart() {
    document.getElementById("logoSuperSecretFeature").src = "https://cdn.streamlabs.com/users/41445587/library/1552671673728.gif";
    document.getElementById("header").style.background = "url(/view/content/images/dancin.mp4)";
    document.getElementById("videoDiv").removeAttribute("hidden");
}