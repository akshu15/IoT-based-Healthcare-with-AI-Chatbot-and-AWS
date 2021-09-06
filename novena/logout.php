<?php
session_start();
session_unset();

include('connection/db.php');

$query=mysqli_query($conn,"select * from patient where email='{$_SESSION['email']}' ");

if ($query) {
      header('location:http://localhost/novena/');
    }else{
      header('location:http://localhost/novena/login.php');
    }
?>