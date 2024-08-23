<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="verify.css">
</head>
<body>
<form class="form" action="chng_pass_verify.inc.php" method="POST">
  <div class="content">
    <p align="center">OTP Verification</p>
    <div class="inp">
    <input placeholder="" type="text" class="input" maxlength="6" name="cd">
    </div>
    <p align="center">
    <?php
        if(isset($_REQUEST['cd_unm_err']))
        {
            echo $_REQUEST['cd_unm_err'];
        }
    ?>
    <button>Verify</button>
    <svg class="svg" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
    <path fill="#4073ff" d="M56.8,-23.9C61.7,-3.2,45.7,18.8,26.5,31.7C7.2,44.6,-15.2,48.2,-35.5,36.5C-55.8,24.7,-73.9,-2.6,-67.6,-25.2C-61.3,-47.7,-30.6,-65.6,-2.4,-64.8C25.9,-64.1,51.8,-44.7,56.8,-23.9Z" transform="translate(100 100)" class="path"></path>
  </svg>
  </div>
</body>
</html>