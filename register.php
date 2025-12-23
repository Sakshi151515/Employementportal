<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>MIDC Nashik Registration</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-box">
<h2>MIDC Registration</h2>
<form method="post">
<select name="role" required>
<option value="">Select Role</option>
<option value="employee">Employee</option>
<option value="company">Company</option>
</select>
<input type="text" name="name" placeholder="Employee / Company Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit" name="register">Register</button>
<p style="text-align:center">Already registered? <a href="login.php">Login</a></p>
</form>
</div>
</body>
</html>

<?php
if (isset($_POST['register'])) {
    $role = $_POST['role'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($role == 'employee') {
        $sql = "INSERT INTO employee(name,email,password) VALUES('$name','$email','$password')";
    } else {
        $sql = "INSERT INTO company(company_name,email,password) VALUES('$name','$email','$password')";
    }

    if ($conn->query($sql)) {
        echo "<script>alert('Registration Successful'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Email already exists');</script>";
    }
}
?>