<?php
include '../Includes/dbcon.php';
include '../Includes/session.php';

if (isset($_GET['registrationNumber'])) {
    $registrationNumber = $_GET['registrationNumber'];

    // Prepare the SQL DELETE statement
    $query = "DELETE FROM tblstudents WHERE registrationNumber = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $registrationNumber);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Student with registration number {$registrationNumber} deleted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
} else {
    echo "No registration number provided.";
}

