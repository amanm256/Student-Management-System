<?php
session_start();
include('db_connect.php');
if (!isset($_SESSION['user'])) { header('Location: index.php'); exit; }
$user = $_SESSION['user'];

if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    mysqli_query($conn, "UPDATE users SET name='$name', email='$email' WHERE username='$user'");
    $_SESSION['name'] = $name;
    $msg = "Profile updated!";
}

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE username='$user'"));
?>
<!DOCTYPE html>
<html>
<head><title>Update Profile</title></head>
<body style="font-family:Arial; margin:40px;">
    <h2>Update Profile</h2>
    <?php if(isset($msg)) echo "<p style='color:green;'>$msg</p>"; ?>
    <form method="POST">
        Name: <input type="text" name="name" value="<?php echo htmlspecialchars($data['name']); ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required><br><br>
        <input type="submit" name="update" value="Update Profile">
    </form>
    <p><a href="<?php echo ($_SESSION['role']=='admin')?'admin_dashboard.php':'student_dashboard.php'; ?>">Back to Dashboard</a></p>
</body>
</html>
