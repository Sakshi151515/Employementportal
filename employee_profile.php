<?php
include 'db.php';

/* Session check */
if (!isset($_SESSION['emp_id'])) {
    header("location:login.php");
    exit;
}

$emp_id = $_SESSION['emp_id'];

/* Fetch employee data */
$result = $conn->query("SELECT * FROM employee WHERE emp_id='$emp_id'");
$emp = $result->fetch_assoc();

/* Update profile */
if (isset($_POST['update'])) {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    

    $conn->query("UPDATE employee 
                  SET name='$name', email='$email'
                  WHERE emp_id='$emp_id'");

    echo "<script>alert('Profile Updated Successfully');
          window.location='employee_profile.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">
    <h2>My Profile</h2>

    <form method="post">
        <input type="text" name="name"
               value="<?php echo htmlspecialchars($emp['name']); ?>"
               placeholder="Name" required>

        <input type="email" name="email"
               value="<?php echo htmlspecialchars($emp['email']); ?>"
               placeholder="Email" required>

        

        <button type="submit" name="update">Update Profile</button>
    </form>

    <a href="employee_dashboard.php" class="logout">Back to Dashboard</a>
</div>

</body>
</html>