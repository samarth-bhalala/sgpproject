<?php
// Include the database connection file
require_once 'conn.php';
session_start();
// Check if the form has been submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
  // Get the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Prepare the query to check if the username and password are valid
  $stmt = $con->prepare("SELECT * FROM signup WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if the query returned any results
  if ($result->num_rows > 0) {
    // Get the hashed password from the database
    $row = $result->fetch_assoc();
    $hashed_password = $row['pass'];

    // Compare the hashed password with the password entered in the form
    if (password_verify($password, $hashed_password)) {
      // If the passwords match, set the session variables and redirect to index.php
      $_SESSION['stat'] = 1;
      $_SESSION['username']=$username;
      $_SESSION['pass']=$password;
      header('Location: profile.php');
      exit;
    } else {
      // If the passwords don't match, display an error message
      $msg = 'Invalid username or password';
      header('Location: index.php');
    }
  } else {
    // If the query didn't return any results, display an error message
    $msg = 'Invalid username or password';
    header('Location: index.php');
  }

  // Close the statement and connection
  $stmt->close();
  $con->close();
} else {
  // If the form hasn't been submitted, display an error message
  echo 'Please fill out the form';
}
?>