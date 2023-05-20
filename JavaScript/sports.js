function updateTime() {
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();
  
    hours = formatTime(hours);
    minutes = formatTime(minutes);
    seconds = formatTime(seconds);
  
    var timeString = hours + ":" + minutes + ":" + seconds;
  
    document.getElementById("clock").innerHTML = timeString;
  
    var day = currentTime.getDate();
    var month = currentTime.getMonth() + 1;
    var year = currentTime.getFullYear();
  
    var dateString = formatTime(day) + "-" + formatTime(month) + "-" + year;
  
    document.getElementById("date").innerHTML = dateString;
  }
  
  function formatTime(time) {
    if (time < 10) {
      time = "0" + time;
    }
    return time;
  }
  
  // Update the time every second
  setInterval(updateTime, 1000);
  
  