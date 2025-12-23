<?php
include 'db.php';

/* Session check */
if (!isset($_SESSION['emp_id'])) {
    header("location:login.php");
    exit;
}

$emp_id = $_SESSION['emp_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Applied Jobs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">
    <h2>My Applied Jobs</h2>

<?php
$sql = "
SELECT jobs.title, jobs.location, jobs.salary, applications.status
FROM applications
INNER JOIN jobs ON applications.job_id = jobs.job_id
WHERE applications.emp_id = '$emp_id'
";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
        <div class='job-card'>
            <h3>{$row['title']}</h3>
            <p><b>Location:</b> {$row['location']}</p>
            <p><b>Salary:</b> {$row['salary']}</p>
            <p><b>Status:</b> {$row['status']}</p>
        </div>";
    }
} else {
    echo "<p>You have not applied for any jobs yet.</p>";
}
?>

<a href="employee_dashboard.php" class="logout">Back to Dashboard</a>


</div>


</body>
</html>