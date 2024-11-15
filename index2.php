<?php 
$conn = mysqli_connect("localhost", "root", "", "spp");

$result = mysqli_query($conn, "SELECT * FROM students");
if (!$result) {
    echo mysqli_error($conn);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Student Registration</h1>
    <table border="1" cellpadding="10" cellspacing="0">

    <tr> 
        <th>No.</th>
        <th>Action</th>
        <th>Image</th>
        <th>IC</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
    </tr>
    <?php $i = 1; ?>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <th><?= $i ?></th>
            <th>
                <a href="#">Edit</a>
                <a href="#">Delete</a>
            </th>
            <th>
                <img src="img/<?= $row["image"]; ?>" alt="">
            </th>
            <th><?= $row["ic"]; ?></th>
            <th><?= $row["name"]; ?></th>
            <th><?= $row["email"]; ?></th>
            <th><?= $row["course"]; ?></th>
        </tr>
    <?php $i++; ?>
    <?php } ?>
    </table>
</body>
</html>