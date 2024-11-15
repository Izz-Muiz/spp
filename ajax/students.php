<?php 
require '../function.php';
$search = $_GET['search'];
$query = "SELECT * FROM students WHERE 
                name LIKE '%$search%' 
                OR ic LIKE '%$search%' 
                OR email LIKE '%$search%' 
                OR course LIKE '%$search%'";
$students = query($query);

?>

<table border="1" cellpadding="10" cellspacing="0">
                            <thead>
                                <tr> 
                                    <th>No.</th>
                    <th>Action</th>
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
                        <td>
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