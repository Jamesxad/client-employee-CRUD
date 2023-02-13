<?php
include "dbconnectlog.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="">
    <link rel="stylesheet" href="pstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <title>LOG-IN</title>
</head>
<body style="background-color:black;width: 600px; margin:auto;">



<?php

 if(isset($_POST["pass"])){

$pass =  "";
$errorMessage = "";
$success = "";
$alert="";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $pass = $_POST["pass"];
    if ( empty($pass) ) {
    $errorMessage = "Please type your account!";

    }else{


$s = " SELECT * FROM loginadmin where password = '$pass'";

$check = mysqli_query($con, $s);
$checkres = mysqli_num_rows($check);

    

if($checkres >=1){
    $alert = 'login Success!';
    header("location: /client/loginuser/loginuser.php");
        exit;
    
}else{
    
    $alert = 'Wrong password !!';
}

    }
}
 }
?>
  <form  method="post" class="container" style="margin:20px">  
    <h1><strong>Admin User Only!!</strong></h1>
    </div>
    <br>

</div>
    
    <?php
    if ( !empty($errorMessage) ) {
        echo "
        <strong>$errorMessage</strong>";

    }

    ?>
    <?php
    if(isset($_POST['submit']))
    echo "<strong>$alert</strong>";

    ?>
<div class="boxlog">  
    <div>

<div class="cont_l" >
    <input type = "password" name="pass" placeholder="Password" values= ""></input>
</div> 
    <div>
        <button class="btn btn-primary" type="submit" name="submit"><strong>Login</strong></label>
    </div>
</div> <br>

    <p>Not Admin? Go back <a href ="/client/index.php">here</a></p>
</div>
</form>

</div>
</form>


</body>
</html>