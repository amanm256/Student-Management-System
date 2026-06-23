<?php
session_start();
include('db_connect.php');
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') { header("Location: index.php"); exit; }

$result = mysqli_query($conn, "SELECT * FROM attendance ORDER BY date DESC, id DESC");
?>
<!DOCTYPE html>
<html>
<head><title>Attendance List</title></head>
<body style="font-family:Arial; margin:40px;">
    <h2>Attendance List (Admin)</h2>
    <a href="admin_dashboard.php">Back to Dashboard</a> | <a href="logout.php">Logout</a>
    <br><br>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>ID</th><th>Faculty</th><th>Student</th><th>Roll No</th><th>Date</th><th>Status</th></tr>
        <?php if(mysqli_num_rows($result)>0){ while($r = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $r['id']; ?></td>
            <td><?php echo htmlspecialchars($r['faculty_name']); ?></td>
            <td><?php echo htmlspecialchars($r['student_name']); ?></td>
            <td><?php echo htmlspecialchars($r['roll_no']); ?></td>
            <td><?php echo $r['date']; ?></td>
            <td><?php echo $r['status']; ?></td>
        </tr>
        <?php } } else { ?>
        <tr><td colspan="6">No records found</td></tr>
        <?php } ?>
    </table>
</body>
</html>
