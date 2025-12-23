<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>MIDC Nashik Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-box">
<h2>MIDC Nashik Login</h2>
<form method="post">
<select name="role" required>
<option value="">Select Role</option>
<option value="employee">Employee</option>
<option value="company">Company</option>
</select>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit" name="login">Login</button>
</form>
</div>
</body>
</html>

<?php
if (isset($_POST['login'])) {
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($role == 'employee') {
        $sql = "SELECT * FROM employee WHERE email='$email'";
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['employee'] = $row['name'];
				$_SESSION['emp_id'] = $row['emp_id'];
                header("Location: employee_dashboard.php");
            }
        }
    } else {
        $sql = "SELECT * FROM company WHERE email='$email'";
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['company'] = $row['company_name'];
				$_SESSION['company_id'] = $row['comp_id'];
                header("Location: company_dashboard.php");
            }
        }
    }
    echo "<script>alert('Invalid Login');</script>";
}
?>