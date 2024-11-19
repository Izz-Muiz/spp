<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require "function.php";

$id = $_GET["id"];

$student = query("SELECT * FROM students WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (updateStudent($_POST) > 0) {
        echo "
        <script>
            alert('Data updated successfully');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data update failed');
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
    <title>Update New Student</title>
    <link rel="stylesheet" href="css/add.css">
</head>

<body>
    <h1>Update New Student</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <input type="hidden" name="id" value="<?= $student['id'] ?>">
                <input type="hidden" name="oldImage" value="<?= $student['id'] ?>">
            </li>
            <li>
                <label for="ic">IC : </label>
                <input type="text" name="ic" id="ic" required value="<?= $student['ic'] ?>">
            </li>
            <li>
                <label for="name">Name : </label>
                <input type="text" name="name" id="name" required value="<?= $student['name'] ?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="email" name="email" id="email" required value="<?= $student['email'] ?>">
            </li>
            <li>
                <label for="course">Course : </label>
                <input type="text" name="course" id="course" required value="<?= $student['course'] ?>">
            </li>
            <li>
                <label for="image">Image : </label><br>
                <img src="img/<?= $student['image'] ?>" alt="" width="100"><br>
                <input type="file" name="image" id="image" required>
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    </form>
</body>

</html>