<?php


// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_system1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add new course
if (isset($_POST['add_course'])) {
    $name = $conn->real_escape_string($_POST['course_name']);
    $total = (int)$_POST['total_seats'];
    $used = (int)$_POST['used_seats'];

    $conn->query("INSERT INTO courses (course_name, total_seats, used_seats) VALUES ('$name', $total, $used)");
    header("Location: course.php");
    exit;
}

// Update existing course
if (isset($_POST['update_course'])) {
    $id = (int)$_POST['id'];
    $name = $conn->real_escape_string($_POST['course_name']);
    $total = (int)$_POST['total_seats'];
    $used = (int)$_POST['used_seats'];

    $conn->query("UPDATE courses SET course_name='$name', total_seats=$total, used_seats=$used WHERE id=$id");
    header("Location: course.php");
    exit;
}

// Delete course
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM courses WHERE id=$id");
    header("Location: course.php");
    exit;
}

// Fetch courses
$result = $conn->query("SELECT * FROM courses ORDER BY id ASC");
$result = $conn->query("SELECT id, course_name, total_seats, used_seats, (total_seats - used_seats) AS available_seats FROM courses ORDER BY id ASC");


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin - Manage Courses</title>
<style>
body { font-family: Arial; margin: 20px; background: #f7f9fb; }
h2 { color: #333; }
table { border-collapse: collapse; width: 100%; background: white; }
th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
th { background-color: #f0f0f0; }
form { margin-top: 20px; background: white; padding: 15px; border-radius: 8px; width: 400px; }
input[type=text], input[type=number] { width: 100%; padding: 8px; margin: 5px 0; }
button { padding: 6px 12px; margin-top: 10px; cursor: pointer; }
a { text-decoration: none; color: blue; }
</style>
</head>
<body>

<h2>Admin Panel – Manage Courses</h2>

<!-- Add / Update Form -->
<?php if (isset($_GET['edit'])): 
    $id = (int)$_GET['edit'];
    $edit = $conn->query("SELECT * FROM courses WHERE id=$id")->fetch_assoc();
?>
<h3>Edit Course</h3>
<form method="POST">
    <input type="hidden" name="id" value="<?= $edit['id'] ?>">
    <label>Course Name:</label>
    <input type="text" name="course_name" value="<?= $edit['course_name'] ?>" required>

    <label>Total Seats:</label>
    <input type="number" name="total_seats" value="<?= $edit['total_seats'] ?>" required>

    <label>Used Seats:</label>
    <input type="number" name="used_seats" value="<?= $edit['used_seats'] ?>" required>

    <button type="submit" name="update_course">Update Course</button>
    <a href="course.php">Cancel</a>
</form>

<?php else: ?>
<h3>Add New Course</h3>
<form method="POST">
    <label>Course Name:</label>
    <input type="text" name="course_name" required>

    <label>Total Seats:</label>
    <input type="number" name="total_seats" required>

    <label>Used Seats:</label>
    <input type="number" name="used_seats" value="0">

    <button type="submit" name="add_course">Add Course</button>
</form>
<?php endif; ?>

<!-- Course Table -->
<h3>Course List</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Course Name</th>
        <th>Total Seats</th>
        <th>Used Seats</th>
        <th>Available Seats</th>
        <th>Action</th>
    </tr>

    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['course_name']) ?></td>
            <td><?= $row['total_seats'] ?></td>
            <td><?= $row['used_seats'] ?></td>
            <td><?= $row['available_seats'] ?></td>
            <td>
                <a href="course.php?edit=<?= $row['id'] ?>">Edit</a> | 
                <a href="course.php?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this course?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="6">No courses found</td></tr>
    <?php endif; ?>
</table>

</body>
</html>

<?php
$conn->close();
?>
