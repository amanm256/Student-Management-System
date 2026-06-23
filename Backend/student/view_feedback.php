<?php
session_start();
include('db_connect.php');
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') { header("Location: index.php"); exit; }

$res = mysqli_query($conn, "SELECT * FROM feedback ORDER BY date DESC");
?>
<!DOCTYPE html>
<html>
<head><title>Feedback List</title></head>
<body style="font-family:Arial; margin:40px;">
    <h2>Feedback List (Admin)</h2>
    <a href="admin_dashboard.php">Back to Dashboard</a><br><br>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>ID</th><th>Student</th><th>Faculty</th><th>Feedback</th><th>Date</th></tr>
        <?php if(mysqli_num_rows($res)>0){ while($row = mysqli_fetch_assoc($res)){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['student_name']); ?></td>
            <td><?php echo htmlspecialchars($row['faculty_name']); ?></td>
            <td><?php echo htmlspecialchars($row['feedback_text']); ?></td>
            <td><?php echo $row['date']; ?></td>
        </tr>
        <?php } } else { ?>
        <tr><td colspan="5">No feedback yet</td></tr>
        <?php } ?>
    </table>
</body>
</html>
