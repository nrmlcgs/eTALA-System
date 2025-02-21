<?php
if(!isset($_SESSION['auth']) || (trim($_SESSION['auth']) == '')) {
    session_destroy();
    header("location:index.php");
    exit(0);
}elseif($_SESSION['user_type'] != 3){
    session_destroy();
    header("location:index.php");
    exit(0);
}   
?>