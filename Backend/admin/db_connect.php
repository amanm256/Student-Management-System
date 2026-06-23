<?php
// db_connect.php - shared DB connection
$conn = mysqli_connect("localhost", "root", "", "feedback_system1");
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_system1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
?>

