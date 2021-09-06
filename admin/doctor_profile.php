<?php

include('../class/Appointment.php');

$object = new Appointment;

if(!$object->is_login())
{
    header("location:".$object->base_url."");
}

if($_SESSION['type'] != 'Doctor')
{
    header("location:".$object->base_url."");
}

$object->query = "
    SELECT * FROM doctor_table
    WHERE doctor_id = '".$_SESSION["admin_id"]."'
    ";

$result = $object->get_result();

include('header.php');

?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Profile</h1>

                    <!-- DataTales Example -->
                    
                    <form method="post" id="profile_form" enctype="multipart/form-data">
                        <div class="row"><div class="col-md-10"><span id="message"></span><div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                                    </div>
                                    <div clas="col" align="right">
                                        <input type="hidden" name="action" value="doctor_profile" />
                                        <input type="hidden" name="hidden_id" id="hidden_id" />
                                        <button type="submit" name="edit_button" id="edit_button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                        &nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!--<div class="row">
                                    <div class="col-md-6">!-->
                                        <span id="form_message"></span>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Doctor Email Address <span class="text-danger">*</span></label>
                                                    <input type="text" name="doctor_email_address" id="doctor_email_address" class="form-control" required data-parsley-type="email" data-parsley-trigger="keyup" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Doctor Password <span class="text-danger">*</span></label>
                                                    <input type="password" name="doctor_password" id="doctor_password" class="form-control" required  data-parsley-trigger="keyup" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Doctor Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="doctor_name" id="doctor_name" class="form-control" required data-parsley-trigger="keyup" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Doctor Phone No. <span class="text-danger">*</span></label>
                                                    <input type="text" name="doctor_phone_no" id="doctor_phone_no" class="form-control" required  data-parsley-trigger="keyup" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Doctor Address </label>
                                                    <input type="text" name="doctor_address" id="doctor_address" class="form-control" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Doctor Date of Birth </label>
                                                    <input type="text" name="doctor_date_of_birth" id="doctor_date_of_birth" readonly class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Doctor Degree <span class="text-danger">*</span></label>
                                                    <input type="text" name="doctor_degree" id="doctor_degree" class="form-control" required data-parsley-trigger="keyup" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Doctor Speciality <span class="text-danger">*</span></label>
                                                    <input type="text" name="doctor_expert_in" id="doctor_expert_in" class="form-control" required  data-parsley-trigger="keyup" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Doctor Image <span class="text-danger">*</span></label>
                                            <br />
                                            <input type="file" name="doctor_profile_image" id="doctor_profile_image" />
                                            <div id="uploaded_image"></div>
                                            <input type="hidden" name="hidden_doctor_profile_image" id="hidden_doctor_profile_image" />
                                        </div>
                                    <!--</div>
                                </div>!-->
                            </div>
                        </div></div></div>
                    </form>
                <?php
                include('footer.php');
                ?>

<script>
$(document).ready(function(){

    $('#doctor_date_of_birth').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

    <?php
    foreach($result as $row)
    {
    ?>
    $('#hidden_id').val("<?php echo $row['doctor_id']; ?>");
    $('#doctor_email_address').val("<?php echo $row['doctor_email_address']; ?>");
    $('#doctor_password').val("<?php echo $row['doctor_password']; ?>");
    $('#doctor_name').val("<?php echo $row['doctor_name']; ?>");
    $('#doctor_phone_no').val("<?php echo $row['doctor_phone_no']; ?>");
    $('#doctor_address').val("<?php echo $row['doctor_address']; ?>");
    $('#doctor_date_of_birth').val("<?php echo $row['doctor_date_of_birth']; ?>");
    $('#doctor_degree').val("<?php echo $row['doctor_degree']; ?>");
    $('#doctor_expert_in').val("<?php echo $row['doctor_expert_in']; ?>");
    
    $('#uploaded_image').html('<img src="<?php echo $row["doctor_profile_image"]; ?>" class="img-thumbnail" width="100" /><input type="hidden" name="hidden_doctor_profile_image" value="<?php echo $row["doctor_profile_image"]; ?>" />');

    $('#hidden_doctor_profile_image').val("<?php echo $row['doctor_profile_image']; ?>");
    <?php
    }
    ?>

    $('#doctor_profile_image').change(function(){
        var extension = $('#doctor_profile_image').val().split('.').pop().toLowerCase();
        if(extension != '')
        {
            if(jQuery.inArray(extension, ['png','jpg']) == -1)
            {
                alert("Invalid Image File");
                $('#doctor_profile_image').val('');
                return false;
            }
        }
    });

    $('#profile_form').parsley();

	$('#profile_form').on('submit', function(event){
		event.preventDefault();
		if($('#profile_form').parsley().isValid())
		{		
			$.ajax({
				url:"profile_action.php",
				method:"POST",
				data:new FormData(this),
                dataType:'json',
                contentType:false,
                processData:false,
				beforeSend:function()
				{
					$('#edit_button').attr('disabled', 'disabled');
					$('#edit_button').html('wait...');
				},
				success:function(data)
				{
					$('#edit_button').attr('disabled', false);
                    $('#edit_button').html('<i class="fas fa-edit"></i> Edit');

                    $('#doctor_email_address').val(data.doctor_email_address);
                    $('#doctor_password').val(data.doctor_password);
                    $('#doctor_name').val(data.doctor_name);
                    $('#doctor_phone_no').val(data.doctor_phone_no);
                    $('#doctor_address').text(data.doctor_address);
                    $('#doctor_date_of_birth').text(data.doctor_date_of_birth);
                    $('#doctor_degree').text(data.doctor_degree);
                    $('#doctor_expert_in').text(data.doctor_expert_in);
                    if(data.doctor_profile_image != '')
                    {
                        $('#uploaded_image').html('<img src="'+data.doctor_profile_image+'" class="img-thumbnail" width="100" />');

                        $('#user_profile_image').attr('src', data.doctor_profile_image);
                    }

                    $('#hidden_doctor_profile_image').val(data.doctor_profile_image);
						
                    $('#message').html(data.success);

					setTimeout(function(){

				        $('#message').html('');

				    }, 5000);
				}
			})
		}
	});

});
</script>