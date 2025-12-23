<?php include 'db.php'; if(!isset($_SESSION['company'])) header('location:login.php'); ?>
<!DOCTYPE html>
<html>
<head><title>Post Job</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="dashboard">
<h2>Post New Job</h2>
<form method="post">
<input type="text" name="title" placeholder="Job Title" required>
<textarea name="description" placeholder="Job Description" required></textarea>
<input type="text" name="location" placeholder="Location" required>
<input type="text" name="salary" placeholder="Salary" required>
<button name="post">Post Job</button>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['post'])){
  $title=$_POST['title'];
  $desc=$_POST['description'];
  $loc=$_POST['location'];
  $sal=$_POST['salary'];
  $cid=$_SESSION['company_id'] ?? 1;

  $conn->query("INSERT INTO jobs(comp_id,title,description,location,salary)
                VALUES('$cid','$title','$desc','$loc','$sal')");
  echo "<script>alert('Job Posted');</script>";
}
?>