<?php
include "/xampp/htdocs/client/dbconnectlog.php";

if(isset($_POST['delete']))
{
    $id = $_POST['id'];

    $sql = "DELETE FROM login WHERE id='$id'";
    $query = mysqli_query($con,$sql);

    if($query)
    {
        echo '<script> alert("data deleted")</script>';
        header("location:/client/loginuser/loginuser.php");
   
    }
    else
    {
        echo '<script> alert("data not deleted")</script>';
        
    }
}

?>