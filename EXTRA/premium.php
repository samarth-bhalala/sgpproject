<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap">
    <style>
    * {
        font-family: 'Abril Fatface', cursive;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Abril Fatface', cursive;
        line-height: 1.6;
        overflow-x: hidden;
        margin: 0;
        background-color: #87CEEB; /* Blue sea background color */
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
        margin-top: 150px;
        padding-bottom: 50px;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 100px;
        flex-wrap: wrap;
        gap: 2rem;
        padding: 2rem;
    }

    .card {
        background-color: #fff;
        border-radius: 10px;
        padding: 2rem;
        text-align: center;
        width: 300px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card h2 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .card p {
        font-size: 1rem;
        margin-bottom: 1rem;
    }

    .card .price {
        font-size: 2rem;
        font-weight: normal;
        margin-bottom: 1rem;
    }

    .card .btn {
        background-color: #032B44;
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    
    .card .btn:hover {
        background-color: #4682B4;
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .card {
            width: 100%;
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
        <div class="container">
            <div class="card">
                <h2>Start</h2>
                <p class="price">Free</p>
                <ul>
                    <li>1 User</li>
                    <li>1 Project</li>
                </ul>
                <button class="btn">Buy Now</button>
            </div>
            <div class="card">
                <h2>Basic</h2>
                <p class="price">$19.99</p>
                <ul>
                    <li>20 Users</li>
                    <li>20 Projects</li>
                </ul>
                <button class="btn">Buy Now</button>
            </div>
            <div class="card">
                <h2>Medium</h2>
                <p class="price">$49.99</p>
                <ul>
                    <li>100 Users</li>
                    <li>100 Projects</li>
                </ul>
                <button class="btn">Buy Now</button>
            </div>
            <div class="card">
                <h2>Expert</h2>
                <p class="price">$129.99</p>
                <ul>
                    <li>Unlimited Users</li>
                    <li>Unlimited Projects</li>
                </ul>
                <button class="btn">Buy Now</button>
            </div>
        </div>
    </main>
</body>
</html>
