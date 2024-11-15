<?php

require_once __DIR__ . '/vendor/autoload.php';
require "function.php"; 

// Fetch students from the database
$students = query("SELECT * FROM students ORDER BY name");

$mpdf = new \Mpdf\Mpdf();

// Start building the HTML content
$html = '
<style>
    img {
        width: 50px; /* Set a fixed width for images */
        height: auto; /* Maintain aspect ratio */
        border-radius: 5px; /* Rounded corners for images */
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #000;
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>
<table>
    <thead>
        <tr> 
            <th>No.</th>
            <th>Image</th>
            <th>IC</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
        </tr>
    </thead>
    <tbody>';

$i = 1;
foreach ($students as $student) {
    // Escape output to prevent XSS
    $imageSrc = 'img/' . htmlspecialchars($student['image']);
    $ic = htmlspecialchars($student['ic']);
    $name = htmlspecialchars($student['name']);
    $email = htmlspecialchars($student['email']);
    $course = htmlspecialchars($student['course']);

    // Check if the image file exists
    $imageTag = file_exists($imageSrc) ? '<img src="'.$imageSrc.'">' : '<img src="img/default.png">'; // Use a default image if not found

    $html .= '<tr>
                <td>'.$i++.'</td>
                <td>'.$imageTag.'</td>
                <td>'.$ic.'</td>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$course.'</td> 
              </tr>';
}

$html .= '</tbody></table>';

// Write HTML to PDF
$mpdf->WriteHTML($html);

// Output the PDF
$mpdf->Output('students.pdf', 'I'); // 'D' for download, 'I' for inline view