<!-- <?php
        include('../php/session_commuter.php');
        ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commuter | Receipt</title>
    <link rel="icon" href="../img/logo3.png" type="image/png" />
    <link rel="stylesheet" href="../css/treceipt.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/965a209c77.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
</head>

<body>
    <?php
    include 'cnav.php';
    ?>

    <?php
    include 'receiptback.php';
    ?>

    <div class="container" id="receiptContainer">
        <div class="receipt">
            <div class="bookingInfo">
                <p class="bookingLabel">BOOKING ID</p>
                <p class="bookingID">202402090755-AB1CDE</p>
            </div>

            <div class="dateContainer">
                <p class="date">11 March 2024, 5:54 PM</p>
            </div>

            <hr>

            <div class="fareInfo">
                <p class="fareLabel">Fare</p>
                <p class="fare">₱ 150</p>
            </div>

            <hr>

            <div class="locInfo">
                <p class="pickUp"><i class="fa-solid fa-location-dot fa-xl" style="color: #03b14e;"></i> Baliuag
                    University, Baliuag</p>
                <div class="line"></div>
                <p class="dropOff"><i class="fa-solid fa-location-dot fa-xl" style="color: #ff0000;"></i> SM Baliuag,
                    Baliuag</p>
            </div>

            <div class="driverInfo">
                <p class="thank">Thank you!</p>
                <?php
                echo '<img src="../img/jaja.jpg" alt="" style="width:100px; height: 100px;">';
                ?>

                <p class="rate">Please rate my service</p>
                <p class="star">
                    <i class="fa-regular fa-star fa-lg" style="color: #03b14e;"></i>
                    <i class="fa-regular fa-star fa-lg" style="color: #03b14e;"></i>
                    <i class="fa-regular fa-star fa-lg" style="color: #03b14e;"></i>
                    <i class="fa-regular fa-star fa-lg" style="color: #03b14e;"></i>
                    <i class="fa-regular fa-star fa-lg" style="color: #03b14e;"></i>
                </p>
            </div>

            <div class="download">
                <p class="icon" id="downloadBtn"><i class="fa-solid fa-file-arrow-down fa-lg" style="color: #03b14e;"></i> Download</p>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('downloadBtn').addEventListener('click', function() {
            document.getElementById('downloadBtn').style.display = 'none';
            document.querySelector('.navbar').style.display = 'none';
            document.getElementById('receiptContainer').style.width = window.innerWidth + 'px';

            domtoimage.toBlob(document.getElementById('receiptContainer'))
                .then(function(blob) {
                    var link = document.createElement('a');
                    link.download = 'receipt.png';
                    link.href = URL.createObjectURL(blob);
                    link.click();
                    document.querySelector('.navbar').style.display = 'block';
                    document.getElementById('downloadBtn').style.display = 'block';
                    document.getElementById('receiptContainer').style.width = 'auto';
                });
        });
    </script>

</body>

</html>