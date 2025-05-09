<?php
include('../includes/db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM staff_schedule WHERE id = $id");
}
header("Location: ../dashboard_admin.php");
exit();
?>
