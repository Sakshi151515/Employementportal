<?php 
include 'db.php'; 
if(!isset($_SESSION['employee'])) header('location:login.php'); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">
    <h2>Welcome, <?php echo $_SESSION['employee']; ?></h2>

    <div class="cards">
        <a href="apply_job.php" class="card">Apply job</a>
        <a href="view_jobs.php" class="card">View jobs</a>
        <a href="employee_profile.php" class="card">Employee Profile</a>
    </div>

    <a href="logout.php" class="logout">Logout</a>
</div>

</body>
</html>