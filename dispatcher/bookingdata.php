<?php
// Include the database connection file
include('../db/tdbconn.php');

// Query to select data from the "booking" table and join with the "commuters" table
$sql = "SELECT b.bookingID , b.toda, b.commuterID, c.firstname, b.passengerCount, b.fare, b.distance FROM booking b
        LEFT JOIN commuter c ON b.commuterID = c.commuterID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data from each row
    // while ($row = $result->fetch_assoc()) {
    //     echo "<div class='booking-info'>";
    //     echo "<p>Booking ID: " . $row["bookingID"] . "</p>";
    //     echo "<p>Commuter: " . $row["firstname"] . "</p>";
    //     echo "<p>Passenger Count: " . $row["passengerCount"] . "</p>";
    //     echo "<p>Fare: ₱" . $row["fare"] . "</p>";
    //     echo "<p>Distance: " . number_format($row["distance"], 3) . " km</p>";
    //     echo "<a href='preview.php?bookingid=" . $row["bookingID"] . "'>Accept</a>";
    //     echo "</div>";
    // }

    while ($row = $result->fetch_assoc()) {
        echo '<div class="history">';
echo '<div class="historyData">';
echo '<div class="locInfo">';
echo '<div class="bookingData">';
echo '<p class="bookingLabel">BOOKING ID</p>';
echo '<p class="bookingId">' . $row["bookingID"] . '</p>';
echo '<div class="date">';
echo '<p class="dateTime">02/21/2024, 8:36 PM</p>';
echo '</div>';
echo '</div>';
echo '<p class="pickUp"><i class="fa-solid fa-location-dot fa-xl" style="color: #03b14e;"></i> Baliuag Cemetery, Baliuag</p>';
echo '<div class="line"></div>';
echo '<p class="dropOff"><i class="fa-solid fa-location-dot fa-xl" style="color: #ff0000;"></i> Bagong Nayon, Baliuag</p>';
echo '<p class="distance">Distance: <span style="color: red;">' . $row["distance"] . '</span></p>';
echo '<div class="infoText">';
echo '<p class="driverName">' . $row["firstname"] . '</p>';
echo '<p class="plateNumber"><strong>₱ 150.00</strong></p>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

    }

} else {
    echo "No data found.";
}

// Close the database connection
$conn->close();
