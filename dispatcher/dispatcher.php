<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatcher | Dashboard</title>
    <link rel="icon" href="../img/logo3.png" type="image/png" />
    <link rel="stylesheet" href="../css/disdispatcher.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <script src="https://kit.fontawesome.com/965a209c77.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    include 'disnav.php';
    ?>
    <div class="panel">
        <p class="location">
            <i class="fa-solid fa-location-dot fa-lg" style="color: #ffffff;"></i>
            SJDD TODA
        </p>
        <!-- <p class="welcome">Welcome Back</p> -->
    </div>

    <p class="reminder">Reminder: Take a quick break if needed! Keeping yourself well-rested and focused ensures smooth operations.</p>

    <div class="dashboard">
        <p class="categories">Services Categories</p>
    </div>

    <div class="buttons">
        <div class="book">
            <button class="booking" onclick="window.location.href='pending.php';">
                <i class="fa-solid fa-list fa-2xl" style="color: #03b14e;"></i>
            </button>
            <p class="booklabel">Pending</p>
        </div>

    </div>

    <div class="dashboard">
        <p class="categories">More</p>
    </div>

    <div class="buttons">

        <div class="scan">
            <button class="scanqr">
                <i class="fa-solid fa-clock-rotate-left fa-2xl" style="color: #03b14e;"></i>
            </button>
            <p class="scanlabel">History</p>
        </div>
    </div>

    <div class="footer">
        <p class="foot">© TriSakay 2023 - 2024</p>
    </div>
</body>
</html>
