<?php

include('../class/Appointment.php');

$object = new Appointment;

if($_POST["action"] == 'doctor_profile')
{
	sleep(2);

	$error = '';

	$success = '';

	$doctor_profile_image = '';

	$data = array(
		':doctor_email_address'	=>	$_POST["doctor_email_address"],
		':doctor_id'			=>	$_POST['hidden_id']
	);

	$object->query = "
	SELECT * FROM doctor_table 
	WHERE doctor_email_address = :doctor_email_address 
	AND doctor_id != :doctor_id
	";

	$object->execute($data);

	if($object->row_count() > 0)
	{
		$error = '<div class="alert alert-danger">Email Address Already Exists</div>';
	}
	else
	{
		$doctor_profile_image = $_POST["hidden_doctor_profile_image"];

		if($_FILES['doctor_profile_image']['name'] != '')
		{
			$allowed_file_format = array("jpg", "png");

	    	$file_extension = pathinfo($_FILES["doctor_profile_image"]["name"], PATHINFO_EXTENSION);

	    	if(!in_array($file_extension, $allowed_file_format))
		    {
		        $error = "<div class='alert alert-danger'>Upload valiid file. jpg, png</div>";
		    }
		    else if (($_FILES["doctor_profile_image"]["size"] > 2000000))
		    {
		       $error = "<div class='alert alert-danger'>File size exceeds 2MB</div>";
		    }
		    else
		    {
		    	$new_name = rand() . '.' . $file_extension;

				$destination = '../images/' . $new_name;

				move_uploaded_file($_FILES['doctor_profile_image']['tmp_name'], $destination);

				$doctor_profile_image = $destination;
		    }
		}

		if($error == '')
		{
			$data = array(
				':doctor_email_address'			=>	$object->clean_input($_POST["doctor_email_address"]),
				':doctor_password'				=>	$_POST["doctor_password"],
				':doctor_name'					=>	$object->clean_input($_POST["doctor_name"]),
				':doctor_profile_image'			=>	$doctor_profile_image,
				':doctor_phone_no'				=>	$object->clean_input($_POST["doctor_phone_no"]),
				':doctor_address'				=>	$object->clean_input($_POST["doctor_address"]),
				':doctor_date_of_birth'			=>	$object->clean_input($_POST["doctor_date_of_birth"]),
				':doctor_degree'				=>	$object->clean_input($_POST["doctor_degree"]),
				':doctor_expert_in'				=>	$object->clean_input($_POST["doctor_expert_in"])
			);

			$object->query = "
			UPDATE doctor_table  
			SET doctor_email_address = :doctor_email_address, 
			doctor_password = :doctor_password, 
			doctor_name = :doctor_name, 
			doctor_profile_image = :doctor_profile_image, 
			doctor_phone_no = :doctor_phone_no, 
			doctor_address = :doctor_address, 
			doctor_date_of_birth = :doctor_date_of_birth, 
			doctor_degree = :doctor_degree,  
			doctor_expert_in = :doctor_expert_in 
			WHERE doctor_id = '".$_POST['hidden_id']."'
			";
			$object->execute($data);

			$success = '<div class="alert alert-success">Doctor Data Updated</div>';
		}			
	}

	$output = array(
		'error'					=>	$error,
		'success'				=>	$success,
		'doctor_email_address'	=>	$_POST["doctor_email_address"],
		'doctor_password'		=>	$_POST["doctor_password"],
		'doctor_name'			=>	$_POST["doctor_name"],
		'doctor_profile_image'	=>	$doctor_profile_image,
		'doctor_phone_no'		=>	$_POST["doctor_phone_no"],
		'doctor_address'		=>	$_POST["doctor_address"],
		'doctor_date_of_birth'	=>	$_POST["doctor_date_of_birth"],
		'doctor_degree'			=>	$_POST["doctor_degree"],
		'doctor_expert_in'		=>	$_POST["doctor_expert_in"],
	);

	echo json_encode($output);
}

if($_POST["action"] == 'admin_profile')
{
	sleep(2);

	$error = '';

	$success = '';

	$hospital_logo = $_POST['hidden_hospital_logo'];

	if($_FILES['hospital_logo']['name'] != '')
	{
		$allowed_file_format = array("jpg", "png");

	    $file_extension = pathinfo($_FILES["hospital_logo"]["name"], PATHINFO_EXTENSION);

	    if(!in_array($file_extension, $allowed_file_format))
		{
		    $error = "<div class='alert alert-danger'>Upload valiid file. jpg, png</div>";
		}
		else if (($_FILES["hospital_logo"]["size"] > 2000000))
		{
		   $error = "<div class='alert alert-danger'>File size exceeds 2MB</div>";
	    }
		else
		{
		    $new_name = rand() . '.' . $file_extension;

			$destination = '../images/' . $new_name;

			move_uploaded_file($_FILES['hospital_logo']['tmp_name'], $destination);

			$hospital_logo = $destination;
		}
	}

	if($error == '')
	{
		$data = array(
			':admin_email_address'			=>	$object->clean_input($_POST["admin_email_address"]),
			':admin_password'				=>	$_POST["admin_password"],
			':admin_name'					=>	$object->clean_input($_POST["admin_name"]),
			':hospital_name'				=>	$object->clean_input($_POST["hospital_name"]),
			':hospital_address'				=>	$object->clean_input($_POST["hospital_address"]),
			':hospital_contact_no'			=>	$object->clean_input($_POST["hospital_contact_no"]),
			':hospital_logo'				=>	$hospital_logo
		);

		$object->query = "
		UPDATE admin_table  
		SET admin_email_address = :admin_email_address, 
		admin_password = :admin_password, 
		admin_name = :admin_name, 
		hospital_name = :hospital_name, 
		hospital_address = :hospital_address, 
		hospital_contact_no = :hospital_contact_no, 
		hospital_logo = :hospital_logo 
		WHERE admin_id = '".$_SESSION["admin_id"]."'
		";
		$object->execute($data);

		$success = '<div class="alert alert-success">Admin Data Updated</div>';

		$output = array(
			'error'					=>	$error,
			'success'				=>	$success,
			'admin_email_address'	=>	$_POST["admin_email_address"],
			'admin_password'		=>	$_POST["admin_password"],
			'admin_name'			=>	$_POST["admin_name"], 
			'hospital_name'			=>	$_POST["hospital_name"],
			'hospital_address'		=>	$_POST["hospital_address"],
			'hospital_contact_no'	=>	$_POST["hospital_contact_no"],
			'hospital_logo'			=>	$hospital_logo
		);

		echo json_encode($output);
	}
	else
	{
		$output = array(
			'error'					=>	$error,
			'success'				=>	$success
		);
		echo json_encode($output);
	}
}

?>