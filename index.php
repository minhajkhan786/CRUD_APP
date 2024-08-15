<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>


<h2>ALL STUDENTS</h2>
<div class="box1">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD STUDENTS</button>
</div>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>AGE</th>
            <th> Update </th>
            <th> Delete </th>
        </tr>


    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM `students`";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Error: " . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td> <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success"> Update </td>
                    <td> <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"> Delete </td>
                
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>

<?php
if (isset($_GET['message'])) {
    echo "<h6>".$_GET['message']."</h6>";
}
if (isset($_GET['insert_msg'])) {
    echo "<h6>".$_GET['insert_msg']."</h6>";
}
?>
<?php
if (isset($_GET['update_msg'])) {
    echo "<h6>".$_GET['update_msg']."</h6>";
}
?>

<?php
if (isset($_GET['delete_msg'])) {
    echo "<h6>".$_GET['delete_msg']."</h6>";
}
?>

<form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_students" value="ADD">
                </div>
            </div>
        </div>
    </div>
</form>

<?php include('footer.php'); ?>
