<?php include 'db.php'; if(!isset($_SESSION['employee'])) header('location:login.php'); ?>
<!DOCTYPE html>
<html>
<head><title>Profile</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="dashboard">
<h2>Update Profile</h2>
<form method="post">
<input type="text" name="name" placeholder="Update Name" required>
<input type="email" name="email" placeholder="Update Email" required>
<button name="update">Update</button>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['update'])){
 $name=$_POST['name'];
 $email=$_POST['email'];
 $conn->query("UPDATE employee SET name='$name', email='$email' ");
 echo "<script>alert('Profile Updated');</script>";
}
?>