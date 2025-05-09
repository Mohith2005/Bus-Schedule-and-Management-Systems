<?php
include('includes/auth.php');
include('includes/db.php');
checkRole('admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Staff Scheduling</title>
    <style>
        
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: white;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #222;
            padding: 20px;
        }

        .navbar h1 {
            margin: 0;
            font-size: 1.8rem;
            color: white;
        }

        .navbar a {
            text-decoration: none;
            color: white;
            background-color: #18bc9c;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .navbar a:hover {
            background-color: #16a085;
        }

        .auth-container {
            padding: 40px;
            max-width: 900px;
            margin: auto;
        }

        .auth-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 40px;
        }

        form input, form select, form button {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        form button {
            grid-column: span 2;
            background-color: #18bc9c;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #16a085;
        }

        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #1e1e1e;
        }

        .schedule-table th, .schedule-table td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
            color: white;
        }

        .schedule-table th {
            background-color: #333;
        }

        .schedule-table a {
            color: #e74c3c;
            text-decoration: none;
        }

        .schedule-table a:hover {
            text-decoration: underline;
        }
        .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #222;
    padding: 20px;
    flex-wrap: wrap;
}

.navbar .logo h1 {
    margin: 0;
    font-size: 1.8rem;
    color: white;
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
    margin: 0;
    padding: 0;
}

.nav-links li {
    display: inline-block;
}

.nav-links a {
    text-decoration: none;
    color: white;
    background-color: #18bc9c;
    padding: 8px 16px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.nav-links a:hover {
    background-color: #16a085;
}

    </style>
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <h1>Admin Panel</h1>
    </div>
    <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="bus_route.html">Bus Route</a></li>
        <li><a href="route_scheduling.html">Route Scheduling</a></li>
        <li><a href="map.html">Map</a></li>
        <li><a href="index.html">Logout</a></li>
    </ul>
</nav>

<section class="auth-container">
    <h2>Staff Scheduling</h2>
    <form action="scripts/add_staff.php" method="POST">
        <input type="text" name="staff_id" placeholder="Staff ID" required>
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="role" placeholder="Role" required>
        <input type="text" name="location" placeholder="Location" required>
        <input type="time" name="shift_start" required>
        <input type="time" name="shift_end" required>
        <select name="status">
            <option value="Active">Active</option>
            <option value="On Leave">On Leave</option>
        </select>
        <input type="date" name="schedule_date" required>
        <button type="submit">Add</button>
    </form>

    <table class="schedule-table">
        <tr>
            <th>ID</th><th>Name</th><th>Role</th><th>Location</th>
            <th>Start</th><th>End</th><th>Status</th><th>Date</th><th>Action</th>
        </tr>
        <?php
        $res = $conn->query("SELECT * FROM staff_schedule");
        while ($row = $res->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['staff_id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['role']}</td>
                    <td>{$row['location']}</td>
                    <td>{$row['shift_start']}</td>
                    <td>{$row['shift_end']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['schedule_date']}</td>
                    <td><a href='scripts/delete_staff.php?id={$row['id']}'>Delete</a></td>
                  </tr>";
        }
        ?>
    </table>
</section>
</body>
</html>
