<?php
// Replace these variables with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "smis_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'id' parameter is set in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the DELETE query
    $sql = "DELETE FROM tbl_teacher WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "
            <script>
                alert('Record with ID $id deleted successfully.');
                window.location.href = 'teacher.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error deleting record: {$stmt->error}');
                window.location.href = 'teacher.php';
            </script>
        ";
    }

    $stmt->close();
} else {
    echo "Invalid request. No 'id' parameter provided.";
}

// Close the connection
$conn->close();
?>
