<?php
session_start();
include 'db.php';

/* LOGIN */
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND role='$role'");

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "Account not found.";
    }
}

/* FORGOT PASSWORD */
if (isset($_POST['reset'])) {
    $email = $_POST['reset_email'];
    $role = $_POST['reset_role'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $check = $conn->query("SELECT * FROM users WHERE email='$email' AND role='$role'");
    if ($check->num_rows > 0) {
        $conn->query("UPDATE users SET password='$new_password' WHERE email='$email'");
        $success = "Password successfully updated.";
    } else {
        $error = "Account not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | MyTalipapa</title>
  <link rel="stylesheet" href="css/auth.css">
</head>
<body>

<div class="auth-container">
  <div class="auth-image">
    <div class="overlay">
      <img src="images/logo.png" class="auth-logo">
      <h2>MyTalipapa</h2>
      <p>AR-Based Stall Management System</p>
    </div>
  </div>

  <div class="auth-form">
    <a href="index.php" class="return-btn">← Back</a>

    <h2>Welcome Back</h2>
    <p>Please login to your account</p>

    <?php
      if(isset($error)) echo "<p style='color:red;'>$error</p>";
      if(isset($success)) echo "<p style='color:green;'>$success</p>";
    ?>

    <form method="post">
      <input type="email" name="email" placeholder="Email address" required>
      <input type="password" name="password" placeholder="Password" required>

      <select name="role" required>
        <option value="">Select Role</option>
        <option>Stall Renter</option>
        <option>Market Contractor</option>
        <option>Admin</option>
      </select>

      <button type="submit" name="login">Login</button>
    </form>

    <hr style="margin:20px 0;">

    <h4>Forgot Password?</h4>

    <form method="post">
      <input type="email" name="reset_email" placeholder="Email address" required>

      <select name="reset_role" required>
        <option value="">Select Role</option>
        <option>Stall Renter</option>
        <option>Market Contractor</option>
        <option>Admin</option>
      </select>

      <input type="password" name="new_password" placeholder="New Password" required>
      <button type="submit" name="reset">Reset Password</button>
    </form>

    <span class="link">Don’t have an account? <a href="register.php">Register</a></span>
  </div>
</div>

</body>
</html>
