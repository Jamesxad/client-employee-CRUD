<?php 
include "/xampp/htdocs/client/dbconnectlog.php";


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
<body style="margin:20px;">
    <div class="contain-c">
    <h1>Update Log-in User</h1>
    <?php
    if ( !empty($errorMessage) ) {
        echo "
        <strong>$errorMessage</strong>";

    }

    ?>

<?php


$id = $_POST['id'];
$sql = "SELECT * FROM login WHERE id = '$id'";

$result = mysqli_query($con, $sql);
if($result)
{
    while($row = mysqli_fetch_array($result))
    {
        ?>
        <form action="" method="post">
        <input type="hidden" name="id" value= "<?php echo $row['id'] ?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="password" value="<?php echo $row['password'] ?>">
            </div>
        </div>


        <div class="" style="margin-bottom:10px;">
<button class="btn btn-primary me-md-2" type="submit" name="update">Save</button>
</div></div>

        <div class="">
        <a class="btn btn-secondary" href="/client/loginuser/loginuser.php" role="button">Cancel</a>
</div></div>

    </form>

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
    $name= $_POST['username'];
    $pass=$_POST['password'];




    $sql = "UPDATE `login` SET `username`='$name',`password`='$pass' WHERE id='$id' ";
    
    $result = mysqli_query($con, $sql);

    if ($result)
    {
        echo '<script> alert("data Updated");</script>';
        header("location:/client/loginuser/loginuser.php");
    }
    else{
        echo '<script> alert("data not updated");</script>';

    }
}
?>

    </div>
</body>
</html>