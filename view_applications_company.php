<?php
include 'db.php';

if (!isset($_SESSION['company_id'])) {
    header("Location: login.php");
    exit;
}

$company_id = $_SESSION['company_id'];
?>
<!DOCTYPE html>
<html>
<head>
<title>View Applications</title>
<link rel="stylesheet" href="style.css">
<style>
.app-box{
    background:#f9f9f9;
    padding:20px;
    margin-bottom:15px;
    border-left:6px solid #2a5298;
    border-radius:8px;
}
.app-box h3{ margin:0; color:#1e3c72; }
.status{
    padding:5px 12px;
    border-radius:20px;
    background:#2a5298;
    color:white;
    font-size:14px;
}
</style>
</head>
</head>

<body>
<div class="dashboard">
<h2>Job Applications</h2>

<?php
$sql = "
SELECT 
    jobs.title,
    employee.name,
    employee.email,
    applications.status
FROM applications
INNER JOIN jobs ON applications.job_id = jobs.job_id
INNER JOIN employee ON applications.emp_id = employee.emp_id
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
    <div class="app-box">
        <h3><?php echo $row['title']; ?></h3>
        <p><b>Applicant:</b> <?php echo $row['name']; ?></p>
        <p><b>Email:</b> <?php echo $row['email']; ?></p>
        <span class="status"><?php echo $row['status']; ?></span>
    </div>
<?php
    }
} else {
    echo "<p>No applications received yet.</p>";
}
?>

<a href="company_dashboard.php" class="logout">⬅ Back to Dashboard</a>
</div>
</body>
</html>
