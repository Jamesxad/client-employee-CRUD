
    <h4>Time check</h4> <div id="clock" style="color:aqua;">
</div>
 
<script>
    function updateClock() {
      // Get the current time 
      var currentTime = new Date();

      // Format the time as a string
      var timeString = currentTime.toLocaleTimeString();

      // Update the clock element on the page
      var clockElement = document.getElementById("clock");
      clockElement.innerHTML = timeString;
    }

    // Update the clock every second
    setInterval(updateClock, 1000);
  </script>