   <?php
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

   ?>
   <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap">
        <style>
            /* Global Styles */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Abril Fatface', cursive;
                line-height: 1.6;
                overflow-x: hidden;
                margin: 0;
                background: #a0d6eb; /* Sky blue background */
            }

            main {
                margin-top: 100px;
                padding: 20px;
                background: transparent;
            }

            /* Header Styles */
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

            /* Buttons and Dropdown Styles */
            .btn-container {
                display: flex;
                justify-content: flex-start;
                margin-top: 50px;
            }

            .action-btn {
                padding: 10px 20px;
                font-size: 20px;
                background-color: #032B44;
                color: white;
                border: none;
                border-radius: 10px;
                cursor: pointer;
                transition: 0.3s ease;
                margin-right: 10px;
            }

            .action-btn:hover {
                background-color: #4682B4;
                transform: scale(1.05);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            }
            .action-btn {
        padding: 10px 20px;
        font-size: 20px;
        background-color: #032B44;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s ease;
        margin-right: 10px;
        display: inline-block; /* Add this line to make the buttons visible */
    }
            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-btn {
                background-color: #032B44;
                color: white;
                padding: 10px 20px;
                font-size: 20px;
                border: none;
                border-radius: 10px;
                cursor: pointer;
                transition: 0.3s ease;
            }

            .dropdown-btn:hover {
                background-color: #4682B4;
                transform: scale(1.05);
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #fff;
                min-width: 160px;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                z-index: 1;
                border-radius: 10px;
            }

            .dropdown-content a {
                color: #032B44;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                border-radius: 10px;
            }

            .dropdown-content a:hover {
                background-color: #4682B4;
                color: white;
            }

            /* Sub-dropdown (initially hidden) */
    .sub-dropdown {
                display: none;
                padding-left: 20px;
            }

            .dropdown:hover .dropdown-content {
                display: block;
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

                .btn-container {
                    flex-direction: column;
                }

                .action-btn {
                    margin-bottom: 10px;
                }
            }
            /* Responsive Design */

    /* For desktops and laptops */
    @media (min-width: 1200px) {
        .btn-container {
            flex-direction: row;
        }
        .action-btn {
            margin-right: 10px;
        }
    }

    /* For tablets and small laptops */
    @media (min-width: 768px) and (max-width: 1199px) {
        .btn-container {
            flex-direction: row;
        }
        .action-btn {
            margin-right: 10px;
        }
    }

    /* For mobile devices */
    @media (max-width: 767px) {
        .btn-container {
            flex-direction: column;
        }
        .action-btn {
            margin-bottom: 10px;
        }
    }

    /* For extra small mobile devices */
    @media (max-width: 479px) {
        .btn-container {
            flex-direction: column;
        }
        .action-btn {
            margin-bottom: 10px;
        }
    }
    /* Responsive Dropdown Menu */

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #fff;
        min-width: 160px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 10px;
    }

    .dropdown-content a {
        color: #032B44;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        border-radius: 10px;
    }

    .dropdown-content a:hover {
        background-color: #4682B4;
        color: white;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* For mobile devices */
    @media (max-width: 767px) {
        .dropdown-content {
            position: relative;
            display: block;
            background-color: transparent;
            box-shadow: none;
            border-radius: 0;
        }
        .dropdown-content a {
            padding: 10px 20px;
        }
    }
    /* Responsive Main Content Area */

    main {
        margin-top: 100px;
        padding: 20px;
        background: transparent;
    }

    /* For mobile devices */
    @media (max-width: 767px) {
        main {
            margin-top: 50px;
            padding: 10px;
        }
    }
    /* Responsive Header Area */

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

    /* For mobile devices */
    @media (max-width: 767px) {
        header {
            position: relative;
        }
        nav {
            flex-direction: column;
            align-items: flex-start;
        }
        .logo img {
            max-height: 40px;
        }
        .name h1 {
            font-size: 20px;
        }
    }
    /* Responsive Footer Area */

    footer {
        background: rgba(255, 248, 241, 0.4);
        color: #333;
        padding: 10px 20px;
        text-align: center;
        clear: both;
    }

    /* For mobile devices */
    @media (max-width: 767px) {
        footer {
            padding: 10px;
        }
    }


    .btn-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        margin-top: 50px;
        max-width: 800px; /* set a maximum width */
    }

    .action-btn {
        padding: 10px 20px;
        font-size: 20px;
        background-color: #032B44;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s ease;
        margin-right: 10px;
        margin-bottom: 10px; /* add margin bottom to separate rows */
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
               <li><a class="nav-link" href="dashboard.php">Home</a></li><?php
                
                
                include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
                if (isset($_SESSION['admin'])) {
                
                    echo '<li><a class="nav-link" href="logout.php">Logout</a></li>';
                } else {?>
                 <?php  echo '<script>window.location.href = "index.php";</script>';
                }
                ?>
            </ul>
        </nav>
    </header>

    <main>
    <?php         if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    echo "<p>$msg</p>"; // or do something else with the message
}?>
        <div class="btn-container">
    
            <!-- Add Exercise Button -->
            <button class="action-btn" onclick="location.href='addexcercise.php';">Add Exercise</button>

            <!-- Add Category Button -->
            <button class="action-btn" onclick="location.href='addcategory.php';">Add Category</button>

            <!-- Add Subcategory Button -->
            <button class="action-btn" onclick="location.href='addsubcategory.php';">Add Subcategory</button>

            <!-- Add Main Category Button -->
            <button class="action-btn" onclick="location.href='addmaincategory.php';">Add Main Category</button>
            

    <!-- Delete Category Button -->
            <button class="action-btn" onclick="location.href='deletecategory.php';">Delete Category</button>

    <!-- Delete Subcategory Button -->
            <button class="action-btn" onclick="location.href='deletesubcategory.php';">Delete Subcategory</button>

    <!-- Delete Main Category Button -->
            <button class="action-btn" onclick="location.href='deletemaincategory.php';">Delete Main Category</button>


            <!-- View All exercise Button -->
            <button class="action-btn" onclick="location.href='viewall.php';">View All exercise</button>

            <!-- View exercise by Category Button -->
            <div class="dropdown">
                <button class="dropdown-btn">View exercise by Category</button>
                <div class="dropdown-content">
                    <?php 
                    $query="SELECT DISTINCT category FROM exercise";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<a href="viewbycategory.php?category='.$row["category"].'">'.$row["category"].'</a>';
                    }
                    ?>
                </div>
            </div>

            <!-- View exercise by Subcategory Button -->
            <div class="dropdown">
                <button class="dropdown-btn">View exercise by Subcategory</button>
                <div class="dropdown-content">
                    <?php 
                    $query="SELECT DISTINCT subcategory FROM exercise";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<a href="viewbysubcategory.php?subcategory='.$row["subcategory"].'">'.$row["subcategory"].'</a>';
                    }
                    ?>
                </div>
            </div>  

            <!-- View exercise by Main Category Button -->
            <div class="dropdown">
                <button class="dropdown-btn">View exercise by Main Category</button>
                <div class="dropdown-content">
                    <?php 
                    $query="SELECT DISTINCT maincategory FROM exercise";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<a href="viewbymaincategory.php?maincategory='.$row["maincategory"].'">'.$row["maincategory"].'</a>';
                    }
                    ?>
                </div>
            </div>
<!-- View Contact Page Button -->
<button class="action-btn" onclick="location.href='viewcontact.php';">View Contact Page</button>

<!-- View User Page Button -->
<button class="action-btn" onclick="location.href='viewuser.php';">View User Page</button>
            
        </div>
    </main>

    </body>
    </html>