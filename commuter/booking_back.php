<?php
include '../db/tdbconn.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nearestTODA = $_POST['nearestTODA'];
    $pickupPoints = $_POST['pickupPoints'];
    $dropoffPoints = $_POST['dropoffPoints'];
    $grandTotal = $_POST['grandTotal'];
    $passengerCount = $_POST['passengerCount'];
    $durationMinutes = $_POST['durationMinutes'];
    $distance = $_POST['distance'];
    $pickupAddress = $_POST['pickupAddress'];
    $dropoffAddress = $_POST['dropoffAddress'];

    session_start();
    $commuterid = 1;

    date_default_timezone_set('Asia/Manila');
    $manilaDateTime = date('Y-m-d H:i:s');

    $sql = "INSERT INTO booking (toda, pickuppoint, dropoffpoint, status, fare, passengerCount, eta, bookingDate, commuterID, distance, pickupAddress, dropoffAddress) 
            VALUES (?, ?, ?, 'pending', ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssssssdss", $nearestTODA, $pickupPoints, $dropoffPoints, $grandTotal, $passengerCount, $durationMinutes, $manilaDateTime, $commuterid, $distance, $pickupAddress, $dropoffAddress);

        if (mysqli_stmt_execute($stmt)) {
            echo "success";
            exit();
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method";
}
?>
