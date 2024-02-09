<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commuter | Receipt</title>
    <link rel="icon" href="../img/logo3.png" type="image/png" />
    <link rel="stylesheet" href="../css/treceipt.css">
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
    include 'cnav.php';
    ?>
    <?php
    include 'receiptback.php';
    ?>
    <div class="mid">
        <div class="receipt">
            <h1>Your Receipt</h1>
            <div class="top">
                <p class="bookingLabel">BOOKING ID</p>
                <p class="bookingID">202402090755-AB1CDE</p>
            </div>
            <div class="dates">
                <p class="date">2024-02-09 07:55:32</p>
            </div>
            <div class="text">
                

                <p>Total Amount: ₱
                    <?php echo $fare; ?>
                </p>
            </div>




        </div>
    </div>



</body>

</html>