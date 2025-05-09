<?php
if (file_exists('db.php')) {
    include 'db.php';
} else {
    die('Error: db.php not found.');
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if ($password === $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Fix: Define the $sql query before executing it
        $sql = "INSERT INTO users (Name, Email, Pswr) VALUES ('$fullname', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            $message = "Account created successfully!";
        } else {
            $message = "Error: " . $conn->error;
        }
    } else {
        $message = "Passwords do not match.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PathFinders Sign Up</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
 * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: 'Inter', sans-serif;
}

body {
  background: url('cat.gif') no-repeat center center/cover;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.signup-container {
  background: rgba(255, 255, 255, 0.2); 
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px); 
  padding: 40px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 400px;
}

.signup-container h2 {
  margin-bottom: 20px;
  text-align: center;
  color: #000000;
}

.message {
  text-align: center;
  color: #ff0000;
  font-weight: 600;
}

.form-group label {
  display: block;
  margin-bottom: 8px;
  font-weight: 600;
  color: #000000;
}

.form-group input {
  width: 100%;
  padding: 10px;
  border-radius: 6px;
  border: 1px solid #000000;
  background-color: rgba(255, 255, 255, 0.85);
}

.signup-btn {
  width: 100%;
  padding: 12px;
  background-color: #2e86de;
  color: white;
  border: none;
  border-radius: 6px;
  font-weight: 600;
  font-size: 16px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.signup-btn:hover {
  background-color: #1e6fbb;
}

.login-link {
  text-align: center;
  margin-top: 16px;
  font-size: 14px;
  color: #fff;
}

.login-link a {
  color: #ffeb3b;
  text-decoration: none;
}
  </style>
</head>
<body>
  <div class="signup-container">
    <h2>Create Your Account</h2>
    <?php if (!empty($message)) echo "<p class='message'>$message</p>"; ?>
    <form action="SignUP.php" method="post">
      <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>

      <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" required>
      </div>

      <button type="submit" class="signup-btn">Sign Up</button>
    </form>
    <div class="login-link">
      Already have an account? <a href="index.php">Log in</a>
    </div>
  </div>
</body>
</html>
