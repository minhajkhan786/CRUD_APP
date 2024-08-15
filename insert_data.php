<?php
include('dbcon.php');

if (isset($_POST['add_students'])) {
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $age = $_POST['age'];

    if ($fName == "" || empty($fName)) {
        $message = urlencode("You need to provide the first name.");
        header("Location: index.php?message=$message");
        exit();
    } else {
        $query = "INSERT INTO `students` (firstName, lastName, age) VALUES ('$fName', '$lName', '$age')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $message = urlencode("Student added successfully.");
            header("Location: index.php?message=$message");
        } else {
            $message = urlencode("Error: " . mysqli_error($connection));
            header("Location: index.php?message=$message");
        }
        exit();
    }
}
?>
