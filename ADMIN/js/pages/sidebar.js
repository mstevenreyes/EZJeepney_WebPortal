let timeTicker = document.getElementById('time-ticker');
// Updates Date Timer
function time() {
    var d = new Date().toLocaleTimeString();
    timeTicker.textContent = d
  }
// Updates Clock every 1 second
setInterval(time,1000);
var modal = document.getElementById("popup-notification");
var btn = document.getElementById("notification-button");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  if(modal.style.display == "block"){
    modal.style.display = "none";
  }else{
    modal.style.display = "block";
  }
}

span.onclick = function() {
  modal.style.display = "none";
}

// btn.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }

// $('#notification-button').click(function(){
//   let notifModal = document.getElementById('popup-notification');
//   if(notifModal.style.display == 'none'){
//     notifModal.style.display = "block";
//   }else{
//     notifModal.style.display = "none";
//   }

// });


// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == notifModal) {
//     notifModal.style.display = "none";
//   }
// }