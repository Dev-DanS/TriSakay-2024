<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatcher | Pending</title>
    <link rel="icon" href="../img/logo3.png" type="image/png" />
    <link rel="stylesheet" href="../css/tdispending.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <script src="https://kit.fontawesome.com/965a209c77.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd">
        <div class="container-fluid">
            <a class="navbar-brand" href="dispatcher.php">
                <img src="../img/Logo2.png" alt="Bootstrap" height="50" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                style="background-color: #e3f2fd">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarNav">
                <ul class="navbar-nav nav-underline ms-auto me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dispatcher.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Ernesto
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Manage Account</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="../php/logout.php" style="color: red;">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- <div class="history">
        <div class="historyData">
            <div class="locInfo">
                <div class="bookingData">
                    <p class="bookingLabel">BOOKING ID</p>
                    <p class="bookingId">202402090755-AB1CDE</p>
                    <div class="date">
                        <p class="dateTime">02/21/2024, 8:36 PM</p>
                    </div>
                </div>
                <p class="pickUp"><i class="fa-solid fa-location-dot fa-xl" style="color: #03b14e;"></i>
                    Baliuag Cemetery, Baliuag</p>
                <div class="line"></div>
                <p class="dropOff"><i class="fa-solid fa-location-dot fa-xl" style="color: #ff0000;"></i>
                    Bagong Nayon, Baliuag</p>
                <p class="distance">
                    Distance: <span style="color: red;">5.4 KM</span>
                </p>
                <div class="infoText">
                    <p class="driverName">Jhaziel M. Saguid
                    </p>
                    <p class="plateNumber"><strong>₱ 150.00</strong></p>
                </div>
            </div>
        </div>
    </div> -->

    <?php include('bookingdata.php'); ?>
</body>

</html>