<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update</title>
	<link rel="stylesheet" href="Registration.css">
</head>

<body>

</body>

</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration-table";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = htmlspecialchars($_POST['user-id']);

    $firstname = htmlspecialchars($_POST['first-name']);
    $lastname = htmlspecialchars($_POST['last-name']);
    $email = htmlspecialchars($_POST['email']);
    $contact = htmlspecialchars($_POST['contact']);
    $dob = htmlspecialchars($_POST['dob']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);

    $stmt = $conn->prepare("UPDATE users SET `first-name` = ?, `last-name` = ?, email = ?, contact = ?, dob = ?, `address` = ?, city = ? WHERE id = ?");
    $stmt->bind_param("sssssssi", $firstname, $lastname, $email, $contact, $dob, $address, $city, $id);

    if ($stmt->execute()) {
        echo "<h1>Record updated successfully</h1>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>