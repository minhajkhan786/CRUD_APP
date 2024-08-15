<?php include('dbcon.php'); ?>



<?php
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "delete  FROM `students` WHERE `id`='$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Error: " . mysqli_error($connection));
    } else {
        header("Location: index.php?delete_msg=You have  deleted the student information");
    }
  } 
?>