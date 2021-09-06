<?php
session_start();
session_unset();

include('connection/db.php');

$query=mysqli_query($conn,"select * from admin_login where admin_email='{$_SESSION['email']}' and admin_type = '2' ");

if ($query) {
      header('location:http://localhost/job_portal/');
    }else{
      header('location:http://localhost/job_portal/admin/admin_login.php');
    }
?>