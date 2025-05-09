<?php
session_start();
function checkRole($role) {
    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== $role) {
        header("Location: login_user.html");
        exit();
    }
}
?>
