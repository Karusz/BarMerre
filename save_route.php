<?php
// Include the database connection configuration
require "config.php";


// Get the POST data
$data = json_decode(file_get_contents("php://input"), true);

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO routes (user_id, origin, destination, waypoints) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $user_id, $origin, $destination, $waypoints);

// Set parameters and execute
$user_id = 1;
$origin = json_encode($data['origin']);
$destination = json_encode($data['destination']);
$waypoints = json_encode($data['waypoints']);
$stmt->execute();

// Get the last inserted route_id
$route_id = $conn->insert_id;

$stmt->close();
$conn->close();

// Return the route_id to the client
echo $route_id;
?>