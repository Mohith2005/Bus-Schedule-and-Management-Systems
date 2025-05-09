<?php
include('../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = trim($_POST["email"]);
    $role = "user";

    if (!empty($username) && !empty($password) && !empty($email)) {
        $stmt = $conn->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $password, $email, $role);

        if ($stmt->execute()) {
            echo "Signup successful!";
        } else {
            echo "Signup failed: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "All fields are required.";
    }

    $conn->close();
}
?>
