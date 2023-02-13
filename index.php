<?php
    include "dbconnect.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="refresh" content="">
    <link rel="stylesheet" href="pstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>CLIENT LIST</title>

    <?php

    $c = "SELECT id FROM clients ORDER BY id";
    $cq = mysqli_query($con, $c);
    $crow = mysqli_num_rows($cq);
?>
    


</head>
<?php  
    if(isset($_POST['delete'])){
echo  $_SESSION['message'];
die; } ?> 

<div id="sidebar" class="cont-panel">
    <ul>
        <li>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" ><span style="font-size: 25px;" class="bi bi-x-circle"></span></a>
        </li>
        <li>
            <a href="">HOME</a>
        </li>
        
        <li>
            <a href="menutab.php">Menu Tab</a>
        </li>
        
        <li>
            <a href="">DATA</a>
        </li>
        
        <li>
            <a href="">ABOUT</a>
        </li>
    </ul>


</div>

<div class="home">
<body>
    <?php include "header.php"; ?>

<main>

</div>
 

    </div>
    <br>

    <?php

        $sql = "SELECT * FROM clients";
        $query = mysqli_query($con, $sql);
        ?>
           

    <table  class ="table" style="background-color:aliceblue;"> 
    <thead class="table-dark">   
        <tr>

    
            <th>ID</th>
            <th>Name</th>
            <th>email</th>
            <th>phone</th>
            <th>address</th>
            <th>Date Created</th>
            <th>Edit/Delete</th>

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
            <td><?php echo $row["id"];?></td>
            <td><?php echo $row["name"];?></td>
            <td><?php echo $row["email"];?></td>
            <td><?php echo $row["phone"];?></td>
            <td><?php echo $row["address"];?></td>
            <td><?php echo $row["created_at"];?></td>

                <form  action="edit.php" method="post";>
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <th class="btnindex"><button class="bi bi-pencil-square" type="submit" name="submit"
                style="border: none; font-size:30px;cursor:pointer; color:green;" title="Edit data"></button>
            </form>
                <form  action="delete.php" method="post";  class="d-inline">
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <button   class="bi bi-folder-x" type="submit" name="delete" 
                 style="border: none; font-size:30px;color:red;;cursor:pointer;" title="Delete from Database?" value="delete"></button></th>
            </th>    
            </form>
        </tr>
        </tbody>
    <?php

             
            }
        }
        ?>

    </table>
    </main>
</body>
<br>    <footer><p>Copyright © 2022</p></footer>
<script>

function openNav() {
  document.getElementById("sidebar").style.width = "250px";

 
}

function closeNav() {
  document.getElementById("sidebar").style.width = "0";


}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</div>

</html>