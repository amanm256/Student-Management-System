<?php
error_reporting(1);
include('../dbconfig.php');  // <-- connects to feedback_system1

// When the attendance form is submitted
if (isset($_POST['save'])) {
    $faculty_id = $_POST['faculty_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    // Check if attendance already marked for that date
    $check = mysqli_query($conn, "SELECT * FROM attendance WHERE faculty_id='$faculty_id' AND date='$date'");
    if (mysqli_num_rows($check) > 0) {
        $msg = "<font color='red'>Attendance already marked for this date.</font>";
    } else {
        $q = "INSERT INTO attendance(faculty_id, date, status) VALUES('$faculty_id', '$date', '$status')";
        if (mysqli_query($conn, $q)) {
            $msg = "<font color='green'>Attendance recorded successfully.</font>";
        } else {
            $msg = "<font color='red'>Error saving attendance: " . mysqli_error($conn) . "</font>";
        }
    }
}
?>

<h1 class="page-header">Add Faculty Attendance</h1>

<div class="col-lg-8" style="margin:15px;">
    <form method="post">

        <div class="control-group form-group">
            <div class="controls">
                <label><?php echo @$msg; ?></label>
            </div>
        </div>

        <!-- Faculty Dropdown -->
        <div class="control-group form-group">
            <div class="controls">
                <label>Select Faculty:</label>
                <select name="faculty_id" class="form-control" required>
                    <option value="">-- Select Faculty --</option>
                    <?php
                    // Fetch all faculty from database
                    $faculty_q = mysqli_query($conn, "SELECT id, name FROM faculty ORDER BY name ASC");
                    while ($f = mysqli_fetch_assoc($faculty_q)) {
                        echo "<option value='{$f['id']}'>{$f['name']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <!-- Attendance Date -->
        <div class="control-group form-group">
            <div class="controls">
                <label>Date:</label>
                <input type="date" name="date" class="form-control" required>
            </div>
        </div>

        <!-- Status (Present/Absent) -->
        <div class="control-group form-group">
            <div class="controls">
                <label>Status:</label>
                <select name="status" class="form-control" required>
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                </select>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="control-group form-group">
            <div class="controls">
                <input type="submit" name="save" class="btn btn-success" value="Save Attendance">
            </div>
        </div>
    </form>
</div>
