<?php
include('connection/db.php');

$company_name=$_POST['company_name'];
$des=$_POST['des'];
$admin=$_POST['admin'];

$query=mysqli_query($conn,"insert into company(company_name,des,admin)values('$company_name','$des','$admin')");
// var_dump($query);

if ($query) {
	echo "<script>alert('Company added')</script>";
	//header('location:create_company.php');
}else{
	echo "<script>alert('Unsuccessful')</script>";
}
?>