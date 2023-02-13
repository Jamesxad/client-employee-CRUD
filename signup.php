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




    <title>Sign-up</title>
</head>
<body style="background-color:black;width: 600px; margin:auto;">



<?php

$user = "";
$pass =  "";
$errorMessage = "";
$errorMessagep = "";
$success = "";
$alert="";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    if ( empty($user)){
    $errorMessage = "Please type your Username!";
    }
    elseif (empty($pass) ) {
    $errorMessagep = "Please type your password!";

    }else{

$sq = "SELECT * FROM login WHERE username = '$user'";

$check = mysqli_query($con, $sq);
$checkres = mysqli_num_rows($check);


if($checkres >=1){

    $alert = $user ." <br> Already Exist ";

}else{
    $sql = "INSERT INTO login (username, password)" . 
    "VALUES ('$user', '$pass')";
    $result = $con->query($sql);

        if (!$result){
            $errorMessage = "Invalid query: " . $con->error;  
    
}else{
    $_SESSION['username'] = $user;
    header("location: /client/login.php");
    exit;
}

    }
}
 }

?>
  <form  method="post" class="container" style="margin:50px;">  
    <div>
    <h1><strong>Sign-up</strong></h1>
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



    <div class="cont_l">
    <div class="cont_login">
   
    <input type = "text" name="user"  values="<?php echo $user; ?>" placeholder="Username"></input>  
</div>
    <div class="cont_login">
    <input type = "password" name="pass"  values= "<?php echo $pass; ?>" placeholder="Password"></input>   
    </div>
   
    <div class="btnprim">
        <button  class="btn btn-primary" type="submit" name="submit"><strong>Sign-up</strong></label>
    </div>
    <div class="clickhere">
    <p>Go Back to Login? Click <a href ="/client/login.php" style="color:black;text-decoration:none;"> <strong>here</strong></a></p>
    </div>
</div>
</div> 
</form>


</body>
</html>