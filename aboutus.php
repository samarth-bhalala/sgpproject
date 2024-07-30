
<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<div class="logo">
			<img src="img/logo.png" alt="Logo">
		</div>
		<div class="name">
			<h1>Physofit </h1>
		</div>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="aboutus.php">About Us</a></li>
				<li><a href="contactus.php">Contact Us</a></li>
				
                <?php   
                session_start();
                if(isset($_SESSION['stat']))
                {?>
                    <li><a href="profile.php">Profile</a></li><?php
                }
                else{?>
                    <li><a href="loginsignup.php">Login/Sign Up</a></li>
                    <?php
                }
                ?>
				
			</ul>
		</nav>
	</header>
</body>
</html>