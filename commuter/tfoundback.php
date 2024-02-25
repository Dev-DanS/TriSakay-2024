<?php
include('../db/tdbconn.php');
$commuterID = $_SESSION["commuterid"];

$conn->begin_transaction();

try {
    $selectSql = "SELECT plateNumber, driverLoc, fare, passengerCount
    FROM booking
    WHERE commuterID = '$commuterID'
    AND status = 'accepted'
    ORDER BY bookingDate DESC
    LIMIT 1";
    $stmt = $conn->prepare($selectSql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $plateNumber = $row['plateNumber'];
        $driverLoc = $row['driverLoc'];
        $fare = $row['fare'];
        $passengerCount = $row['passengerCount'];

        $selectCommuteSql = "SELECT firstName, lastName
                             FROM driver
                             WHERE plateNumber = ?";
        $stmtCommute = $conn->prepare($selectCommuteSql);
        $stmtCommute->bind_param("s", $plateNumber);
        $stmtCommute->execute();
        $resultCommute = $stmtCommute->get_result();

        if ($resultCommute->num_rows > 0) {
            $rowCommute = $resultCommute->fetch_assoc();
            $firstName = $rowCommute['firstName'];
            $lastName = $rowCommute['lastName'];
        }

        $stmtCommute->close();

        // Select the average rating
        $selectRatingSql = "SELECT ROUND(AVG(rating), 1) AS averageRating
                    FROM booking
                    WHERE plateNumber = ?
                    AND status = 'completed'";
        $stmtRating = $conn->prepare($selectRatingSql);
        $stmtRating->bind_param("s", $plateNumber);
        $stmtRating->execute();
        $resultRating = $stmtRating->get_result();

        if ($resultRating->num_rows > 0) {
            $rowRating = $resultRating->fetch_assoc();
            $averageRating = $rowRating['averageRating'];
        }

        $stmtRating->close();
    }

    $stmt->close();
    $conn->commit();
} catch (Exception $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

$conn->close();
