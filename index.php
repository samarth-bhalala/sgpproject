
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
    background: #333;
    color: #fff;
    padding: 10px 0;
  }
  
  nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
  }
  
  .logo img {
    max-height: 50px;
  }
  
  .name h1 {
    margin: 0;
    font-size: 24px;
  }
  
  ul {
    list-style: none;
    display: flex;
  }
  
  ul li {
    margin-left: 20px;
  }
  
  ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
  }
  
  ul li a:hover {
    text-decoration: underline;
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
      max-height: 40px;
    }
  
    .name h1 {
      font-size: 18px;
    }
  
    ul li a {
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
			<img src="img/LOGO.png" alt="Logo">
		</div>
		<div class="name">
			<h1>PHYSIOFIT</h1>
		</div>
		
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