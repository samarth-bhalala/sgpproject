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
            
            include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
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
    
    <div class="btn-container">
        <!-- Add Exercise Button -->
        <button class="action-btn" onclick="location.href='addexcercise.php';">Add Exercise</button>

        

        <!-- Dropdown Menu for Body Pain -->
        <div class="dropdown">
            <button class="dropdown-btn" id="menuBtn">Menu</button>
            <div class="dropdown-content" id="bodyPainContent">
            <?php 
                 
                 $query="SELECT DISTINCT category FROM exercises";
                 $result = mysqli_query($con, $query);
         
                 $categories = array();
                 while ($row = mysqli_fetch_assoc($result)) {
                 $categories[] = $row['category'];
                 ?><a href="#" name="categoryselect" id="categoryselect" ><?php echo $row["category"];?><a><?php
                 } ?>
                <div class="sub-dropdown" id="subDropdown">
                   <?php 
              if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['category'])) {
                    $category = $_POST['category'];
                    $query = "SELECT DISTINCT subCategory FROM exercises WHERE category = '$category'";
                    $result = mysqli_query($con, $query);
                    $subCategories = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $subCategories[] = $row['subCategory'];
                    }
                    echo implode(',', $subCategories);
                    exit;
                }
            }
                                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</main>

<script>
const categoryLinks = document.querySelectorAll('#bodyPainContent a');
const subDropdown = document.getElementById("subDropdown");

categoryLinks.forEach(link => {
    link.addEventListener("click", function(event) {
        event.preventDefault();
        const selectedCategory = link.textContent;
        fetchSubCategories(selectedCategory);
    });
});

function fetchSubCategories(category) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            const response = xhr.responseText;
            const subCategories = response.split(',');
            populateSubDropdown(subCategories);
        }
    };
    xhr.send('category=' + category);
}

function populateSubDropdown(subCategories) {
    const subDropdownHtml = '';
    subCategories.forEach(subCategory => {
        subDropdownHtml += '<a href="#">' + subCategory + '</a>';
    });
    subDropdown.innerHTML = subDropdownHtml;
    subDropdown.style.display = 'block';
}
</script>

</body>
</html>