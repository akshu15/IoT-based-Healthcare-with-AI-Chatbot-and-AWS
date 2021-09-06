<?php
include('connection/db.php');

session_start();  //session is already started but it is in header.php hence to use session variable we need to start session
$customer_email=$_SESSION['email'];

$job_title=$_POST['job_title'];
$job_des=$_POST['job_des'];
$keyword=$_POST['Keyword'];
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$category=$_POST['category'];

$query=mysqli_query($conn,"insert into all_jobs(customer_email,job_title,job_des,keyword,country,state,city,category)values('$customer_email','$job_title','$job_des','$keyword','$country','$state','$city','$category')");
// var_dump($query);

if ($query) {
	echo "Job added";
	//header('location:create_company.php');
}else{
	echo "Unsuccessful";
}
?>