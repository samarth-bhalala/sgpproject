<?php
// Include the database connection file
require_once 'conn.php';
session_start();
// Check if the form has been submitted
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['email']) &&  isset($_POST['phone'])) {

  // Get the username, password, confirm password, and email from the form
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $email = $_POST['email'];
  $phone=$_POST['phone'];

  // Validate the input data
  if (empty($username) || empty($password) || empty($confirm_password) || empty($email)|| empty($phone)) {

    $msg= 'Please fill out all fields';
    header("Location: loginsignup.php?msg=$msg#");
    exit;
  }

  // Check if the password and confirm password match
  if ($password !== $confirm_password) {
    $msg= 'Passwords do not match';
    header("Location: loginsignup.php?msg=$msg#");
    exit;
  }

  // Check password length
  if (strlen($password) < 8) {
    $msg= 'Password must be at least 8 characters long';
    header("Location: loginsignup.php?msg=$msg#");
    exit;
  }

  // Check password strength
  if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
    $msg= 'Password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character';
    header("Location: loginsignup.php?msg=$msg#");
    exit;
  }

  // Validate the email address using a regular expression
  $email_regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
  if (!preg_match($email_regex, $email)) {
    $msg= 'Invalid email address';
    header("Location: loginsignup.php?msg=$msg#");
    exit;
  }

  // Check if the username is already taken
  $stmt = $con->prepare("SELECT * FROM signup WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $msg= 'Username already taken';
    header("Location: loginsignup.php?msg=$msg#");
    exit;
  }

  // Check if the email is already taken
  $stmt = $con->prepare("SELECT * FROM signup WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $msg= 'Email already taken';
    header("Location: loginsignup.php?msg=$msg#");
    exit;
  }

  // Hash the password using Argon2
  $hashed_password = password_hash($password, PASSWORD_ARGON2I);

  // Insert the new user into the database
  $stmt = $con->prepare("INSERT INTO signup (username, pass, email,phone) VALUES (?, ?, ?,?)");
  $stmt->bind_param("ssss", $username, $hashed_password, $email, $phone);
  $stmt->execute();

  // Set the session variables and redirect to index.php
  $_SESSION['stat'] = 1;
  $_SESSION['username'] = $username;
  $_SESSION['pass']=$password;
  $_SESSION['email']=$email;
  $_SESSION['phone']=$phone;
  
  header('Location: index.php');
  exit;
} else {
  // If the form hasn't been submitted, display an error message
  $msg= 'Please fill out the form';
  header("Location: loginsignup.php?msg=$msg#");
}

// Close the database connection
$con->close();
?>