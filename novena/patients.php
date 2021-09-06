<?php
include('header.php');

include('class/Appointment.php');

$object = new Appointment;

$object->query = "
SELECT patient_phone_no from patient_table as phoneNo
";

$result = $object->get_result();

$patients_url="https://tk7qoyktw2.execute-api.us-east-1.amazonaws.com/health/patient?phoneNo="$result;
$patient_json=file_get_contents($patients_url);




?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>Hello</p>
</body>
</html>