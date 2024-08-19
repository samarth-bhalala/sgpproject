<?php
// Include the database connection file
require_once 'conn.php';

// Check if the form has been submitted
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
  // Get the username, password, and email from the form
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  // Validate the input data
  if (empty($username) || empty($password) || empty($email)) {
    echo 'Please fill out all fields';
    exit;
  }

  // Validate the email address using a regular expression
  $email_regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
  if (!preg_match($email_regex, $email)) {
    echo 'Invalid email address';
    exit;
  }

  // Check if the username is already taken
  $stmt = $con->prepare("SELECT * FROM signup WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    echo 'Username already taken';
    exit;
  }

  // Check if the email is already taken
  $stmt = $con->prepare("SELECT * FROM signup WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    echo 'Email already taken';
    exit;
  }

  // Hash the password using Argon2
  $hashed_password = password_hash($password, PASSWORD_ARGON2I);

  // Insert the new user into the database
  $stmt = $con->prepare("INSERT INTO signup (username, pass, email) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $hashed_password, $email);
  $stmt->execute();

  // Set the session variables and redirect to index.php
  $_SESSION['stat'] = 'logged_in';
  $_SESSION['username'] = $username;
  header('Location: index.php');
  exit;
} else {
  // If the form hasn't been submitted, display an error message
  echo 'Please fill out the form';
}

// Close the database connection
$con->close();
?>