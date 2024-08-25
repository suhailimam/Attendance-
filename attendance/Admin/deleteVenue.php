<?php
include '../Includes/dbcon.php';
include '../Includes/session.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Prepare and execute the delete query
    $stmt = $conn->prepare("DELETE FROM tblvenue WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $message = "Record deleted successfully";
    } else {
        $message = "Error deleting record: " . $conn->error;
    }

    $stmt->close();
} else {
    $message = "Invalid request";
}

$conn->close();

// Redirect back to the main page with the message
header("Location: createVenue.php?message=" . urlencode($message));
exit();
?>
