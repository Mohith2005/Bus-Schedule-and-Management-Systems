<?php
include('../includes/db.php');
$id = $_GET['id'] ?? '';

if ($id) {
    $stmt = $conn->prepare("DELETE FROM routes WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Route deleted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "Missing route ID.";
}
$conn->close();
?>