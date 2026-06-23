<?php
session_start();
include('db_connect.php');

// Only students and admin/faculty should be able to access
if (!isset($_SESSION['role'])) { header("Location: index.php"); exit; }

if (isset($_POST['save'])) {
    $faculty_name = mysqli_real_escape_string($conn, $_POST['faculty_name']);
    $student_name = mysqli_real_escape_string($conn, $_POST['student_name']);
    $roll_no = mysqli_real_escape_string($conn, $_POST['roll_no']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $sql = "INSERT INTO attendance (faculty_name, student_name, roll_no, date, status)
            VALUES ('$faculty_name','$student_name','$roll_no','$date','$status')";
    mysqli_query($conn, $sql);
    $msg = "Attendance saved!";
}
?>
<!DOCTYPE html>
<html>
<head><title>Mark Attendance</title></head>
<body style="font-family:Arial; margin:40px;">
    <h2>Mark Attendance</h2>
    <?php if(isset($msg)) echo "<p style='color:green;'>$msg</p>"; ?>
    <form method="POST">
        Faculty Name: <input type="text" name="faculty_name" required value="<?php echo isset($_SESSION['name'])?htmlspecialchars($_SESSION['name']):'';?>"><br><br>
        Student Name: <input type="text" name="student_name" required><br><br>
        Roll No: <input type="text" name="roll_no" required><br><br>
        Date: <input type="date" name="date" required value="<?php echo date('Y-m-d');?>"><br><br>
        Status:
        <select name="status" required>
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select><br><br>
        <input type="submit" name="save" value="Save Attendance">
    </form>
    <p><a href="student_dashboard.php">Back to Dashboard</a></p>
</body>
</html>
