<?php
session_start();
include_once("../db/tdbconn.php");

$commuterid = 1;

if ($conn === false) {
    die("Database connection failed.");
}

$query = "SELECT plateNumber FROM booking WHERE commuterid = ? AND status = 'pending' ORDER BY bookingDate DESC LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $commuterid);
$stmt->execute();
$stmt->bind_result($plateNumber);

if ($stmt->fetch()) {
    if ($plateNumber !== null) {
        echo "notnull";
    }
} else {
    echo "No pending booking found for the user.";
}


$stmt->close();
$conn->close();
?>