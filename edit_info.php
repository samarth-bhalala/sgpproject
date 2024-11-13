<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.form {
  max-width: 420px;
  /* width: 100%; */
  background-color: #fff;
  padding: 20px;
  box-shadow: 0px 0px 0px 4px rgba(52, 52, 53, 0.185);
  display: flex;
  flex-direction: column;
  border-radius: 10px;
  margin:auto;
  margin-top:200px;
}

.title {
  text-align: center;
  font-size: 2rem;
  margin-bottom: 20px;
  color: #1a202c;
}

.label {
  color: rgb(0, 0, 0);
  margin-bottom: 4px;
}

.input {
  padding: 10px;
  margin-bottom: 20px;
  /* width: 100%; */
  font-size: 1rem;
  color: #4a5568;
  outline: none;
  border: 1px solid transparent;
  border-radius: 4px;
  transition: all 0.2s ease-in-out;
}

.input:focus {
  background-color: #fff;
  box-shadow: 0 0 0 2px #cbd5e0;
}

.input:valid {
  border: 1px solid green;
}

.input:invalid {
  border: 1px solid rgba(14, 14, 14, 0.205);
}

.submit {
  background-color: #1a202c;
  color: #fff;
  border: none;
  border-radius: 4px;
  padding: 10px 20px;
  font-size: 1.2rem;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}
  </style>
</head>
<body>
<form class="form" action="cnp.php" method="POST">
    <span class="title">PhysioFit</span>
    <label for="username" class="label">Change Username</label>
    <input type="text" id="username" name="new_user_name" class="input">
    <label for="email" class="label">Change Email</label>
    <input type="email" id="email" name="new_user_email" class="input">
    <button type="submit" class="submit" name="sub">Register</button>
  </form>
  <?php
    // if(isset($_POST['sub']))
    // {
    //     $_SESSION['new_name']=$_POST['username'];
    //     $_SESSION['new_mail']=$_POST['email'];
    // }
  ?>
</body>
</html>