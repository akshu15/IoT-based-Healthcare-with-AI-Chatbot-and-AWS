<?php
include('connection/db.php');

$del=$_GET['del'];
$query=mysqli_query($conn,"delete from job_category where job_id ='$del'");

if ($query) {
	echo "<script>alert('Category Deleted')</script>";
	header('location:category.php');
}else{
	echo "<script>alert('Unsuccessful')</script>";
}
?>