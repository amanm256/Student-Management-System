<?php
include 'admin_connection.php';
include '2023_2024.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Students 2023-2024</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Students for Academic Year: 2023-2024</h1>

    <?php if(!empty($students)) { ?>
    <table>
        <tr>
            <th>Student Name</th>
            <th>Branch</th>
            <th>Address</th>
            <th>Father Name</th>
            <th>Mobile No</th>
        </tr>
        <?php foreach($students as $student) { ?>
        <tr>
            <td><?php echo htmlspecialchars($student['student_name']); ?></td>
            <td><?php echo htmlspecialchars($student['branch']); ?></td>
            <td><?php echo htmlspecialchars($student['address']); ?></td>
            <td><?php echo htmlspecialchars($student['father_name']); ?></td>
            <td><?php echo htmlspecialchars($student['mobile_no']); ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php } else { ?>
        <p>No student data found for this year.</p>
    <?php } ?>
</body>
</html>
