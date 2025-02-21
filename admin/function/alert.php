<?php
if (isset($_SESSION['document_uploaded']) && $_SESSION['document_uploaded'] != '') {
?>
    <script>
        swal({
            title: "Success!",
            text: "Document Uploaded Successfully!",
            icon: "success",
            button: "Ok",
            timer: 500
        });
    </script>
    <?php
    unset($_SESSION['document_uploaded']);
    ?>
    <!-- Success updating student profile -->
<?php
} else if (isset($_SESSION['y_student_updated']) && $_SESSION['y_student_updated'] != '') {
?>
    <script>
        swal({
            title: "Success!",
            text: "Record Updated Successfully!",
            icon: "success",
            button: "Ok",
            timer: 500
        });
    </script>
    <!-- Failed tp update student profile -->
    <?php
    unset($_SESSION['y_student_updated']);
    ?>
<?php
} else if (isset($_SESSION['n_student_updated']) && $_SESSION['n_student_updated'] != '') {
?>
    <script>
        swal({
            title: "Failed!",
            text: "No Update",
            icon: "error",
            button: "Ok",
        });
    </script>
    <?php
    unset($_SESSION['n_student_updated']);
    ?>
    <!-- Success creating announcement -->
<?php
} else if (isset($_SESSION['y_announcement_created']) && $_SESSION['y_announcement_created'] != '') {
?>
    <script>
        swal({
            title: "Announcement Created!",
            text: "It will automatically deleted once done",
            icon: "success",
            button: "Ok",
            timer: 1000
        });
    </script>
    <!-- Failed to create announcement -->
    <?php
    unset($_SESSION['y_announcement_created']);
    ?>
<?php
} else if (isset($_SESSION['n_announcement_created']) && $_SESSION['n_announcement_created'] != '') {
?>
    <script>
        swal({
            title: "Failed!",
            text: "No Announcment Created",
            icon: "error",
            button: "Ok",
        });
    </script>
    <?php
    unset($_SESSION['n_announcement_created']);
    ?>
    <!-- Success updating announcement -->
<?php
} else if (isset($_SESSION['y_announcement_updated']) && $_SESSION['y_announcement_updated'] != '') {
?>
    <script>
        swal({
            title: "Announcement Updated!",
            text: "It will automatically deleted once done",
            icon: "success",
            button: "Ok",
            timer: 1000
        });
    </script>
    <!-- Failed to updating announcement -->
    <?php
    unset($_SESSION['y_announcement_updated']);
    ?>
<?php
} else if (isset($_SESSION['n_announcement_updated']) && $_SESSION['n_announcement_updated'] != '') {
?>
    <script>
        swal({
            title: "Failed!",
            text: "No Announcment Created",
            icon: "error",
            button: "Ok",
        });
    </script>
    <?php
    unset($_SESSION['n_announcement_updated']);
    ?>
    <!-- Delete user -->
<?php
} else if (isset($_SESSION['y_delete_user']) && $_SESSION['y_delete_user'] != '') {
?>
    <script>
        swal({
            title: "Success!",
            text: "User Deleted!",
            icon: "success",
            button: "Ok",
            timer: 500
        });
    </script>
    <!-- Failed to delete user -->
    <?php
    unset($_SESSION['y_delete_user']);
    ?>
<?php
} else if (isset($_SESSION['n_delete_user']) && $_SESSION['n_delete_user'] != '') {
?>
    <script>
        swal({
            title: "Failed!",
            text: "Failed to delete user",
            icon: "error",
            button: "Ok",
        });
    </script>
<?php
    unset($_SESSION['n_delete_user']);
} else if (isset($_SESSION['no_found']) && $_SESSION['no_found'] != '') {
?>
    <script>
        swal({
            title: "Error!",
            text: "No data found",
            icon: "error",
            button: "Ok",
            timer: 2000
        });
    </script>
<?php
    unset($_SESSION['no_found']);
} else if (isset($_SESSION['shs_rec_su']) && $_SESSION['shs_rec_su'] != '') {
?>
    <script>
        swal({
            title: "Success!",
            text: "Record Saved!",
            icon: "success",
            button: "Ok",
            timer: 500
        });
    </script>
<?php
    unset($_SESSION['shs_rec_su']);
} else if (isset($_SESSION['shs_rec_er']) && $_SESSION['shs_rec_er'] != '') {
?>
    <script>
        swal({
            title: "Error!",
            text: "Something went wrong!",
            icon: "error",
            button: "Ok",
            timer: 2000
        });
    </script>
<?php
    unset($_SESSION['shs_rec_er']);
} else if (isset($_SESSION['xsf10']) && $_SESSION['xsf10'] != '') {
?>
    <script>
        swal({
            title: "Something went wrong!",
            text: "No record found!",
            icon: "error",
            button: "Ok",
            timer: 3000
        });
    </script>
<?php
    unset($_SESSION['xsf10']);
} else if (isset($_SESSION['xsf101']) && $_SESSION['xsf101'] != '') {
?>
    <script>
        swal({
            title: "Something went wrong!",
            text: "No record found!",
            icon: "error",
            button: "Ok",
            timer: 3000
        });
    </script>
<?php
    unset($_SESSION['xsf101']);
} else if (isset($_SESSION['xsf10_x']) && $_SESSION['xsf10_x'] != '') {
?>
    <script>
        swal({
            title: "Something went wrong!",
            text: "No record!",
            icon: "error",
            button: "Ok",
            timer: 3000
        });
    </script>
<?php
    unset($_SESSION['xsf10_x']);
} else if (isset($_SESSION['sf10shs_su']) && $_SESSION['sf10shs_su'] != '') {
?>
    <script>
        swal({
            title: "Success!",
            // text: "Record Saved!",
            icon: "success",
            button: "Ok",
            timer: 1000
        });
    </script>
<?php
    unset($_SESSION['sf10shs_su']);
} else if (isset($_SESSION['sf10jhs_su']) && $_SESSION['sf10jhs_su'] != '') {
?>
    <script>
        swal({
            title: "Generated!",
            // text: "Record Saved!",
            icon: "success",
            button: "Ok",
            timer: 1000
        });
    </script>
<?php
    unset($_SESSION['sf10jhs_su']);
} else if (isset($_SESSION['update_grade']) && $_SESSION['update_grade'] != '') {
?>
    <script>
        swal({
            title: "Success!",
            text: "Record Updated!",
            icon: "success",
            button: "Ok",
            timer: 500
        });
    </script>
<?php
    unset($_SESSION['update_grade']);
} else if (isset($_SESSION['insert_grade']) && $_SESSION['insert_grade'] != '') {
?>
    <script>
        swal({
            title: "Success!",
            text: "Record Added!",
            icon: "success",
            button: "Ok",
            timer: 500
        });
    </script>
<?php
    unset($_SESSION['insert_grade']);
} else if (isset($_SESSION['grade_x']) && $_SESSION['grade_x'] != '') {
?>
    <script>
        swal({
            title: "Something went wrong!!",
            text: "Can't add or update this record",
            icon: "error",
            button: "Ok",
            timer: 2000
        });
    </script>
<?php
    unset($_SESSION['grade_x']);
} else if (isset($_SESSION['invalid_login']) && $_SESSION['invalid_login'] != '') {
?>
    <script>
        swal({
            title: "Login Failed!",
            text: "Email or Password is incorrect",
            icon: "error",
            button: "Ok",
            timer: 2000
        });
    </script>
<?php
    unset($_SESSION['invalid_login']);
} else if (isset($_SESSION['er_update']) && $_SESSION['er_update'] != '') {
?>
    <script>
        swal({
            title: "Something went wrong",
            text: "Failed to update",
            icon: "error",
            button: "Ok",
            timer: 2000
        });
    </script>
<?php
    unset($_SESSION['er_update']);
} else if (isset($_SESSION['su_update']) && $_SESSION['su_update'] != '') {
?>
    <script>
        swal({
            title: "Success!",
            text: "Record Updated!",
            icon: "success",
            button: "Ok",
            timer: 1000
        });
    </script>
<?php
    unset($_SESSION['su_update']);
} else if (isset($_SESSION['su_deleted']) && $_SESSION['su_deleted'] != '') {
?>
    <script>
        swal({
            title: "Success!",
            text: "Record Deleted!",
            icon: "success",
            button: "Ok",
            timer: 500
        });
    </script>

    <?php
    unset($_SESSION['su_deleted']);
    ?>
<?php
} else if (isset($_SESSION['er_deleted']) && $_SESSION['er_deleted'] != '') {
?>
    <script>
        swal({
            title: "Something went wrong!",
            text: "Failed to delete this record",
            icon: "error",
            button: "Ok",
        });
    </script>

    <?php
    unset($_SESSION['er_deleted']);
    ?>
<?php
} else if (isset($_SESSION['x_date']) && $_SESSION['x_date'] != '') {
?>
    <script>
        swal({
            title: "Something went wrong!",
            text: "Invalid Date!",
            icon: "error",
            button: "Ok",
            timer: 3000
        });
    </script>
<?php
    unset($_SESSION['x_date']);
} else if (isset($_SESSION['su_created']) && $_SESSION['su_created'] != '') {
?>
    <script>
        swal({
            title: "Success!",
            text: "Record Created!",
            icon: "success",
            button: "Ok",
            timer: 500
        });
    </script>

    <?php
    unset($_SESSION['su_created']);
    ?>
<?php
} else if (isset($_SESSION['er_created']) && $_SESSION['er_created'] != '') {
?>
    <script>
        swal({
            title: "Something went wrong!",
            text: "Check your information before to submit!",
            icon: "error",
            button: "Ok",
            timer: 3000
        });
    </script>
<?php
    unset($_SESSION['er_created']);
} else if (isset($_SESSION['email_exist']) && $_SESSION['email_exist'] != '') {
?>
    <script>
        swal({
            title: "Something went wrong!",
            text: "Email already exist!",
            icon: "error",
            button: "Ok",
            timer: 3000
        });
    </script>
<?php
    unset($_SESSION['email_exist']);
} else if (isset($_SESSION['lrn_exist']) && $_SESSION['lrn_exist'] != '') {
?>
    <script>
        swal({
            title: "Something went wrong!",
            text: "LRN # already exist!",
            icon: "error",
            button: "Ok",
            timer: 3000
        });
    </script>
<?php
    unset($_SESSION['lrn_exist']);
}else if (isset($_SESSION['failed_update']) && $_SESSION['failed_update'] != '') {
?>
    <script>
        swal({
            title: "Failed to Update!",
            text: "School year is already used!",
            icon: "error",
            button: "Ok",
            timer: 3000
        });
    </script>
<?php
    unset($_SESSION['failed_update']);
}
?>