<?php
// ----------------------------------------------------
// Database Connection Configuration
// ****************************************************
// IMPORTANT: You MUST update these variables with your actual database credentials.
$db_host = 'localhost'; // Change this if your database is on a different server
$db_user = 'root';      // Your database username
$db_pass = '';          // Your database password (often empty for local development)
$db_name = 'feedback_system1'; // Your specified database name
// ****************************************************
// ----------------------------------------------------

$cours = [];
$years = [];
$sections = [];
$message = ''; // To store any messages to the user

// Establish database connection
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    $message = "Error: Database connection failed. " . mysqli_connect_error();
} else {
    // --- Fetch Courses ---
    // Assuming you have a 'courses' table with a 'course_name' column
    // If not, you can manually define $courses = ['B.Tech', 'M.Tech', ...];
    $sql_cours = "SELECT DISTINCT course_name FROM schedule_entries ORDER BY course_name";
    $result_cours = mysqli_query($conn, $sql_courses);
    if ($result_cours && mysqli_num_rows($result_cours) > 0) {
        while ($row = mysqli_fetch_assoc($result_cours)) {
            $courses[] = $row['course_name'];
        }
    } else {
        // Fallback or default values if database table is empty or doesn't exist
        $cours = ['B.Tech', 'M.Tech', 'BCA', 'MCA'];
    }
    
    // --- Fetch Years ---
    // Assuming you have a 'years' table with an 'academic_year' column
    // Or, get distinct years from 'schedule_entries'
    $sql_years = "SELECT DISTINCT academic_year FROM schedule_entries ORDER BY academic_year";
    $result_years = mysqli_query($conn, $sql_years);
    if ($result_years && mysqli_num_rows($result_years) > 0) {
        while ($row = mysqli_fetch_assoc($result_years)) {
            $years[] = $row['academic_year'];
        }
    } else {
        $years = ['1st', '2nd', '3rd', '4th'];
    }

    // --- Fetch Sections ---
    // Assuming you have a 'sections' table with a 'section_name' column
    // Or, get distinct sections from 'schedule_entries'
    $sql_sections = "SELECT DISTINCT section_name FROM schedule_entries ORDER BY section_name";
    $result_sections = mysqli_query($conn, $sql_sections);
    if ($result_sections && mysqli_num_rows($result_sections) > 0) {
        while ($row = mysqli_fetch_assoc($result_sections)) {
            $sections[] = $row['section_name'];
        }
    } else {
        $sections = ['A', 'B', 'C', 'D'];
    }

    mysqli_close($conn); // Close connection after fetching dropdown data
}


// Handle form submission for viewing the timetable
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_course = htmlspecialchars($_POST['course'] ?? '');
    $selected_year = htmlspecialchars($_POST['year'] ?? '');
    $selected_section = htmlspecialchars($_POST['section'] ?? '');

    // You would typically redirect to another page (e.g., 'view_timetable_results.php')
    // and pass these parameters to display the actual timetable.
    // For now, let's just show a confirmation message.

    if (!empty($selected_course) && !empty($selected_year) && !empty($selected_section)) {
        // Example: Redirect to a results page
        header("Location: view_timetable_results.php?course=$selected_course&year=$selected_year&section=$selected_section");
        exit();
    } else {
        $message = "Please select all fields (Course, Year, Section).";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Time Table</title>
    <style>
        /* Basic CSS to match the style in your image */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f0f0f0; /* Light background */
        }
        .header {
            background-color: #007bff; /* Blue header */
            color: white;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        .header img {
            height: 40px; /* Adjust logo size */
            margin-right: 15px;
        }
        .main-page-link {
            padding: 10px;
            background-color: #dc3545; /* Red "Main Page" button */
            color: white;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin: 10px 0 20px 0;
        }
        .container {
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }
        .form-box {
            background-color: #ffe0b2; /* Light orange/peach background for the form box */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 500px; /* Wider to accommodate "Course Details" label */
            text-align: center;
        }
        .form-box h2 {
            background-color: #ff9800; /* Darker orange header for the form */
            color: white;
            padding: 10px;
            margin: -30px -30px 20px -30px; /* Adjust to cover the form box width */
            font-size: 18px;
        }
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            font-weight: bold;
            width: 150px; /* Fixed width for "Course Details" label */
            text-align: right;
            margin-right: 15px;
        }
        .select-group {
            display: flex;
            gap: 10px; /* Space between Course, Year, Section dropdowns */
            flex-grow: 1; /* Allows the group to take available space */
        }
        .select-group select {
            width: 33.33%; /* Equal width for the three dropdowns */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn-submit {
            background-color: #4CAF50; /* Green submit button */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 15px;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            background-color: #f8d7da; /* Light red for error */
            color: #721c24; /* Dark red for error text */
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            text-align: left;
        }
        .logo {
            height: 50px; /* Adjust as needed */
            vertical-align: middle;
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="https://via.placeholder.com/50x50?text=BBS" alt="BBS Logo" class="logo">
        BBS Group of Institutions
    </div>

    <a href="admin_dashboard.php" class="main-page-link">Go to Main Page</a>

    <?php if (!empty($message)): ?>
        <div class="container">
            <div class="message"><?php echo $message; ?></div>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="form-box">
            <h2>VIEW TIME TABLE</h2>
            
            <form action="schedule.php" method="POST">
                
                <div class="form-group">
                    <label>Course Details:</label>
                    <div class="select-group">
                        <select name="course" required>
                            <option value="">-- Select Course --</option>
                            <?php foreach ($cours as $c): ?>
                                <option value="<?php echo htmlspecialchars($c); ?>"><?php echo htmlspecialchars($c); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="year" required>
                            <option value="">-- Select Year --</option>
                            <?php foreach ($years as $y): ?>
                                <option value="<?php echo htmlspecialchars($y); ?>"><?php echo htmlspecialchars($y); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="section" required>
                            <option value="">-- Select Section --</option>
                            <?php foreach ($sections as $s): ?>
                                <option value="<?php echo htmlspecialchars($s); ?>"><?php echo htmlspecialchars($s); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Submit</button>
            </form>
        </div>
    </div>

</body>
</html>