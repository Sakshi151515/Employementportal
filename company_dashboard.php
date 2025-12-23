<?php 
include 'db.php'; 
if(!isset($_SESSION['company'])) header('location:login.php'); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Company Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">
    <h2>Welcome, <?php echo $_SESSION['company']; ?></h2>

    <div class="cards">
        <a href="post_job.php" class="card">Post Job</a>
        <a href="view_applications_company.php" class="card">View Applications</a>
        <a href="company_profile.php" class="card">Company Profile</a>
    </div>

    <a href="logout.php" class="logout">Logout</a>
</div>

</body>
</html>