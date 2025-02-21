<?php
session_start();
error_reporting(0);
include 'include/db_connection.php';
include 'function/alert.php';
date_default_timezone_set('Asia/Manila');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $date = date("M d, Y  h:i:a");

    $result = $conn->query("SELECT * FROM tbl_user WHERE email = '$email' AND password='$password'");
    $row = $result->fetch_array();

    if ($result->num_rows == 1) {
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['user_type'] = $row['user_type'];
        $_SESSION['name'] = ucwords($row['firstname']);
        $_SESSION['name'] .= " " . ucwords($row['lastname']);
        $_SESSION['username'] = $row['username'];
        $_SESSION['auth'] = true;
        $user_id = $_SESSION['id'];
        $true = $conn->query("INSERT INTO `tbl_history_log`(transaction, user_id, student_id, date_added) VALUES ('Logged in', '$user_id', '0', '$date')");
        
        if($true){
            header("Location: dashboard.php?page=home");
        }else{
            session_destroy();
        }
    } else {
        // echo "<script>alert('Email or Password is incorrect!')</script>";
        $_SESSION['invalid_login'] = 'Email or Password is incorrect!';
    }

}




?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="assets/bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="images/logo_ori.png">
    <title>Administrator</title>
    <style>
    /* Importing fonts from Google */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        min-height: 100vh;
        width: 100%;
        background: #f7f7f7;
    }

    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 400px;
        width: 100%;
        background: #fff;
        border-radius: 7px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
    }

    .container .login-form {
        padding: 1rem;
    }

    .login-form header {
        font-size: 2rem;
        font-weight: 500;
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .login-form input {
        height: 40px;
        width: 100%;
        padding: 0 15px;
        font-size: 15px;
        margin-bottom: 1.3rem;
        border: 1px solid #ddd;
        border-radius: 6px;
        outline: none;
    }

    .login-form input:focus {
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
    }

    .login-form a {
        font-size: 16px;
        color: #720000;
        text-decoration: none;
    }

    .login-form a:hover {
        text-decoration: underline;
    }

    .login-form .button {
        color: #fff;
        background: #720000;
        font-weight: 500;
        letter-spacing: 1px;
        margin: 15px 0px;
        cursor: pointer;
        transition: 0.4s;

        height: 40px;
        width: 100%;
        font-size: 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        outline: none;
    }

    .login-form .button:hover {
        background: #570000;
    }
    </style>
</head>

<body>
    <?php echo $_SESSION['success'];
    unset($_SESSION['success']); ?>
    <div class="container shadow">
        <div class="login-form">
            <div class="text-center logo mb-5 mt-3">
                <img src="images/logo_ori.png" width="80px" height="80px">
                <header>Administrator</header>
            </div>

            <form action="index.php" method="POST">
                <input type="email" name="email" placeholder="Enter your email" required>
                <input type="password" name="password" placeholder="Enter your password" required>
                <a href="forgot-password.php" class="float-end text-decoration-none">Forgot password?</a>
                <button type="submit" name="login" class="button">Login</button>
            </form>
        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/salert/sweetalert.min.js"></script>
    <script type="text/javascript" src="assets/jquery/jquery-3.7.1.js"></script>
</body>

</html>
<?php include('function/alert.php'); ?>