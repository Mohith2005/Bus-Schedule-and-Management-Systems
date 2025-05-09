<?php
include('../includes/db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO staff_schedule (staff_id, name, role, location, shift_start, shift_end, status, schedule_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $_POST['staff_id'], $_POST['name'], $_POST['role'], $_POST['location'], $_POST['shift_start'], $_POST['shift_end'], $_POST['status'], $_POST['schedule_date']);
    $stmt->execute();
    header("Location: ../dashboard_admin.php");
    $stmt->close();
}
$conn->close();
?>
