
<?php
session_start();
require 'dbconnect.php';

if(isset($_POST['delete']))
{
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $query = "DELETE FROM clients WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Data Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Data Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

?>

