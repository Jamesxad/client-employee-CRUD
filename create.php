
<?php
include "dbconnect.php";
session_start();

function input($database){
    $database = trim($database);
    $database = stripslashes($database);
    $database = htmlspecialchars($database);
    return$database;
}
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessageMail = "";
$errorMessagePhone = "";
$successMessage = "";
$errorName ="";
$errorEmail ="";
$errorPhone ="";
$errorAdd ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    
        if ( empty($name)) {
            $errorName = "Name Required!!";
            
        }
        elseif(empty($email)){
            $errorEmail = "Email Required!!";
            
        }
        elseif(empty($phone)){
            $errorPhone = "Phone Number Required!!";
           
        }
        elseif(empty($address)){
            $errorAdd = "Address Required!!";
           
        }
        else{

        $sqlmail = "SELECT * FROM clients WHERE email ='$email'";
        
        $check = mysqli_query($con, $sqlmail);
        $checkres = mysqli_num_rows($check);

        $sqlphone = "SELECT * FROM clients WHERE  phone = '$phone'";
        $checkphone = mysqli_query($con, $sqlphone);
        $checkrph = mysqli_num_rows($checkphone);

        //add client to database
        if($checkres>=1){
            
           $errorMessageMail = $email ." Already Exist ";

        }elseif($checkrph>=1){
            $errorMessagePhone = $phone ." Already Exist ";  
            
        }else{

        $sql = "INSERT INTO clients (name, email, phone, address)" . 
            "VALUES ('$name', '$email', '$phone', '$address')";
        $result = $con->query($sql);

        
        if (!$result){
            $errorMessage = "Invalid query: " . $con->error;
           
        }else{

        $successMessage =" Client added correctly" ;

        header("location: /client/index.php");
        exit;
    }
}
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="">
    <link rel="stylesheet" href="pstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Client list Create NEW</title>
</head>
<body >
    <div class="contain-c" >
    <h1 style="text-align: center; background-color:aliceblue;">New Client</h1>

    <form method="post" class="edit_box">
<br>
        <div style="width:500px;">
        <div class="col-sm-6">
            <label >Name</label>
                <input type="text" name="name" value="<?php echo $name; ?>"> <span style="color: red;"><?php
    if ( !empty($errorName) ) {
        echo "
        <strong>$errorName</strong>";
    }?></span>
            </div>
          
            <div class="col-sm-6">
            <label>Email</label>
                <input type="email"  name="email" value="<?php echo $email; ?>"><span style="color: red;"><?php
    if ( !empty($errorEmail) ) {
        echo "<strong>$errorEmail</strong>";

    }elseif($errorMessageMail){
        echo "<strong>$errorMessageMail</strong>";
    }
    
    ?></span>
            </div>
            <div>
            
            <div class="col-sm-6">
            <label>Phone</label>
                <input type="text" name="phone" value="<?php echo $phone; ?>"><span style="color: red;"><?php
    if ( !empty($errorPhone) ) {
        echo "
        <strong>$errorPhone</strong>";
    }elseif($errorMessagePhone){
        echo "$errorMessagePhone";
    }
    
    
    ?></span>
            </div>
            <div>
            <label>Adress</label>
            <div class="col-sm-6">
                <input type="text" name="address" value="<?php echo $address; ?>"><span style="color: red;"><?php
    if ( !empty($errorAdd) ) {
        echo "
        <strong>$errorAdd</strong>";
    }?></span>
            </div>
        <br>
        <div class="">
  <button class="btn btn-primary" name ="submit" type="submit">Submit</button>
        <a class="btn btn-secondary" href="/client/index.php" role="button">Cancel</a>

    </div>
</form>

  
</body>
</html>