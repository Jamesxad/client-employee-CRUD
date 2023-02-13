<?php 
include "dbconnect.php";

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
<body style="margin:50px;">
<style>
</style>
    <div class="contain-c">
    <h1>Update Employees</h1>

<?php

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



        

$id = $_POST['id'];
$sql = "SELECT * FROM clients WHERE id = '$id'";

$result = mysqli_query($con, $sql);
if($result)
{
    while($row = mysqli_fetch_array($result))
    {
        ?>
        <form action="" method="post" class="edit_box" width="300px">
        <input type="hidden" name="id" value= "<?php echo $row['id'] ?>">
            
            <div class="col-sm-6">
            <label>Name</label>
                <input type="text" name="name" value="<?php echo $row['name'] ?>"><span style="color: red;"><?php
    if ( !empty($errorName) ) {
        echo "
        <strong>$errorName</strong>";
    }?></span>
            </div>
           
            <div class="col-sm-6">
            <label>Email</label>
                <input type="text" name="email" value="<?php echo $row['email'] ?>">
            </div>
            
            <div class="col-sm-6">
            <label>Phone</label>
                <input type="text" name="phone" value="<?php echo $row['phone']?>">
            </div>
           
            <div class="col-sm-6">
            <label>Adress</label>
                <input type="text"  name="address" value="<?php echo $row['address'] ?>">
            </div><br>
        <div class="">
        <button class="btn btn-primary me-md-2" type="submit" name="update">Save</button>
        <a class="btn btn-secondary" href="/client/index.php" role="button">Cancel</a>
        </div>
        <?php
    }
}
        
else
{
    echo '<script> alert("data not updated")</script>';
}
?>
    
    
<?php


if(isset($_POST['update']))
{
    $name= $_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        
            if ( empty($name)) {
               $errorName = "Name Empty!!";
                
            }
            elseif(empty($email)){
                $errorEmail = "Email Empty!!";
                
            }
            elseif(empty($phone)){
                $errorPhone = "Phone Number Empty!!";
               
            }
            elseif(empty($address)){
                $errorAdd = "Address Empty!!";
               
            }
            else{
                $sqlw = "SELECT * FROM clients WHERE email ='$email' AND phone = '$phone'";
        
                $check = mysqli_query($con, $sqlw);
                $checkres = mysqli_num_rows($check);
        
                //add client to database
                if($checkres>=2){
                    
                   $errorMessageMail = $email ." Already Exist ";
        
                }if($checkres>=2){
                    $errorMessagePhone = $phone ." Already Exist ";  
                    
                }else{

    $sql = "UPDATE `clients` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address' WHERE id='$id' ";
    
    $result = mysqli_query($con, $sql);

    if ($result)
    {
        echo '<script> alert("data Updated");</script>';
        header("location:/client/index.php");
    }
    else{
        echo '<script> alert("data not updated");</script>';

    }
}
    }
}
}
?>
<br>
<span style="color: red;"><?php
    if ( !empty($errorName) ) {
        echo "
        <strong>$errorName</strong>";
    }elseif( !empty($errorEmail) ) {
        echo "
        <strong>$errorEmail</strong>";
    }elseif( !empty($errorAdd) ) {
        echo "
        <strong>$errorAdd</strong>";
    }elseif ( !empty($errorPhone) ) {
        echo "
        <strong>$errorPhone</strong>"; 
    }elseif($errorMessageMail){
        echo "$errorMessageMail";
    }
        
    
    
    
    
    ?></span>
    </form>

   
    </div>
</body>
</html>