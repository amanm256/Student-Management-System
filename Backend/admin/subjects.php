<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_system1";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Add Subject
if (isset($_POST['add_subject'])) {
    $subject_name = $conn->real_escape_string($_POST['subject_name']);
    $course_id = (int)$_POST['course_id'];
    $semester = (int)$_POST['semester'];

    $sql = "INSERT INTO subjects (subject_name, course_id, semester) VALUES ('$subject_name', $course_id, $semester)";
    $conn->query($sql);
    header("Location: subjects.php");
    exit;
}

// Update Subject
if (isset($_POST['update_subject'])) {
    $id = (int)$_POST['id'];
    $subject_name = $conn->real_escape_string($_POST['subject_name']);
    $course_id = (int)$_POST['course_id'];
    $semester = (int)$_POST['semester'];

    $sql = "UPDATE subjects SET subject_name='$subject_name', course_id=$course_id, semester=$semester WHERE id=$id";
    $conn->query($sql);
    header("Location: subjects.php");
    exit;
}

// Delete Subject
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM subjects WHERE id=$id");
    header("Location: subjects.php");
    exit;
}

// Fetch courses for dropdown
$courses = $conn->query("SELECT id, course_name FROM courses ORDER BY course_name ASC");

// Fetch subjects with course names
$subjects = $conn->query("
    SELECT s.id, s.subject_name, s.semester, c.course_name
    FROM subjects s
    JOIN courses c ON s.course_id = c.id
    ORDER BY s.id ASC
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin - Manage Subjects</title>
<style>
body { font-family: Arial, sans-serif; background: #f7f9fb; margin: 20px; }
h2 { color: #333; }
form { background: white; padding: 15px; border-radius: 8px; width: 400px; margin-bottom: 25px; box-shadow: 0 0 5px #ccc; }
input, select { width: 100%; padding: 8px; margin: 6px 0; border: 1px solid #ccc; border-radius: 4px; }
button { padding: 8px 14px; background: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; }
button:hover { background: #45a049; }
table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 0 5px #ccc; }
th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
th { background: #f0f0f0; }
a { color: blue; text-decoration: none; }
a:hover { text-decoration: underline; }
</style>
</head>
<body>

<h2>Admin Panel – Manage Subjects</h2>

<?php if (isset($_GET['edit'])):
    $id = (int)$_GET['edit'];
    $edit = $conn->query("SELECT * FROM subjects WHERE id=$id")->fetch_assoc();
?>
<h3>Edit Subject</h3>
<form method="POST">
    <input type="hidden" name="id" value="<?= $edit['id'] ?>">

    <label>Subject Name:</label>
    <input type="text" name="subject_name" value="<?= htmlspecialchars($edit['subject_name']) ?>" required>

    <label>Course:</label>
    <select name="course_id" required>
        <?php
        $courses->data_seek(0);
        while ($c = $courses->fetch_assoc()):
        ?>
        <option value="<?= $c['id'] ?>" <?= ($c['id'] == $edit['course_id']) ? 'selected' : '' ?>>
            <?= htmlspecialchars($c['course_name']) ?>
        </option>
        <?php endwhile; ?>
    </select>

    <label>Semester:</label>
    <input type="number" name="semester" value="<?= $edit['semester'] ?>" required>

    <button type="submit" name="update_subject">Update Subject</button>
    <a href="subjects.php">Cancel</a>
</form>

<?php else: ?>
<h3>Add New Subject</h3>
<form method="POST">
    <label>Subject Name:</label>
    <input type="text" name="subject_name" required>

    <label>Course:</label>
    <select name="course_id" required>
        <option value="">Select Course</option>
        <?php
        $courses->data_seek(0);
        while ($c = $courses->fetch_assoc()):
        ?>
        <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['course_name']) ?></option>
        <?php endwhile; ?>
    </select>

    <label>Semester:</label>
    <input type="number" name="semester" required>

    <button type="submit" name="add_subject">Add Subject</button>
</form>
<?php endif; ?>

<h3>Subjects List</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Subject Name</th>
        <th>Course</th>
        <th>Semester</th>
        <th>Action</th>
    </tr>
    <?php if ($subjects->num_rows > 0): ?>
        <?php while ($row = $subjects->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['subject_name']) ?></td>
            <td><?= htmlspecialchars($row['course_name']) ?></td>
            <td><?= $row['semester'] ?></td>
            <td>
                <a href="subjects.php?edit=<?= $row['id'] ?>">Edit</a> |
                <a href="subjects.php?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this subject?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="5">No subjects found</td></tr>
    <?php endif; ?>
</table>

</body>
</html>

<?php $conn->close(); ?>
