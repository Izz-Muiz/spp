<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
// Include necessary functions
require "function.php"; 
$students = query("SELECT * FROM students ORDER BY name");
// pagination
// $totalStudentsPerPage = 2;
// $totalStudents = count(query("SELECT * FROM students"));
// $totalPage = ceil($totalStudents / $totalStudentsPerPage);
// $activePage = isset($_GET["page"]) ? $_GET["page"] : 1;
// $earlyStudents = ($totalStudentsPerPage * $activePage) - $totalStudentsPerPage;

// // Fetch students data from the database
// $students = query("SELECT * FROM students ORDER BY name ASC LIMIT $earlyStudents, $totalStudentsPerPage"); 

if (isset($_POST["find"])) {
    $students = find($_POST["search"]);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Student Registration</title>
        <link rel="stylesheet" href="styles.css"> <!-- Link to an external CSS file for styling -->
        <style>
            @media print {
                .logout {
                    display: none;
                }
                .add {
                    display: none;
                }
                .search-form, .action {
                    display: none;
                }
            }
        </style>
    </head>
    <body>
        <header>
            
            <a href="logout.php" class="logout">Logout</a> || <a href="print.php" target="_blank">Print</a>
            <h1>Student Registration</h1>
            <a href="add.php" class="add">Add New Student</a>
        </header>
        
        <main>
            <form class="search-form" action="" method="post">
                <input type="text" class="search-input" name="search" id="search" autofocus placeholder="Search" autocomplete="off">
                <button type="submit" class="search-button" name="find" id='find'>Find</button>
            </form>
            <br>
            <!-- <?php if($activePage > 1) : ?>
                <a href="?page=<?= $activePage-1 ?>"><</a>
                <?php endif; ?> -->
                
                
    <!-- <?php for($i=1; $i <= $totalPage; $i++) : ?>
        <?php if($i == $activePage) : ?>
            <a href="?page=<?= $i ?>"><b><?= $i ?></b> </a>
            <?php else : ?>
                <a href="?page=<?= $i ?>"><?= $i ?></a>
                <?php endif; ?>
                <?php endfor; ?>

                
                <?php if($activePage < $totalPage) : ?>
                    <a href="?page=<?= $activePage+1 ?>">></a>
                    <?php endif; ?> -->
                    <div id="container">

                            <table border="1" cellpadding="10" cellspacing="0">
                                <thead>
                                    <tr> 
                                        <th>No.</th>
                        <th class="action">Action</th>
                        <th>Image</th>
                        <th>IC</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td class="action">
                                <a href="update.php?id=<?= $student['id']; ?>">Update</a>
                                <a href="delete.php?id=<?= $student['id']; ?>" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
                            </td>
                            <td>
                                <img src="img/<?= htmlspecialchars($student['image']); ?>" alt="Image of <?= htmlspecialchars($student['name']); ?>" style="width: 50px; height: auto;">
                            </td>
                            <td><?= htmlspecialchars($student['ic']); ?></td>
                            <td><?= htmlspecialchars($student['name']); ?></td>
                            <td><?= htmlspecialchars($student['email']); ?></td>
                            <td><?= htmlspecialchars($student['course']); ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>
    </main>

    <footer>
        <p>&copy; <?= date("Y"); ?> Student Registration System</p>
    </footer>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>