<?php
$servername = "localhost";
$username = "id22069784_smis_db";
$password = "I151_123x";
$db = "id22069784_smis";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}
?>