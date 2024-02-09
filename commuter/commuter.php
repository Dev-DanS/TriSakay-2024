<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Commuter | Dashboard</title>
    <link rel="icon" href="../img/logo3.png" type="image/png" />
    <link rel="stylesheet" href="../css/cdashboard2.css" />
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
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Manage Account</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="panel">
        <p class="location">
            <i class="fa-solid fa-location-dot fa-lg" style="color: #ffffff;"></i>
            Baliuag, Bulacan
        </p>
        <!-- <p class="welcome">Welcome Back</p> -->
    </div>
    
    <?php
    // include('../db/tdbconn.php');
    // $commuterId = $_SESSION["commuterid"];

    // $query = "SELECT firstname FROM commuter WHERE commuterid = ?";
    // $stmt = mysqli_prepare($conn, $query);

    // if ($stmt) {
    //     mysqli_stmt_bind_param($stmt, "s", $commuterId);
    //     mysqli_stmt_execute($stmt);

    //     $result = mysqli_stmt_get_result($stmt);

    //     if ($result) {
    //         if (mysqli_num_rows($result) > 0) {
    //             $row = mysqli_fetch_assoc($result);
    //             $firstname = $row['firstname'];

    //             mysqli_stmt_close($stmt);
    //         } else {
    //             echo "<h1>User not found.</h1>";
    //         }
    //     } else {
    //         echo "<h1>Error querying the database.</h1>";
    //     }
    // } else {
    //     echo "<h1>Error preparing the statement.</h1>";
    // }
    ?>
    <h1>
        <?php 
        // echo $firstname; 
        ?>
    </h1>

    <div class="dashboard">
        <p class="categories">Services Categories</p>
    </div>

    <div class="buttons">
        <div class="book">
            <button class="booking" onclick="window.location.href='book.php';">
                <img src="../img/logo3.png" alt="tricycle" width="50" height="50">
            </button>
            <p class="booklabel">Book</p>
        </div>

        <div class="scan">
            <button class="scanqr">
                <i class="fa-solid fa-expand fa-2xl" style="color: #03b14e;"></i>
            </button>
            <p class="scanlabel">Scan QR</p>
        </div>
    </div>

    <div class="dashboard">
        <p class="categories">More</p>
    </div>

    <div class="buttons">
        <div class="book">
            <button class="booking">
                <i class="fa-solid fa-location-crosshairs fa-2xl" style="color: #03b14e;"></i>
            </button>
            <p class="booklabel">My Location</p>
        </div>

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