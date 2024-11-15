<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require "function.php";

if (isset($_POST["submit"])) {
    if (addStudent($_POST) > 0) {
        echo "
        <script>
            alert('Data inserted successfully');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data insertion failed');
        </script>";
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <link rel="stylesheet" href="add.css"> <!-- Link to the external CSS file -->
</head>
<body>
    <h1>Add New Student</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="ic">IC : </label>
                <input type="text" name="ic" id="ic" required>
            </li>
            <li>
                <label for="name">Name : </label>
                <input type="text" name="name" id="name" required>
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="email" name="email" id="email" required>
            </li>
            <li>
                <label for="course">Course : </label>
                <input type="text" name="course" id="course" required>
            </li>
            <li>
                <label for="image">Image : </label>
                <input type="file" name="image" id="image" required>
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    </form>
</body>
</html>