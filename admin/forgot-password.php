<?php
session_start();
error_reporting(0);
include 'include/db_connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function send_password_reset($getEmail, $token)
{

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'occidentalmindoronhs@gmail.com';
    $mail->Password = 'yhxgeenrfcdiblrp';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('neustmgtAlumniStatus@gmail.com', 'Password Recovery');
    $mail->addAddress($getEmail);
    $mail->isHTML(true);
    $mail->Subject = 'Verification Code';
    $mail->Body = "<h1>$token</h1>";
    $mail->send();

}

if (isset($_POST['send-email'])) {
    $email = $_POST['email'];
    $token = rand(100000, 900000);


    $check_email_run = $conn->query("SELECT * FROM `tbl_user` WHERE email = '$email'");
    if ($check_email_run->num_rows > 0) {
        $row = $check_email_run->fetch_array();
        $getEmail = $row['email'];

        $result = $conn->query("UPDATE tbl_user SET verify_token = '$token' WHERE email = '$email'");
        if ($result) {
            $_SESSION['authentication'] = true;
            $_SESSION['msg'] = "<script>alert('We send a verification code in your email address.')</script>";
            header("location:verification-code.php");
            send_password_reset($getEmail, $token);
            exit(0);
        } else {
            $_SESSION['msg'] = "<script>alert('Oops! Something went wrong')</script>";
            header("location: forgot-password.php");
            exit(0);
        }
    } else {
        $_SESSION['msg'] = "<script>alert('Email is not found!')</script>";
        header("location: forgot-password.php");
        exit(0);
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Email Address</title>
    <!-- Add CSS Bootstrap file -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    * {
        font-family: 'Poppins', sans-serif;
    }
    </style>
</head>

<body>
    <?php echo $_SESSION['msg'];
    unset($_SESSION['msg']); ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Enter Email Address</h4>
                    </div>
                    <div class="card-body">
                        <form action="forgot-password.php" method="POST">
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="email" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="send-email"
                                    class="btn btn-primary form-control">Submit</button>
                            </div>
                            <div class="form-group text-center">
                                <a href="index.php?page=home" class="text-decoration-none">Back to
                                    login</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>