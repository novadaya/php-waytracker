
function flipCard(){
  var cards = document.querySelectorAll('.card');
  [...cards].forEach((card)=>{
  card.classList.toggle('is-flipped');
  });
}

const errors = ["kiskutya", "nagykutya", "kutyafüle"];


// Az űrlap 'submit' eseményének figyelése
function registerUser() {
  let registerError = document.querySelector('#register-error');
  errorMessage(registerError);
  resetErrors();
  console.log("register");
};

// Az űrlap 'submit' eseményének figyelése
function loginUser() {
  let loginError = document.querySelector('#login-error');
  errorMessage(loginError);
  resetErrors();
  console.log("login");
};

function errorMessage(errorMessage) {
  for (let i = 0; i < errors.length; i++) {
    let newError = document.createElement('div');
    newError.className = 'error-message';
    newError.innerHTML = errors[i];
    errorMessage.parentNode.insertBefore(newError, errorMessage.nextSibling);
  }
}
function resetErrors(){
  setTimeout(function() {
    var errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(function(errorMessage) {
      errorMessage.parentNode.removeChild(errorMessage);
    });

  //errors = []; EZ még kelleni fog!!!
  }, 2500);
}