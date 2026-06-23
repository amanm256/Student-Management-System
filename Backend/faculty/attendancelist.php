<?php
// -------------------------------
// Database Connection
// -------------------------------
$servername = "localhost";
$username = "root";
$password = "";
$database = "feedback_system1";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance List (Admin)</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f5f5f5;
            margin: 40px;
        }
        h2 { color: #333; }
        table {
            width: 90%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px gray;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

    <h2>Attendance List (Admin View)</h2>

    <a href="attendance.php">Back to Mark Attendance</a>
    <br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Roll No</th>
            <th>Date</th>
            <th>Status</th>
        </tr>

        <?php
        // Fetch all attendance records
        $result = mysqli_query($conn, "SELECT * FROM attendance ORDER BY date DESC, id DESC");

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['student_name']."</td>
                        <td>".$row['roll_no']."</td>
                        <td>".$row['date']."</td>
                        <td>".$row['status']."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No attendance records found</td></tr>";
        }
        ?>
    </table>

</body>
</html>
