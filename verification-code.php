<?php
session_start();
error_reporting(0);
include 'include/db_connection.php';

if (!isset($_SESSION['authentication']) || (trim($_SESSION['authentication']) == '')) {
    session_destroy();
    header("location: index.php");
    exit(0);
} else {

    if (isset($_POST['send-code'])) {
        $verification_code = $_POST['input-verification-code'];
        $check_email_run = $conn->query("SELECT * FROM tbl_student_info WHERE verify_token = '$verification_code'");
        $row = $check_email_run->fetch_array();

        if ($check_email_run->num_rows == 1) {
            $_SESSION['msg'] = "<script>alert('You are now verified! Please enter a new password')</script>";
            $_SESSION['verify_token'] = $row['verify_token'];
            header("location: create_new_password.php?code=" . $row['verify_token'] . "");
            exit(0);
        } else {
            $_SESSION['msg'] = "<script>alert('Oops! Incorrect verification code!')</script>";
        }



    }

}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Verification Code</title>
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
                        <h4 class="text-center">Enter Verification Code</h4>
                    </div>
                    <div class="card-body">
                        <form action="verification-code.php" method="POST">
                            <div class="form-group">
                                <input type="number" class="form-control" id="input-verification-code"
                                    placeholder="Enter verification code" name="input-verification-code" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="send-code"
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