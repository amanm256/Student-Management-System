<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'student') { header("Location: index.php"); exit; }
include('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head><title>Student Dashboard</title></head>
<body style="font-family:Arial; margin:40px;">
    <h2>Welcome Student: <?php echo htmlspecialchars($_SESSION['name']); ?></h2>
    <a href="attendance.php">Mark Attendance</a> |
    <a href="feedback.php">Give Feedback</a> |
    <a href="update_profile.php">Update Profile</a> |
    <a href="update_password.php">Change Password</a> |
    <a href="logout.php">Logout</a>
</body>
</html>
