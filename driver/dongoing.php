<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver | En route</title>
    <link rel="icon" href="../img/logo3.png" type="image/png" />
    <link rel="stylesheet" href="../css/dongoing.css" />
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
    <?php
    include 'dnav.php';
    ?>
    <div id="map" style="width: 100%; height: 60vh"></div>
    <h5 id="coordinates">Latitude: N/A, Longitude: N/A</h5>
    <div class="address">
        <h5>Locating your current address...</h5>
    </div>
    <h5 id="nearest-toda">Nearest TODA: Loading...</h5>
    <h5>Your IP address is: <span id="ip-address"></span></h5>
    <?php
    require '../db/tdbconn.php';

    $todaQuery = "SELECT Toda, Coordinates FROM todaterminal";
    $todaResult = mysqli_query($conn, $todaQuery);

    $todaLocations = [];

    while ($tl = mysqli_fetch_assoc($todaResult)) {
        $todaLocations[] = [
            'Toda' => $tl['Toda'],
            'Coordinates' => json_decode($tl['Coordinates'], true)
        ];
    }

    $todalocationData = json_encode($todaLocations);
    ?>
    
    
    <script src="../js/ip.js"></script>
    <script>
        var map = L.map("map", {
            zoomControl: false,
            doubleClickZoom: false,
        }).setView([0, 0], 15);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution:
                '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);

        var pickupPoint;

        function updatePickupPoint(lat, lng, accuracy) {
            var signalStrength = accuracy;
            var signalStrengthCategory, textColor;

            if (signalStrength <= 40) {
                signalStrengthCategory = "Good";
                textColor = "green";
            } else if (signalStrength <= 80) {
                signalStrengthCategory = "Fair";
                textColor = "yellow";
            } else {
                signalStrengthCategory = "Bad";
                textColor = "red";
            }

            var coordinatesElement = document.getElementById("coordinates");
            coordinatesElement.textContent = `Latitude: ${lat}, Longitude: ${lng}`;

            if (pickupPoint) {
                pickupPoint.setLatLng([lat, lng]);
                pickupPoint
                    .getPopup()
                    .setContent(
                        `Signal Strength: <span style="color: ${textColor};">${signalStrengthCategory}</span><br>You are here!`
                    );
            } else {
                pickupPoint = L.marker([lat, lng]).addTo(map);
                pickupPoint
                    .bindPopup(
                        `Signal Strength: <span style="color: ${textColor};">${signalStrengthCategory}</span><br>You are here!`
                    )
                    .openPopup();
            }

            map.setView([lat, lng], 15);
        }

        function updateLocation(position) {
            var { latitude, longitude, accuracy } = position.coords;
            updatePickupPoint(latitude, longitude, accuracy);

            // Save to database
            $.ajax({
                url: 'found1_back.php', // Update with the correct path to your PHP script
                type: 'POST',
                data: {
                    latitude: latitude,
                    longitude: longitude
                },
                success: function (response) {
                    var resp = JSON.parse(response);
                    if (resp.status === 'success') {
                        console.log('Coordinates saved to database.');
                    } else {
                        console.error('Failed to save coordinates:', resp.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX error:', error);
                }
            });

            $.ajax({
                url: "https://nominatim.openstreetmap.org/reverse",
                method: "GET",
                dataType: "json",
                data: {
                    format: "json",
                    lat: latitude,
                    lon: longitude,
                    zoom: 18,
                },
                success: function (data) {
                    var address = data.display_name.split(",").slice(0, -3).join(",");
                    $(".address h5").text(address);
                },
                error: function (error) {
                    console.error("Error getting address: " + error.statusText);
                },
            });
        }

        function handleError(error) {
            console.error("Error:", error.message);
        }

        var options = {
            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 0,
        };

        var watchId = navigator.geolocation.watchPosition(
            updateLocation,
            handleError,
            options
        );


    </script>
</body>
</html>