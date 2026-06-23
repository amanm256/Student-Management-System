<?php
$conn = mysqli_connect("localhost", "root", "", "feedback_system1");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
