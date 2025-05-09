<?php
include('../includes/db.php');
header('Content-Type: application/json');

$source = $_POST['source'] ?? '';
$destination = $_POST['destination'] ?? '';
$date = $_POST['date'] ?? '';

if (empty($source) || empty($destination) || empty($date)) {
    echo json_encode([]);
    exit;
}

$stmt = $conn->prepare("SELECT id, bus_id, source, destination, departure_time, arrival_time, status FROM routes WHERE source = ? AND destination = ? AND date = ?");
$stmt->bind_param("sss", $source, $destination, $date);
$stmt->execute();
$result = $stmt->get_result();

$routes = [];
while ($row = $result->fetch_assoc()) {
    $routes[] = $row;
}
echo json_encode($routes);
?>