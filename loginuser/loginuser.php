<?php
  include "/xampp/htdocs/client/dbconnectlog.php";
  $sql = "SELECT * FROM login";
        $query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="refresh" content="">
    <link rel="stylesheet" href="/client/pstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> 
    <title>CLIENT LIST</title>
</head>
<body style="margin:20px; " >
    <h1>User Account<h1>
    <a class="btn btn-primary" href="/client/index.php" role="button">Back to Employee List</a>
    <?php

$c = "SELECT id FROM login ORDER BY id";
$cq = mysqli_query($con, $c);
$crow = mysqli_num_rows($cq);
?>
    <h4 style="font-size: 20px;">Total Log-In User : <span class="badge rounded-pill bg-danger"><?php echo $crow?> </span></h4>
    <br>
    <br>
    <table class="tablelogin">
        <thead class="table-dark" bgcolor="grey">   
        <tr>
            <th width="20">Username</th>
            <th width="20">Password</th>
            <th width="20">Edit/Delete</th>
            
        </tr>
        </thead>   
    <?php
    if ($query)
    {
        while($row = mysqli_fetch_array($query))

        {
           
    ?>
        <tbody>
        <tr>
            <td><?php echo $row["username"];?></td>
            <td><?php echo $row["password"];?></td>
            <div>
            <form  action="editlog.php" method="post"; >
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <td class="btnindex"><button class="bi bi-pencil-square" type="submit" name="submit"
                style="border: none; font-size:30px;cursor:pointer; color:green;"></button>
            </form>

                <form action="deletelog.php" method="post"; class="d-inline">
                <input type="hidden" name="id"  value="<?php echo $row['id'] ?>" ><button   class="bi bi-folder-x" type="submit" name="delete" 
                 style="border: none; font-size:30px;color:red;cursor:pointer;" title="Delete from Database?"value="delete"></button></td>   
            </form>
            </div>
        </tr>
        </tbody>
    <?php

             
            }
        }
        ?>

    </table>
</body>
</html>