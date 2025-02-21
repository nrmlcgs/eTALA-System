<?php
session_start();
error_reporting(0);
include 'include/db_connection.php';

if (!isset($_SESSION['verify_token']) || (trim($_SESSION['verify_token']) == '')) {
    session_destroy();
    header("location: index.php");
    exit(0);
} else {

    if (isset($_GET['code'])) {
        $id = $_GET['code'];

        $result = $conn->query("SELECT * FROM tbl_user WHERE verify_token = '$id'");
        $row = $result->fetch_array();
        if ($result) {
            $id = $row['email'];
        }
    }

    if (isset($_POST['change-password'])) {
        $id = $_POST['id'];
        $password = md5($_POST['password']);
        $c_password = md5($_POST['c_password']);

        if ($password == $c_password) {
            $stmt = $conn->query("UPDATE tbl_user SET password = '$password', verify_token = '0' WHERE email = '$id'");
            if ($stmt) {
                $_SESSION['success'] = "<script>alert('Great! Password is changed successfully!')</script>";
                header("location:index.php");
            } else {
                $_SESSION['msg'] = "<script>alert('Oops! Something went wrong!')</script>";
                exit(0);
            }

        } else {
            $_SESSION['msg'] = "<script>alert('Oops! Password not match!')</script>";
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
                        <h4 class="text-center">Create New Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="create_new_password.php" method="POST">
                            <div class="mb-3">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="text" id="password" name="password" class="form-control"
                                        placeholder="Enter New Password" required>

                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <input type="password" id="c_password" name="c_password" class="form-control"
                                        placeholder="Confirm Password" required>

                                </div>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary form-control" type="submit" name="change-password">Change
                                    Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>