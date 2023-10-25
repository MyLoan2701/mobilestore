//--- LOGIN & SIGNUP ---
// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById("loginModal");
var modal2 = document.getElementById("signupModal");
window.onclick = function(event) {
  if (event.target == modal || event.target == modal2) {
    modal.style.display = "none";
    modal2.style.display = "none";
  }
}

function changeSignUp() {
    document.getElementById("loginModal").style.display = 'none';
    document.getElementById("signupModal").style.display = 'block';
}

function changeLogIn() {
    document.getElementById("signupModal").style.display = 'none';
    document.getElementById("loginModal").style.display = 'block';
}

function showCart() {
  document.getElementById("ck-order").style.display = 'block';
}
function hideCart() {
  document.getElementById("ck-order").style.display = 'none';
}
//--- ACCOUNT_CLIENT ---
