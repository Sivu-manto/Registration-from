<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search</title>
	<link rel="stylesheet" href="Registration.css">
</head>

<body>
	<?php
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "registration-table";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$result = null;

	if (isset($_POST['search'])) {
	    $search = $conn->real_escape_string($_POST['search']);

	    $sql = "SELECT * FROM users WHERE `first-name` LIKE '%$search%' OR `last-name` LIKE '%$search%'";
	    $result = $conn->query($sql);
	}

	if ($result && $result->num_rows > 0) {
	    while ($row = $result->fetch_assoc()) {
	        echo '<form action="update.php" method="post">';
	        echo '<input type="hidden" name="user-id" value="' . htmlspecialchars($row['id']) . '">';
	        echo '<label for="first-name">First Name:</label>';
	        echo '<input type="text" id="first-name" name="first-name" value="' . htmlspecialchars($row['first-name']) . '">';
	        echo '<label for="last-name">Last Name:</label>';
	        echo '<input type="text" id="last-name" name="last-name" value="' . htmlspecialchars($row['last-name']) . '">';
	        echo '<label for="email">Email:</label>';
	        echo '<input type="email" id="email" name="email" value="' . htmlspecialchars($row['email']) . '">';
	        echo '<label for="contact">Contact:</label>';
	        echo '<input type="text" id="contact" name="contact" value="' . htmlspecialchars($row['contact']) . '">';
	        echo '<label for="dob">DOB:</label>';
	        echo '<input type="date" id="dob" name="dob" value="' . htmlspecialchars($row['dob']) . '">';
	        echo '<label for="address">Address:</label>';
	        echo '<input type="text" id="address" name="address" value="' . htmlspecialchars($row['address']) . '">';
	        echo '<label for="city">City:</label>';
	        echo '<input type="text" id="city" name="city" value="' . htmlspecialchars($row['city']) . '">';
	        echo '<input type="submit" value="Update">';
	        echo '</form>';
	    }
	} else {
	    if ($result !== null) {
	        echo "No records found.";
	    }
	}

	$conn->close();
	?>
</body>

</html>