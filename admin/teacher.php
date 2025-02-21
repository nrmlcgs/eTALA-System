<?php
// Start session
session_start();

// Check if the user is logged in or redirect to the login page
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or perform other actions
    header("Location: index.php");
    exit();
}

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smis_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to retrieve teacher data from the database
function getTeachers($conn) {
    $teachers = array();
    $sql = "SELECT * FROM tbl_teacher";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $teachers[] = $row;
        }
    }

    return $teachers;
}

// Function to add a new teacher to the database
function addTeacher($conn, $firstname, $middlename, $lastname, $username, $password) {
    // Check if the username already exists
    $checkSql = "SELECT * FROM tbl_teacher WHERE username = '$username'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // Username already exists, handle accordingly (display an error message, redirect, etc.)
        echo "Error: Username '$username' already exists.";
        return false;
    } else {
        // Username is unique, proceed with the insertion
        $sql = "INSERT INTO tbl_teacher (firstname, middlename, lastname, username, password) 
                VALUES ('$firstname', '$middlename', '$lastname', '$username', '$password')";
        return $conn->query($sql);
    }
}

// Function to update an existing teacher in the database
function updateTeacher($conn, $id, $firstname, $middlename, $lastname, $username, $password) {
    $sql = "UPDATE tbl_teacher 
            SET firstname='$firstname', middlename='$middlename', lastname='$lastname', 
                username='$username', password='$password' 
            WHERE id=$id";
    return $conn->query($sql);
}

// Function to delete a teacher from the database
function deleteTeacher($conn, $id) {
    $sql = "DELETE FROM tbl_teacher WHERE id=$id";
    return $conn->query($sql);
}

// Sample teacher data
$teachers = getTeachers($conn);

// Handle Add Teacher Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addTeacher"])) {
    $firstname = $_POST["add_firstname"];
    $middlename = $_POST["add_middlename"];
    $lastname = $_POST["add_lastname"];
    $username = $_POST["add_username"];
    $password = $_POST["add_password"];

    addTeacher($conn, $firstname, $middlename, $lastname, $username, $password);

    // Refresh the teacher data after adding a new teacher
    $teachers = getTeachers($conn);
}

// Handle Update Teacher Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateTeacher"])) {
    $id = $_POST["update_id"];
    $firstname = $_POST["update_firstname"];
    $middlename = $_POST["update_middlename"];
    $lastname = $_POST["update_lastname"];
    $username = $_POST["update_username"];
    $password = $_POST["update_password"];

    updateTeacher($conn, $id, $firstname, $middlename, $lastname, $username, $password);

    // Refresh the teacher data after updating a teacher
    $teachers = getTeachers($conn);
}

// Handle Delete Teacher Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteTeacher"])) {
    $id = $_POST["delete_id"];

    deleteTeacher($conn, $id);

    // Refresh the teacher data after deleting a teacher
    $teachers = getTeachers($conn);
}

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Check for file existence
$sidebarFile = 'include/nav_sidebar1.php';
if (file_exists($sidebarFile)) {
    // Include the sidebar file
    require($sidebarFile);
} else {
    echo "Error: Sidebar file not found.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            z-index: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 0;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #45a049;
        }

        .close {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .close:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>

<h2>Teacher Information</h2>

<button onclick="openModal('addModal')">Add Teacher</button>

<table>
    <tr>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($teachers as $teacher): ?>
        <tr>
            <td><?= $teacher['firstname'] ?></td>
            <td><?= $teacher['middlename'] ?></td>
            <td><?= $teacher['lastname'] ?></td>
            <td><?= $teacher['username'] ?></td>
            <td><?= $teacher['password'] ?></td>
            <td>
                <button onclick="openUpdateModal('updateModal', <?= $teacher['id'] ?>)">Update</button>
                <button onclick="openDeleteModal('deleteModal', <?= $teacher['id'] ?>)">Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- Add Teacher Modal -->
<div id="addModal" class="modal">
    <h3>Add Teacher</h3>
    <form method="post" action="">
        <label for="add_firstname">First Name:</label>
        <input type="text" name="add_firstname" required><br>

        <label for="add_middlename">Middle Name:</label>
        <input type="text" name="add_middlename" required><br>

        <label for="add_lastname">Last Name:</label>
        <input type="text" name="add_lastname" required><br>

        <label for="add_username">Username:</label>
        <input type="text" name="add_username" required><br>

        <label for="add_password">Password:</label>
        <input type="password" name="add_password" required><br>

        <button type="submit" name="addTeacher">Add Teacher</button>
    </form>
    <button class="close" onclick="closeModal('addModal')">Close</button>
</div>

<!-- Update Teacher Modal -->
<div id="updateModal" class="modal">
    <h3>Update Teacher</h3>
    <form method="post" action="">
        <input type="hidden" name="update_id" id="update_id" value="">
        <label for="update_firstname">First Name:</label>
        <input type="text" name="update_firstname" id="update_firstname" required><br>

        <label for="update_middlename">Middle Name:</label>
        <input type="text" name="update_middlename" id="update_middlename" required><br>

        <label for="update_lastname">Last Name:</label>
        <input type="text" name="update_lastname" id="update_lastname" required><br>

        <label for="update_username">Username:</label>
        <input type="text" name="update_username" id="update_username" required><br>

        <label for="update_password">Password:</label>
        <input type="password" name="update_password" id="update_password" required><br>

        <button type="submit" name="updateTeacher">Update Teacher</button>
    </form>
    <button class="close" onclick="closeModal('updateModal')">Close</button>
</div>

<!-- Delete Teacher Modal -->
<div id="deleteModal" class="modal">
    <h3>Delete Teacher</h3>
    <form method="post" action="">
        <input type="hidden" name="delete_id" id="delete_id" value="">
        <p>Are you sure you want to delete this teacher?</p>
        <button type="submit" name="deleteTeacher">Delete Teacher</button>
    </form>
    <button class="close" onclick="closeModal('deleteModal')">Close</button>
</div>

<div class="overlay"></div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).style.display = 'block';
        document.querySelector('.overlay').style.display = 'block';
    }

    function openUpdateModal(modalId, teacherId) {
        document.getElementById(modalId).style.display = 'block';
        document.querySelector('.overlay').style.display = 'block';
        document.getElementById('update_id').value = teacherId;
        // Add logic to fetch and populate existing teacher data
    }

    function openDeleteModal(modalId, teacherId) {
        document.getElementById(modalId).style.display = 'block';
        document.querySelector('.overlay').style.display = 'block';
        document.getElementById('delete_id').value = teacherId;
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
        document.querySelector('.overlay').style.display = 'none';
    }
</script>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
