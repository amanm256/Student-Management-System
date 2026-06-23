<?php
session_start();
include('db_connect.php');
if (!isset($_SESSION['user'])) { header('Location: index.php'); exit; }
$user = $_SESSION['user'];

if (isset($_POST['change'])) {
    $new = mysqli_real_escape_string($conn, $_POST['new_password']);
    mysqli_query($conn, "UPDATE users SET password='$new' WHERE username='$user'");
    $msg = "Password updated!";
}
?>
<!DOCTYPE html>
<html>
<head><title>Update Password</title></head>
<body style="font-family:Arial; margin:40px;">
    <h2>Change Password</h2>
    <?php if(isset($msg)) echo "<p style='color:green;'>$msg</p>"; ?>
    <form method="POST">
        New Password: <input type="password" name="new_password" required><br><br>
        <input type="submit" name="change" value="Change Password">
    </form>
    <p><a href="<?php echo ($_SESSION['role']=='admin')?'admin_dashboard.php':'student_dashboard.php'; ?>">Back to Dashboard</a></p>
</body>
</html>
