<?php
include('../includes/db.php');

$result = $conn->query("SELECT * FROM routes ORDER BY id DESC");
$routes = [];

while ($row = $result->fetch_assoc()) {
    $routes[] = $row;
}

header('Content-Type: application/json');
echo json_encode($routes);

$conn->close();
?>
