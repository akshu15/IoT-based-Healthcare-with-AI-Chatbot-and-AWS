<?php
include('connection/db.php');

$del=$_GET['del'];
$query=mysqli_query($conn,"delete from company where company_id ='$del'");

if ($query) {
	echo "<script>alert('Company Deleted')</script>";
	header('location:create_company.php');
}else{
	echo "<script>alert('Unsuccessful')</script>";
}
?>