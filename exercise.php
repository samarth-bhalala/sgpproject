    <?php
    session_start();
    include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

    $subcategory = $_GET['subcategory'];
    $subcategories = $con->query("SELECT * FROM exercise WHERE subcategory = '$subcategory'");

    function getYoutubeVideoID($url) {
        parse_str(parse_url($url, PHP_URL_QUERY), $query);
        return $query['v'] ?? ''; // Return the 'v' parameter from the YouTube URL
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Day 1 Exercises</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            /* Basic Styling */
            * {
                font-family: 'Abril Fatface', cursive;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                background-color: #87CEEB;
            }

            header {
                background: rgba(255, 255, 255, 0.5); /* 0.5 makes it semi-transparent */
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

            .card-container {
    margin-top: 100px;
    background-color: transparent; /* Remove any background */
    box-shadow: none; /* Remove shadow */
    border: none; /* Remove border if any */
}

            .exercise-row {
                display: flex;
                align-items: flex-start; /* Align items to the top */
                margin-bottom: 30px;
                padding: 10px;
                border-radius: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .exercise-card {
                border-radius: 20px;
                background-color: #fff;
                padding: 15px;
                margin-bottom: 20px;
                width: 100%;
            }

            .exercise-card img {
                border-radius: 20px;
                width: 100%;
                height: auto;
                margin-top: 20px; /* Added top margin */
                margin-bottom: 10px; /* Space between image and video */
            }

            .exercise-card-body {
                padding: 15px;
            }

            .exercise-card-body h5 {
                font-size: 22px;
                margin-bottom: 10px;
            }

            .exercise-card-body p {
                font-size: 16px;
            }

            .button-group {
                display: flex;
                gap: 10px;
                margin-top: 10px;
            }

            .timer-display {
                font-size: 18px;
                font-weight: bold;
                margin-top: 10px;
            }

            /* For image and video container */
            .media-container {
                flex: 1;
                padding-right: 15px;
                width: 800px;
                height: 500px:
            }

            /* Embed responsive styling */
            .embed-responsive {
                position: relative;
                display: block;
                width: 100%;
                padding-bottom: 56.25%; /* Aspect ratio 16:9 */
                border-radius: 10px;
                margin-top: 15px; /* Margin above video */
            }

            .embed-responsive iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body>

    <header>
        <nav>
            <div class="logo">
            <a href="index.php">
                <img src="img/LOGO_1.PNG" alt="PhysioFit Logo">
            </a>            </div>
            <div class="name">
                <h1>PhysioFit</h1>
            </div>
            <ul>
                <li><a class="nav-link" href="/sgpproject/sgpproject/index.php">Home</a></li>
                <li><a class="nav-link" href="/sgpproject/sgpproject/aboutus.php">About Us</a></li>
                <li><a class="nav-link" href="/sgpproject/sgpproject/contactus.php">Contact Us</a></li>
                <?php
                if (isset($_SESSION['stat'])) {
                    echo '<li><a class="nav-link" href="/sgpproject/sgpproject/profile.php">Profile</a></li>';
                    echo '<li><a class="nav-link" href="/sgpproject/sgpproject/logout.php">Logout</a></li>';
                } else {
                    echo '<li><a class="nav-link" href="/sgpproject/sgpproject/loginsignup.php">Login/Sign Up</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>

    <div class="container card-container">
        <?php
        $sql = "SELECT * FROM exercise WHERE subcategory='$subcategory'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="row exercise-row">
                    <!-- Media Container with Image and Video -->
                    <div class="media-container">
                        <img src="img/<?php echo $row['img']; ?>" class="img-fluid rounded" alt="<?php echo $row['exerciseName']; ?>">
                        <div class="embed-responsive">
                            <iframe src="https://www.youtube.com/embed/<?php echo getYoutubeVideoID($row['video']); ?>" allowfullscreen></iframe>
                        </div>
                    </div>
                    
                    <!-- Exercise Information -->
                    <div class="col-md-8">
                        <div class="card exercise-card">
                            <div class="card-body exercise-card-body">
                                <h5 class="card-title"><?php echo $row['exerciseName']; ?></h5>
                                <p class="card-text"><?php echo $row['exerciseDescription']; ?></p>
                                <div class="button-group">
                                    <button class="btn btn-primary start-btn" onclick="startTimer(this)">Start Exercise</button>
                                    <button class="btn btn-secondary stop-btn" onclick="stopTimer(this)" disabled>Stop Exercise</button>
                                </div>
                                <div class="timer-display">Time Elapsed: <span class="timer">00:00</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No exercises found.";
        }
        $con->close();
        ?>
    </div>

    <script>
        function startTimer(button) {
        let cardBody = button.closest('.exercise-card-body');
        let stopButton = cardBody.querySelector('.stop-btn');
        let timerDisplay = cardBody.querySelector('.timer');
        let countdownText = document.createElement('div'); // Create a countdown display
        countdownText.style.fontSize = '18px';
        countdownText.style.fontWeight = 'bold';
        countdownText.style.marginTop = '10px';
        countdownText.style.color = 'red';
        countdownText.textContent = 'Starting in 3...';
        cardBody.prepend(countdownText); // Show countdown above the timer

        let countdown = 3;

        // Disable buttons during countdown
        button.disabled = true;
        stopButton.disabled = true;

        let countdownInterval = setInterval(() => {
            countdown--;
            if (countdown > 0) {
                countdownText.textContent = `Starting in ${countdown}...`;
            } else {
                clearInterval(countdownInterval);
                countdownText.remove(); // Remove countdown text
                startActualTimer(button); // Start the actual timer
            }
        }, 1000);
    }

    function startActualTimer(button) {
        let cardBody = button.closest('.exercise-card-body');
        let stopButton = cardBody.querySelector('.stop-btn');
        let timerDisplay = cardBody.querySelector('.timer');
        let alarmSound = new Audio('/path/to/alarm.mp3'); // Replace with your alarm file path

        if (!cardBody.elapsedTime) {
            cardBody.elapsedTime = 1;
        }

        if (cardBody.elapsedTime >= 31000) {
            cardBody.elapsedTime = 1;
        }

        let startTime = Date.now() - cardBody.elapsedTime;

        clearInterval(cardBody.timerInterval);

        cardBody.timerInterval = setInterval(() => {
            cardBody.elapsedTime = Date.now() - startTime;

            if (cardBody.elapsedTime >= 31000) {
                stopTimer(stopButton);
                alarmSound.play(); // Play alarm when time is up
                return;
            }

            timerDisplay.textContent = formatTime(cardBody.elapsedTime);
        }, 1000);

        button.disabled = true;
        stopButton.disabled = false;
    }

    function stopTimer(button) {
        let cardBody = button.closest('.exercise-card-body');
        let startButton = cardBody.querySelector('.start-btn');
        clearInterval(cardBody.timerInterval);

        startButton.disabled = false;
        button.disabled = true;
    }

    function formatTime(milliseconds) {
        let totalSeconds = Math.floor(milliseconds / 1000);
        let minutes = Math.floor(totalSeconds / 60);
        let seconds = totalSeconds % 60;
        return `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    }
    </script>

    </body>
    </html>
