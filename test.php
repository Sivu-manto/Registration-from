<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration-table";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture and sanitize form data
$firstname = htmlspecialchars($_POST['first-name']);
$lastname = htmlspecialchars($_POST['last-name']);
$email = htmlspecialchars($_POST['email']);
$contact = htmlspecialchars($_POST['contact']);
$dob = htmlspecialchars($_POST['dob']);
$address = htmlspecialchars($_POST['address']);
$city = htmlspecialchars($_POST['city']);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (`first-name`, `last-name`, email, contact, dob, `address`, city) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $firstname, $lastname, $email, $contact, $dob, $address, $city);

if ($stmt->execute()) {
    echo "<h1>New record created successfully</h1>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
