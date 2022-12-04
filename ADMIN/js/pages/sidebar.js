let timeTicker = document.getElementById('time-ticker');

function time() {
    var d = new Date().toLocaleTimeString();
    timeTicker.textContent = d
  }

  setInterval(time,1000);
