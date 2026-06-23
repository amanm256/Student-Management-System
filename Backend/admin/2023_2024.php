<?php
include 'admin_connection.php';

// Fetch students for 2023-2024
$academic_year = "2023-2024";
$students = [];

$sql = "SELECT * FROM students WHERE academic_year='$academic_year' ORDER BY student_name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $students[] = $row;
    }
}
?>
