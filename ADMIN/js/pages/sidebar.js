let timeTicker = document.getElementById('time-ticker');

function time() {
    var d = new Date().toLocaleTimeString();
    timeTicker.textContent = d
  }

  setInterval(time,1000);

$('#notification-button').click(function(){
  let notifPopup = document.getElementById('popup-notification');
  if(notifPopup.style.display == 'none'){
    notifPopup.style.display = "block";
  }else{
    notifPopup.style.display = "none";
  }

});