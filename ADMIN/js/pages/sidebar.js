let timeTicker = document.getElementById('time-ticker');

function time() {
    var d = new Date().toLocaleTimeString();
    timeTicker.textContent = d
  }

  setInterval(time,1000);
  var modal = document.getElementById("notification");
  var btn = document.getElementById("notification-button");
  var span = document.getElementsByClassName("close")[0];

  btn.onclick = function() {
    modal.style.display = "block";
  }

  span.onclick = function() {
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

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