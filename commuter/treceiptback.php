<?php
include('../db/tdbconn.php');

$commuterID = 1;

// Start a transaction
$conn->begin_transaction();

try {
    // Update the booking status
    $updateSql = "UPDATE booking 
                  SET status = 'completed' 
                  WHERE commuterID = ? 
                  ORDER BY bookingDate DESC 
                  LIMIT 1";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("i", $commuterID);
    $stmt->execute();
    $stmt->close();

    // Retrieve the latest booking details
    $selectSql = "SELECT plateNumber, bookCompletion, pickupAddress, dropoffAddress, fare 
                  FROM booking 
                  WHERE commuterID = ? 
                  ORDER BY bookingDate DESC 
                  LIMIT 1";
    $stmt = $conn->prepare($selectSql);
    $stmt->bind_param("i", $commuterID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $plateNumber = $row['plateNumber'];
        $bookCompletion = $row['bookCompletion'];
        $formattedDate = date("j F Y, g:i A", strtotime($bookCompletion));
        $pickupAddress = $row['pickupAddress'];
        $dropoffAddress = $row['dropoffAddress'];
        $fare = $row['fare'];
    }

    $stmt->close();
    $conn->commit(); // Commit the transaction

} catch (Exception $e) {
    $conn->rollback(); // Rollback the transaction if an error occurs
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>
