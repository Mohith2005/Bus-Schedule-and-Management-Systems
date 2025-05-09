<?php
include('../includes/db.php');

$bus_id = $_POST['bus_id'] ?? '';
$source = $_POST['source'] ?? '';
$destination = $_POST['destination'] ?? '';
$departure_time = $_POST['departure_time'] ?? '';
$arrival_time = $_POST['arrival_time'] ?? '';
$date = $_POST['date'] ?? '';
$status = $_POST['status'] ?? 'On Time';

if ($bus_id && $source && $destination && $departure_time && $arrival_time && $date) {
    $stmt = $conn->prepare("INSERT INTO routes (bus_id, source, destination, departure_time, arrival_time, date, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $bus_id, $source, $destination, $departure_time, $arrival_time, $date, $status);

    if ($stmt->execute()) {
        echo "Route added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "All fields are required.";
}
$conn->close();
?>