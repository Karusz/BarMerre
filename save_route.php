<?php
// Include the database connection configuration
require "config.php";

// Check if user is logged in
session_start();
if (!isset($_SESSION['id'])) {
    die("User not logged in.");
}

// Debug: Print received data
var_dump($_POST);

// Get the POST data
$data = json_decode(file_get_contents("php://input"), true);

// Debug: Print decoded data
var_dump($data);

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO routes (user_id, origin, destination, waypoints) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $user_id, $origin, $destination, $waypoints);

// Set parameters and execute
$user_id = $_SESSION['id'];
$origin = json_encode($data['origin']);
$destination = json_encode($data['destination']);
$waypoints = json_encode($data['waypoints']);

// Execute the prepared statement
if ($stmt->execute()) {
    // Debug: Print the last inserted ID
    $route_id = $conn->insert_id;
    echo "Route ID: " . $route_id;
} else {
    // Error handling: Print error message
    echo "Error: " . $conn->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
