<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
session_start();

$mysqli = new mysqli("localhost", "root", "", "auth_crud_system");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Login endpoint
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
    $result = $mysqli->query($sql);

    if ($result->num_rows === 1) {
        $_SESSION['username'] = $username;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}

// Logout endpoint
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    echo json_encode(['success' => true]);
}

// CRUD operations for items
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_SESSION['username'])) {
    // Fetch items from the database
    $items = [];
    $sql = "SELECT * FROM `items`";
    $result = $mysqli->query($sql);

    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }

    echo json_encode($items);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['username'])) {
    // Insert a new item
    if (isset($_POST['addItem'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];

        $sql = "INSERT INTO `items` (`name`, `description`) VALUES ('$name', '$description')";
        $result = $mysqli->query($sql);

        echo json_encode(['success' => $result]);
    }

    // Update an item
    if (isset($_POST['updateItem'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];

        $sql = "UPDATE `items` SET `name`='$name', `description`='$description' WHERE `id`='$id'";
        $result = $mysqli->query($sql);

        echo json_encode(['success' => $result]);
    }

    // Delete an item
    if (isset($_POST['deleteItem'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM `items` WHERE `id`='$id'";
        $result = $mysqli->query($sql);

        echo json_encode(['success' => $result]);
    }
}

$mysqli->close();
