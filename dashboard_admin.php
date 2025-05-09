<?php include('includes/auth.php'); checkRole('admin'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        /* Global styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            height: 100%;
            color: white;
            overflow-x: hidden;
            position: relative;
        }

        /* Background video */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0; /* Keeps video in background */
        }

        .video-background video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translate(-50%, -50%);
            object-fit: cover;
        }

        /* Navbar styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            color: white;
            position: relative;
            z-index: 1; /* Ensures navbar is above video */
        }

        .navbar .logo h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .navbar ul li {
            margin-left: 20px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .navbar ul li a:hover {
            color: #18bc9c;
        }

        /* Auth container */
        .auth-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            width: 400px;
            text-align: center;
            animation: glow 2s ease-in-out infinite;
            margin: 100px auto;
            position: relative;
            z-index: 2; /* Ensure content is above the video */
        }

        .auth-container h1 {
            margin-bottom: 20px;
            color: white;
        }

        /* Glowing effect */
        @keyframes glow {
            0% {
                box-shadow: 0 0 10px rgba(24, 188, 156, 0.8), 0 0 20px rgba(24, 188, 156, 0.6), 0 0 30px rgba(24, 188, 156, 0.4);
            }
            50% {
                box-shadow: 0 0 20px rgba(24, 188, 156, 0.9), 0 0 40px rgba(24, 188, 156, 0.7), 0 0 60px rgba(24, 188, 156, 0.5);
            }
            100% {
                box-shadow: 0 0 10px rgba(24, 188, 156, 0.8), 0 0 20px rgba(24, 188, 156, 0.6), 0 0 30px rgba(24, 188, 156, 0.4);
            }
        }

    </style>
</head>
<body>

<!-- Background Video -->
<div class="video-background">
    <video autoplay muted loop playsinline>
        <source src="media/background.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>

<!-- Navbar -->
<nav class="navbar">
    <div class="logo">
        <h1>DTC Bus Management</h1>
    </div>
    <ul>
        <li><a href="login_user.html">Login</a></li>
        <li><a href="index.html">Home</a></li>
        <li><a href="staff_scheduling.php">Scheduling</a></li>
        <li><a href="route.html">Bus Route</a></li>
        <li><a href="map.html">Map</a></li>
        <li><a href="index.html">Logout</a></li>
    </ul>
</nav>

<!-- Welcome Section -->
<section class="auth-container">
    <h1>Welcome to DTC Route Portal</h1>
</section>

</body>
</html>
