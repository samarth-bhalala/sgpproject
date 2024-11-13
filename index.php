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
    <title>PhysioFit</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap">
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
    margin: 0;
    padding: 0;
}

header {
    background: rgba(255, 248, 241, 0.9); /* Increased opacity for less transparency */
    color: #333;
    padding: 0;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(10px);
}

/* ... (keep all other existing styles until the button styles) ... */

.button {
    --border-right: 6px;
    --text-stroke-color: white;
    --animation-color: #032B44;
    --fs-size: 5em;
    letter-spacing: 3px;
    text-decoration: none;
    font-size: var(--fs-size);
    font-family: 'Abril Fatface', cursive;
    position: relative;
    text-transform: uppercase;
    color: transparent; /* Changed from white to transparent */
    -webkit-text-stroke: 2px var(--text-stroke-color);
    margin: 0;
    padding: 20px;
    text-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    transition: all 0.3s ease;
    background: none;
    border: none;
    cursor: pointer;
    outline: none;
    display: inline-block; /* Added */
}

.actual-text {
    position: relative;
    display: block;
    color: transparent;
    -webkit-text-stroke: 2px var(--text-stroke-color);
}

.hover-text {
    position: absolute;
    top: 0;
    left: 0;
    box-sizing: border-box;
    content: attr(data-text);
    color: var(--animation-color);
    width: 0%;
    height: 100%;
    overflow: hidden;
    transition: 0.5s;
    -webkit-text-stroke: 2px var(--animation-color);
    white-space: nowrap; /* Added */
    display: flex; /* Added */
    align-items: center; /* Added */
}

.button:hover .hover-text {
    width: 100%;
    filter: drop-shadow(0 0 30px var(--animation-color));
    color: #032B44; /* Change text color to blue */
    transform: translateX(20px);
    
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
    margin: 0;
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
    font-family: 'Abril Fatface', cursive;
    letter-spacing: 0.5px;
    transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
}

.nav-link:hover {
    background-color: #032B44;
    color: #fff;
    transform: scale(1.1);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

main {
    margin-top: 100px;
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
    animation: slide 20s infinite;
}

.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(90%);
}

@keyframes slide {
    0%, 20% {
        transform: translateX(0);
    }
    25%, 45% {
        transform: translateX(-100%);
    }
    50%, 70% {
        transform: translateX(-200%);
    }
    75%, 95% {
        transform: translateX(-300%);
    }
    100% {
        transform: translateX(-400%);
    }
}

.category-section {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 0;
    background-size: cover;
    background-position: center;
    transition: transform 0.5s ease;
}

.category-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.3);
    transition: background 0.3s ease;
}

.category-section:hover::before {
    background: rgba(0, 0, 0, 0.4);
}

.category-content {
    position: relative;
    z-index: 2;
    text-align: center;
    transition: transform 0.3s ease;
}

.category-section:hover .category-content {
    transform: scale(1.05);
}

.button {
    --border-right: 5px;
    --text-stroke-color: rgba(255, 255, 255, 0.9);
    --animation-color: #032B44;
    --fs-size: 5em;
    letter-spacing: 3px;
    text-decoration: none;
    font-size: var(--fs-size);
    font-family: 'Abril Fatface', cursive;
    position: relative;
    text-transform: uppercase;
    color: white;
    -webkit-text-stroke: 2px var(--text-stroke-color);
    margin: 0;
    padding: 20px;
    text-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    transition: all 0.3s ease;
    background: none;
    border: none;
    cursor: pointer;
    outline: none;
}

.button:hover {
    transform: scale(1.1);
    text-shadow: 0 0 30px rgba(0, 0, 0, 0.7);
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
    transition: 0.5s;
    -webkit-text-stroke: 1px var(--animation-color);
}

.button:hover .hover-text {
    width: 100%;
    filter: drop-shadow(0 0 30px var(--animation-color));
}

@media (max-width: 768px) {
    .name h1 {
        font-size: 24px;
    }
    
    ul {
        flex-direction: column;
        align-items: flex-start;
    }
    
    ul li {
        margin: 5px 0;
    }
    
    .button {
        --fs-size: 3em;
    }
    
    .nav-link {
        font-size: 16px;
        padding: 8px 16px;
    }
    
    .logo img {
        max-height: 60px;
    }
}

@media (max-width: 480px) {
    .button {
        --fs-size: 2em;
    }
    
    .name h1 {
        font-size: 20px;
    }
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
                <div class="slide">
                    <img src="img/slide1.jpg" alt="Slide 1">
                </div>
                <div class="slide">
                    <img src="img/slide2.jpg" alt="Slide 2">
                </div>
                <div class="slide">
                    <img src="img/slide3.jpg" alt="Slide 3">
                </div>
                <div class="slide">
                    <img src="img/slide4.jpg" alt="Slide 4">
                </div>
                <div class="slide">
                    <img src="img/slide5.jpg" alt="Slide 5">
                </div>
            </div>

            <?php
            foreach ($maincategories as $maincategory) {
            ?>
            <div class="category-section" style="background-image: url('img/<?php echo $maincategory['img']; ?>')">
                <div class="category-content">
                    <a href="category.php?maincategory=<?php echo $maincategory['maincategory']; ?>">
                        <button class="button" data-text="<?php echo $maincategory['maincategory']; ?>">
                            <span class="actual-text">&nbsp;<?php echo $maincategory['maincategory']; ?>&nbsp;</span>
                            <span aria-hidden="true" class="hover-text">&nbsp;<?php echo $maincategory['maincategory']; ?>&nbsp;</span>
                        </button>
                    </a>
                </div>
            </div>
            <?php
            }
            ?>
        </section>
    </main>
</body>
</html>