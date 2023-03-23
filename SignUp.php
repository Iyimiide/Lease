<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sign-up form submission
if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security
	
	// Insert user details into database
	$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

mysqli_close($conn);
?>
