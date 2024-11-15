<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require "function.php";

$id = $_GET["id"];

if (deleteStudent($id) > 0) {
    echo "
    <script>
        alert('Data deleted successfully');
        document.location.href = 'index.php';
    </script>";
} else {
    echo "
    <script>
        alert('Data delete failed');
    </script>";
    echo mysqli_error($conn);
}
?>