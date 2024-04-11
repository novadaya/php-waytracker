/* var cards = document.querySelectorAll('.card');

[...cards].forEach((card)=>{
  card.addEventListener( 'click', function() {
    card.classList.toggle('is-flipped');
  });
}); */

function myFunc(){
  var cards = document.querySelectorAll('.card');
  [...cards].forEach((card)=>{
  card.classList.toggle('is-flipped');
  });
}