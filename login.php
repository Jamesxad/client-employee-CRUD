<?php
include "dbconnectlog.php";
session_start();

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

 if(isset($_POST["user"]) ||
 isset($_POST["pass"])){

$name = "";
$pass =  "";
$errorMessage = "";
$errorMessagep = "";
$success = "";
$alert="";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST["user"];
    $pass = $_POST["pass"];

    if ( empty($name)){
    $errorMessage = "Please type your Username!";
    }
    elseif (empty($pass) ) {
    $errorMessagep = "Please type your password!";

    }else{       

$s = " SELECT * FROM login where username='$name' AND password = '$pass'";

$check = mysqli_query($con, $s);
$checkres = mysqli_num_rows($check);

    

if($checkres ==1){
   
    header("location: /client/index.php");
    $_SESSION['user'] = $name;
    
    
}else{
    
    $alert = 'Wrong User Account!!';
}

    }
}
 }
?>
  <form  method="post" class="container" style="margin:50px;">  
    <div>
    <h1><strong>LOG-IN</strong></h1>
    </div>

</div>
<?php
    if(isset($_POST['submit'])){
        echo "<strong>$alert</strong>";
    }
?>
    
    <?php
    if ( !empty($errorMessage) ) {
        echo "
        <strong>$errorMessage</strong>";

    }elseif
        ( !empty($errorMessagep) ) {
            echo "
            <strong>$errorMessagep</strong>";
    

    }
    
    ?>
<div class="boxlog">  
    <div>


    <div class="cont_l">
    <div class="cont_login">
    <input type = "text" name="user" placeholder="Username" ></input>
    </div>
    <div class="cont_login">
    <input type = "password" name="pass"  values= "" placeholder="Password"></input>
    </div>
    </div> 
    <div class="btnprim">
        <button class="btn btn-primary" type="submit" name="submit"><strong>Login</strong></label>
    </div>
</div> <br>
    <div class="clickhere">
    <p>Not yet Enrolled? Register <a href ="/client/signup.php" style="color:black;text-decoration:none;"><strong>here</strong></a></p>
    </div>
</div>
</form>


</body>
</html>