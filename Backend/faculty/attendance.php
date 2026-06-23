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

// -------------------------------
// Save Attendance
// -------------------------------
if (isset($_POST['save'])) {
    $faculty_name = $_POST['faculty_name'];
    $student_name = $_POST['student_name'];
    $roll_no = $_POST['roll_no'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO attendance (faculty_name, student_name, roll_no, date, status)
            VALUES ('$faculty_name', '$student_name', '$roll_no', '$date', '$status')";

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color:green;'>✅ Attendance saved successfully!</p>";
    } else {
        echo "<p style='color:red;'>❌ Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Faculty Attendance Entry</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f5f5f5;
            margin: 40px;
        }
        h2 { color: #333; }
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 0 10px gray;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover { background-color: #0056b3; }
        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

    <h2>📋 Mark Student Attendance</h2>

    <form method="POST" action="">
        <label>Faculty Name:</label>
        <input type="text" name="faculty_name" placeholder="Enter your name" required>

        <label>Date:</label>
        <input type="date" name="date" required>

        <label>Student Name:</label>
        <input type="text" name="student_name" placeholder="Enter student name" required>

        <label>Roll Number:</label>
        <input type="text" name="roll_no" placeholder="Enter roll number" required>

        <label>Status:</label>
        <select name="status" required>
            <option value="">-- Select Status --</option>
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select>

        <input type="submit" name="save" value="Save Attendance" class="btn">
    </form>

    <br>
    <a href="attendancelist.php">➡ View Attendance List (Admin)</a>

</body>
</html>
