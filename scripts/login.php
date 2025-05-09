<?php
include('../includes/db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    // Validate input
    if (empty($username) || empty($password)) {
        echo "Please fill in both fields.";
        exit();
    }

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $hashed_password, $role);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            // Redirect based on role
            if ($role === 'admin') {
                header("Location: ../dashboard_admin.php");
            } else {
                header("Location: ../dashboard_user.php");
            }
            exit();
        } else {
            echo "❌ Incorrect password.";
            exit();
        }
    } else {
        echo "❌ Username not found.";
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
