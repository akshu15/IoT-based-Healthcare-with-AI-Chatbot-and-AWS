<?php


include('class/Appointment.php');

$object = new Appointment;

$object->query = "
SELECT patient_phone_no FROM patient_table 
WHERE patient_id = '".$_SESSION["patient_id"]."'
";


$result = $object->get_result();


foreach($result as $row){
	// echo $row['patient_phone_no'];
	$phoneNo=$row['patient_phone_no'];
}


// include('db.php');

// $query = mysqli_query($conn,"SELECT patient_phone_no FROM patient_table WHERE patient_id = 8");

// while ($row = $query->fetch_assoc()) {

//    // // echo $row['patient_phone_no']."<br>";
//     $phoneNo=$row['patient_phone_no'];

// }

//// $query1=strval($query);

$patients_url="https://tk7qoyktw2.execute-api.us-east-1.amazonaws.com/health/patient?phoneNo=".$phoneNo;
// $patients_url="https://tk7qoyktw2.execute-api.us-east-1.amazonaws.com/health/patients";
$patient_json=file_get_contents($patients_url);
$patient_array=json_decode($patient_json,true);

// if (!empty($patient_array)) {
// 	foreach ($patient_array as $data) {
// 		echo $data;
// 	}
		
// }

if (!empty($patient_array)) {
	foreach ($patient_array as $key => $value) {
		// echo "$key:$value\n";
		if ($key=='name') {
			$name=$value;
		}
		elseif ($key=='temp') {
			$temp=$value;
		}
		elseif ($key=='pulse') {
			$pulse=$value;
		}
		elseif ($key=='oximeter') {
			$oximeter=$value;
		}
		elseif ($key=='bp') {
			$bp=$value;
		}
		else{
			$no=$value;
		}
	}
		
}

// echo "<br>",$name."<br>", $temp."<br>",$pulse."<br>";


// if (!empty($patient_array)) {
// 	foreach ($patient_array as $value) {
// 		echo $value['phoneNo']."<br>";
// 	    echo $value['temp']."<br>";
// 	    echo $value['name']."<br>";
// 	    echo $value['pulse']."<br>";

// 	}

    
// }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<h1 style="text-align: center;">Patient Sensor Data for Analysis</h1>
<table>
	<tr>
		<th>Patient Name</th>
		<th>Temperature Value</th>
		<th>Pulse Rate</th>
		<th>Oximeter</th>
		<th>Blood Pressure</th>
	</tr>
	<tr>
		<td>
			<?php echo $name; ?>
		</td>
		<td>
			<?php echo $temp; ?>
		</td>
		<td>
			<?php echo $pulse; ?>
		</td>
		<td>
			<?php echo $oximeter; ?>
		</td>
		<td>
			<?php echo $bp; ?>
		</td>
	</tr>
</table>
</body>
</html>
