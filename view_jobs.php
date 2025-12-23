<?php include 'db.php'; if(!isset($_SESSION['employee'])) header('location:login.php'); ?>
<!DOCTYPE html>
<html>
<head><title>Jobs</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="dashboard">
<h2>Available Jobs</h2>
<?php
$res=$conn->query("SELECT * FROM jobs");
while($row=$res->fetch_assoc()){
 echo "<div class='card'>
 <h3>{$row['title']}</h3>
 <p>{$row['description']}</p>
 <form method='post'>
 <input type='hidden' name='job_id' value='{$row['job_id']}'>
 <button name='apply'>Apply</button>
 </form></div>";
}

if(isset($_POST['apply'])){
 $jid=$_POST['job_id'];
 $eid=$_SESSION['emp_id'] ?? 1;
 $conn->query("INSERT INTO applications(job_id,emp_id) VALUES('$jid','$eid')");
 echo "<script>alert('Applied Successfully');</script>";
}
?>

</div>
</body>
</html>