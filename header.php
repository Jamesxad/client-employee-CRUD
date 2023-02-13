<?php
include 'message.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="pstyle.css">
    <title>Document</title>
</head>
<body>
<div>
<header>
<div class="obtn">
<button class="openbtn" onclick="openNav()" style="font-size:25px;" placeholder="Open Tab">☰</button> 
</div>
<h1 class="mt-4">List of Employees<h1>
    <div class="totalreg">

<h4 style="font-size: 20px;">Total Registered : <span class="badge badge pill bg-danger"> <?php echo $crow?> </span>        <i>
    <a style="font-size: 30px;" class="bi bi-person-add" href="/client/create.php"><span class="addclient"> Add Client</span></a></div>
    <div class="logout">
    <a style="font-size: 25px;" class="bi bi-person-fill-x" href="/client/login.php" title="Log-out"><span style="font-size: 15px; font-family:monospace; "> Log-Out</span></a> <p3 id="clock" style="color:black;border-bottom:2px solid black; font-size:15px;"></p3>
    </div>    
</h4>
    
    <div class="showid"> 
    
        <strong >Hi<span style="color: green;"> 
    <?php  echo  $_SESSION['user']  ?></span>  </strong>
    <a href="admin.php"><span style="font-size: 15px; font-weight:bold;"> Log-in User </span></a>

</div>

</header>
</div>

    
</body>
<script>
        function updateClock() {
        var date = new Date();
        var h = date.getHours();
        var m = date.getMinutes();
        var s = date.getSeconds();


        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;
        

        var ampm = (h < 12) ? "AM" : "PM";

if(h > 12) {
    h = h - 12;
}

if(h == 0) {
    h = 12;
}



        var time = h + ":" + m + ampm;
        document.getElementById("clock").innerHTML = time;

    }

    setInterval(updateClock, 1000);
  </script>
</html>