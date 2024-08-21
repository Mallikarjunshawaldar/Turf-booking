<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admintf";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare a delete statement
    $stmt = $conn->prepare("DELETE FROM game WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Deletion successful
        echo json_encode(array("success" => true));
    } else {
        // Deletion failed
        echo json_encode(array("success" => false, "error" => "Failed to delete row"));
    }

    // Close the statement
    $stmt->close();
} else {
    // ID parameter not set
    echo json_encode(array("success" => false, "error" => "ID parameter is missing"));
}

// Close database connection
$conn->close();
?>
