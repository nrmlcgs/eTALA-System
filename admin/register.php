<?php
session_start();
include 'include/db_connection.php';

if (isset($_POST['signup'])) {
    $firstname = ucwords($_POST['firstname']);
    $lastname = ucwords($_POST['lastname']);
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $c_password = md5($_POST['c_password']);

    if ($password == $c_password) {
        $result = $conn->query("INSERT INTO tbl_user(firstname,lastname,email,password) VALUES('$firstname','$lastname','$email','$c_password ')");
        if ($result) {
            echo "<script>alert('Register Successfully!')</script>";
        } else {
            echo "<script>alert('Register Failed!')</script>";
        }
    } else {
        echo "<script>alert('The passwords do not match!')</script>";
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
    <title>Register</title>
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
    <div class="container shadow">
        <div class="login-form">
            <div class="text-center logo mb-5 mt-3">
                <img src="images/logo_ori.png" width="80px" height="80px">
                <header>Create Account</header>
            </div>

            <form action="register.php" method="POST">
                <input type="text" name="firstname" placeholder="Enter Firstname" required>
                <input type="text" name="lastname" placeholder="Enter Lastname" required>
                <input type="email" name="email" placeholder="Enter your email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="c_password" placeholder="Confirm Password" required>
                <button type="submit" name="signup" class="button">Sign Up</button>
                <p class="text-center mt-3">Already have an account? <a href="index.php"
                        class="text-decoration-none">Login</a>
                </p>
            </form>
        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>