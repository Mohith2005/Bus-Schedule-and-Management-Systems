-- Create database and tables
CREATE DATABASE IF NOT EXISTS dtc_bus_management;
USE dtc_bus_management;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS staff_schedule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    staff_id VARCHAR(50),
    name VARCHAR(100),
    role VARCHAR(50),
    location VARCHAR(100),
    shift_start TIME,
    shift_end TIME,
    status ENUM('Active', 'On Leave') DEFAULT 'Active',
    schedule_date DATE
);

-- Insert Admin
INSERT INTO users (username, password, email, role) VALUES
(
    'admin123',
    '$2y$10$NOw5MS/2hZrEct1CzM8VfezAKmUKSTwxas4AjFqT9Cyw.xmuohccC', -- password: adminpass
    'admin@dtc.in',
    'admin'
);

-- Insert User 1
INSERT INTO users (username, password, email, role) VALUES
(
    'user1',
    '$2y$10$WcNPa6TfHlsFbPfGD5qYxOvhxVuLFP.8YZvFE6WSxj3FZ0KaqYfl2', -- password: userpass
    'user1@example.com',
    'user'
);

-- Insert User 2
INSERT INTO users (username, password, email, role) VALUES
(
    'user2',
    '$2y$10$k1hxk1GxhYy3BClYOrrZ.ezJYzYM7RmTb0G0GiIfzHtYjw2chFgx2', -- password: welcome
    'user2@example.com',
    'user'
);
