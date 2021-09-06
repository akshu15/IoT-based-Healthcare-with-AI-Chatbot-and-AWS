<?php
include('connection/db.php');

$category_name=$_POST['category_name'];
$des=$_POST['des'];

$query=mysqli_query($conn,"insert into job_category(category,des)values('$category_name','$des')");
// var_dump($query);

if ($query) {
	echo "Category added";
	//header('location:create_company.php');
}else{
	echo "Unsuccessful";
}
?>