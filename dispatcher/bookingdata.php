<?php
// Include the database connection file
include('../db/tdbconn.php');

// Query to select data from the "booking" table and join with the "commuters" table
$sql = "SELECT b.bookingID , b.toda, b.commuterID, c.firstname, b.passengerCount, b.fare, b.distance FROM booking b
        LEFT JOIN commuter c ON b.commuterID = c.commuterID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data from each row
    while ($row = $result->fetch_assoc()) {
        echo "<div class='booking-info'>";
        echo "<p>Booking ID: " . $row["bookingID"] . "</p>";
        echo "<p>Commuter: " . $row["firstname"] . "</p>";
        echo "<p>Passenger Count: " . $row["passengerCount"] . "</p>";
        echo "<p>Fare: ₱" . $row["fare"] . "</p>";
        echo "<p>Distance: " . number_format($row["distance"], 3) . " km</p>";
        echo "<a href='preview.php?bookingid=" . $row["bookingID"] . "'>Accept</a>";
        echo "</div>";
    }
} else {
    echo "No data found.";
}

// Close the database connection
$conn->close();
?>