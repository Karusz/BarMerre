<?php
// Include the database connection configuration
require "config.php";

// Get latitude and longitude from POST data
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Insert marker position into database
$sql = "INSERT INTO test (latitude, longitude) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("dd", $latitude, $longitude);

if ($stmt->execute()) {
    echo "Marker position saved successfully";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>