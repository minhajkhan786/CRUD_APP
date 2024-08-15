<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `students` WHERE `id`='$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Error: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
  } 
?>

<?php
if(isset($_POST['update_students'])) {
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $age = $_POST['age'];
    $id = $_GET['id']; // Make sure $id is defined

    // Corrected SQL query
    $query = "UPDATE `students` SET `firstName` = '$fName', `lastName` = '$lName', `age` = '$age' WHERE `id` = '$id'";
    
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Error: " . mysqli_error($connection));
    } else {
        header("Location: index.php?update_msg=You have successfully updated the student information");
    }
}
?>

<form action="update.php?id=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" value="<?php echo isset($row['firstName']) ? $row['firstName'] : ''; ?>" id="firstName" name="firstName" required>
    </div>
    <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" class="form-control" value="<?php echo isset($row['lastName']) ? $row['lastName'] : ''; ?>" id="lastName" name="lastName" required>
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" value="<?php echo isset($row['age']) ? $row['age'] : ''; ?>" id="age" name="age" required>
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>

<?php include('footer.php'); ?>
