<?php
session_start();
include('db_connect.php');
if (!isset($_SESSION['role'])) { header('Location: index.php'); exit; }

if (isset($_POST['submit'])) {
    $student_name = mysqli_real_escape_string($conn, $_SESSION['name']);
    $faculty_name = mysqli_real_escape_string($conn, $_POST['faculty_name']);
    $feedback_text = mysqli_real_escape_string($conn, $_POST['feedback_text']);

    mysqli_query($conn, "INSERT INTO feedback (student_name, faculty_name, feedback_text) VALUES ('$student_name','$faculty_name','$feedback_text')");
    $msg = "Feedback submitted!";
}
?>
<!DOCTYPE html>
<html>
<head><title>Feedback</title></head>
<body style="font-family:Arial; margin:40px;">
    <h2>Submit Feedback</h2>
    <?php if(isset($msg)) echo "<p style='color:green;'>$msg</p>"; ?>
    <form method="POST">
        Faculty Name: <input type="text" name="faculty_name" required><br><br>
        Feedback:<br>
        <textarea name="feedback_text" rows="5" cols="50" required></textarea><br><br>
        <input type="submit" name="submit" value="Send Feedback">
    </form>
    <p><a href="student_dashboard.php">Back to Dashboard</a></p>
</body>
</html>
