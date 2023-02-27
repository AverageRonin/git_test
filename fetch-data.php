<?php
$servername = "localhost";
$username = "ronin";
$password = "right3y3";
$dbname = "dog_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the database
$result = mysqli_query($conn, "SELECT * FROM dogs");

// Store the data in an array
$db = array();
while ($row = mysqli_fetch_assoc($result)) {
  $db[$row["breed"]] = array(
    "breed" => $row["breed"],
    "weight" => $row["weight"],
    "lifeSpan" => $row["life_span"]
  );
}

// Close the connection
mysqli_close($conn);

// Output the data as JSON
header("Content-Type: application/json");
echo json_encode($db);
?>
