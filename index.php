<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<style>
	
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
   
  }
  
  
  body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
  }
  
  
  header {
    background: #FFF8F1;
    color: #333;
    /* padding: px 0; */
    margin: 0px 0px 0px 0px;
  }
  
  nav {
    background: #FFF8F1;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
    color: #333;
    margin: 0px 0px 0px 0px;
  }
  
  .logo img {
    max-height: 100px;
    margin: 0px 0px 0px 0px;
  }
  
  .name h1 {
    margin: 0;
    font-size: 24px;
    color: #333;
  }
  
  ul {
    list-style: none;
    display: flex;
    color: #333;
    text-decoration: none;
  }
  
  ul li {
    margin-left: 20px;
    color: #333;
    text-decoration: none;
  }
  
  .nav-link {
    text-decoration: none;
    font-size: 16px;
    color: #333;
    padding: 10px 20px;
    border-radius: 10px;
    transition: background-color 0.3s ease;
  }
  
  .nav-link:hover {
    background-color: #ffcc00;
    color: #fff;
  }
  

  @media (max-width: 768px) {
    .name h1 {
      font-size: 20px;
    }
  
    ul {
      flex-direction: column;
      align-items: flex-start;
    }
  
    ul li {
      margin-left: 0;
      margin-bottom: 10px;
    }
  }
  

  @media (max-width: 480px) {
    .logo img {
      max-height: 100px;
      margin: 0px 0px 0px 0px;
    }
  
    .name h1 {
      font-size: 18px;
    }
  
    .nav-link {
      font-size: 14px;
    }
  }
  
		</style>
	<!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
	<header>
		<nav>
		<div class="logo">
			<img src="img/LOGO1.png" alt="Logo">
		</div>
		<div class="name">
			<h1>PHYSIOFIT</h1>
		</div>
		
			<ul>
				<li><a class="nav-link" href="index.php">Home</a></li>
				<li><a class="nav-link" href="aboutus.php">About Us</a></li>
				<li><a class="nav-link" href="contactus.php">Contact Us</a></li>
				
                <?php   
                session_start();
                if(isset($_SESSION['stat']))
                {?>
                    <li><a class="nav-link" href="profile.php">Profile</a></li><?php
                }
                else{?>
                    <li><a class="nav-link" href="loginsignup.php">Login/Sign Up</a></li>
                    <?php
                }
                ?>
				
			</ul>
		</nav>
	</header>
</body>
</html>