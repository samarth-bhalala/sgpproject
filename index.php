<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

// Prepare the SQL query
$stmt = $con->prepare("SELECT * FROM maincategory");
$stmt->execute();
$maincategories = $stmt->get_result();

?>
<html>
<head>
    <title>index</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap"> <!-- Link to Abril Fatface Font -->
    <style>
  * {
    font-family: 'Abril Fatface', cursive;
  margin: 2px 1px 4px 1px;
  padding: 0;
  box-sizing: border-box;
}


body {
  font-family: 'Abril Fatface', cursive;
  line-height: 1.6;
  overflow-x: hidden;
}

header {
  background: rgba(255, 248, 241, 0.4);
  color: #333;
  padding: 0;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 10;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
  color: #333;
}

.logo img {
  max-height: 80px;
}

.name h1 {
  font-family: 'Abril Fatface', cursive;
  font-size: 45px;
  color: #333;
}

ul {
  list-style: none;
  display: flex;
  padding: 0;
  margin: 0;
}

ul li {
  margin-left: 20px;
}

.nav-link {
        
        text-decoration: none;
        font-size: 20px;
        color: #333;
        padding: 10px 20px;
        border-radius: 10px;
        font-family: 'Abril Fatface', cursive; /* Apply Abril Fatface font */
        letter-spacing: 0.5px; /* Add space between letters */
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
    }

    .nav-link:hover {
        background-color: #032B44;
        color: #fff;
        transform: scale(1.1);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    /* #03045E pink colour */
main {
  margin-top: -0.1px;
  padding-bottom: 0px;
}

.slideshow-container {
  position: relative;
  width: 100%;
  height: 100vh;
  overflow: hidden;
  z-index: 5;
  white-space: nowrap; 
}

.slide {
  display: inline-block;
  width: 100%;
  height: 100%;
  position: relative;
  top: 0;
  left: 0;
  animation: slide 10s infinite; 
}

.slide img {
  width: 100%;
  height: 100%;
  object-fit:fill ;
  filter: brightness(100%);
 
}

@keyframes slide {
  0% {
    transform: translateX(0);
  }
  20% {
    transform: translateX(0);
  }
  30% {
    transform: translateX(-100%);
  }
  50% {
    transform: translateX(-100%);
  }
  60% {
    transform: translateX(-200%);
  }
  80% {
    transform: translateX(-200%);
  }
  90% {
    transform: translateX(-300%);
  }
  100% {
    transform: translateX(-300%);
  }
}
/* .slide.active {
  display: block;
} */

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
    max-height: 60px;
  }
  .nav-link {
    font-size: 20px;
  }
}
.bg_2 {
    width: 100%;
    height: 100vh;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    margin-bottom: 20px 20px 20px 20px;
    display: flex; 
    justify-content: center;
    align-items: center;
    
}

.bg_2 {
    width: 100%;
    height: 100vh;
   
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    margin-bottom: 20px 20px 20px 20px;
    display: flex; 
    justify-content: center;
    align-items: center;
    
}

.bg_3 {
    width: 100%;
    height: 100vh;
    
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    margin-bottom: 20px 20px 20px 20px;
    display: flex; 
    justify-content: center;
    align-items: center;
}

.bg_4 {
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
        url('<?php echo $maincategory['img']; ?>');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    margin-bottom: 20px 20px 20px 20px;
    display: flex; 
    justify-content: center;
    align-items: center;
}
.button {
  margin: 0;
  height: auto;
  background: none;
  padding: 0;
  border: none;
  cursor: pointer;
  justify-content:center ;
  align-items: center;
  text-align: center;
  position: relative;
  text-transform: uppercase;
  color: #032B44; 
  -webkit-text-stroke: 1px #fff; 
}

.button:hover {
  -webkit-text-stroke: 2px #fff; 
}


.button {
  --border-right:5px;
  --text-stroke-color: rgba(0, 0, ,0.6);
  --animation-color:#032B44;
  --fs-size: 5em;
  letter-spacing: 3px;
  text-decoration: none;
  font-size: var(--fs-size);
  font-family: 'Abril Fatface', cursive;
  position: relative;
  text-transform: uppercase;
  color: white;
  -webkit-text-stroke: 1px var(--text-stroke-color);
  margin: 100px 0 20px 00px; 
}

.hover-text {
  position: absolute;
  box-sizing: border-box;
  content: attr(data-text);
  color: var(--animation-color);
  width: 0%;
  inset: 0;
  border-right: var(--border-right) solid var(--animation-color);
  overflow: hidden;
  transition: 1s;
  -webkit-text-stroke: 1px var(--animation-color);
}

.button:hover .hover-text {
  width: 100%;
  filter: drop-shadow(0 0 23px var(--animation-color));
 
}
</style>
</head>



<body>
    <header>
        <nav>
            <div class="logo">
                <img src="img/LOGO_1.PNG" alt="Logo">
            </div>
            <div class="name">
                <h1>PhysioFit</h1>
            </div>
            <ul>
                <li><a class="nav-link" href="index.php">Home</a></li>
                <li><a class="nav-link" href="aboutus.php">About Us</a></li>
                <li><a class="nav-link" href="contactus.php">Contact Us</a></li>
                <?php
                if (isset($_SESSION['stat'])) {
                    echo '<li><a class="nav-link" href="profile.php">Profile</a></li>';
                    echo '<li><a class="nav-link" href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a class="nav-link" href="loginsignup.php">Login/Sign Up</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home">
            <div class="slideshow-container">
            <div class="slide active">
                 <img src="img/slide1.jpg" alt="Slide 1">
            </div>
            <div class="slide">
                <img src="img/slide2.jpg" alt="Slide 2">
            </div>
            <div class="slide">
                <img src="img/slide3.jpg" alt="Slide 3">
            </div>
            <div class=" slide">
                <img src="img/slide4.jpg" alt="Slide 4">
            </div>
            <div class="slide">
                <img src="img/slide5.jpg" alt="Slide 5">
            </div>

          </div>
          <?php
foreach ($maincategories as $maincategory) {
    ?>
    <div class="bg_2 ?>" style="background-image: url('img/<?php echo $maincategory['img']; ?>'" >
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <center>
            <a href="category.php?maincategory=<?php echo $maincategory['maincategory']; ?>">
                <button class="button" data-text="<?php echo $maincategory['maincategory']; ?>">
                    <span class="actual-text">&nbsp;<?php echo $maincategory['maincategory']; ?>&nbsp;</span>
                    <span aria-hidden="true" class="hover-text">&nbsp;<?php echo $maincategory['maincategory']; ?>&nbsp;</span>
                </button>
            </a>
        </center>
    </div>
    <?php
}
?>
        </section>
    </main>
</body>
</html>