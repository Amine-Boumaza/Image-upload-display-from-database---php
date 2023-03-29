<?php
	// Connect to database
	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "database_name";
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Fetch images from database
	$sql = "SELECT * FROM images";
	$result = $conn->query($sql);

	// Display images in cards
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo '<div class="card">';
			echo '<img src="' . $row["image_path"] . '">';
			echo '</div>';
		}
	} else {
		echo "No images found.";
	}

	// Close database connection
	$conn->close();
