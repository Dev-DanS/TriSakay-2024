<?php
include('../db/tdbconn.php');
session_start();
$commuterID = $_SESSION["commuterid"];

// Set the PHP timezone to Philippines
date_default_timezone_set('Asia/Manila');

// Get the current date and time in the Philippines
$currentDateTime = date('Y-m-d H:i:s');

// Update the booking status
$sql = "UPDATE booking
        SET status = 'ongoing', bookCompletion = '$currentDateTime'
        WHERE commuterID = '$commuterID'
        AND status = 'accepted'
        ORDER BY bookingDate DESC
        LIMIT 1";

if ($conn->query($sql) === TRUE) {
    // Redirect to hello.html
    header('Location: tongoing.php');
    exit;
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
