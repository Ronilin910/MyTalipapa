<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // PASSWORD MATCH CHECK
    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // CHECK IF EMAIL EXISTS
        $check = $conn->query("SELECT * FROM users WHERE email='$email'");
        if ($check->num_rows > 0) {
            $error = "Email already registered.";
        } else {
            $sql = "INSERT INTO users (full_name, email, contact_number, role, password)
                    VALUES ('$full_name', '$email', '$contact', '$role', '$hashed_password')";
            if ($conn->query($sql)) {
                echo "<script>alert('Registration successful!'); window.location='login.php';</script>";
                exit;
            } else {
                $error = "Something went wrong.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register | MyTalipapa</title>
  <link rel="stylesheet" href="css/auth.css">
</head>
<body>

<div class="auth-container register-page">
  <div class="auth-image">
    <div class="overlay">
      <img src="images/mytalipapa-logo.png" class="auth-logo">
      <h2>Join MyTalipapa</h2>
      <p>Register to access AR-based market navigation</p>
    </div>
  </div>

  <div class="auth-form">
    <a href="index.php" class="return-btn">← Back</a>

    <h2>Create Account</h2>
    <p>Fill in the details below</p>

    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">
      <input type="text" name="full_name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email address" required>
      <input type="text" name="contact" placeholder="Contact Number" required>

      <select name="role" required>
        <option value="">Select Role</option>
        <option>Stall Renter</option>
        <option>Market Contractor</option>
      </select>

      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="confirm_password" placeholder="Confirm Password" required>

      <button type="submit">Register</button>
      <span class="link">Already have an account? <a href="login.php">Login</a></span>
    </form>
  </div>
</div>

</body>
</html>
