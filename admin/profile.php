<?php

include('../class/Appointment.php');

$object = new Appointment;

if(!$object->is_login())
{
    header("location:".$object->base_url."");
}

if($_SESSION['type'] != 'Admin')
{
    header("location:".$object->base_url."");
}


$object->query = "
SELECT * FROM admin_table
WHERE admin_id = '".$_SESSION["admin_id"]."'
";

$result = $object->get_result();

include('header.php');

?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Profile</h1>

                    <!-- DataTales Example -->
                    
                    <form method="post" id="profile_form" enctype="multipart/form-data">
                        <div class="row"><div class="col-md-8"><span id="message"></span><div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                                    </div>
                                    <div clas="col" align="right">
                                        <input type="hidden" name="action" value="admin_profile" />
                                        <button type="submit" name="edit_button" id="edit_button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                        &nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!--<div class="row">
                                    <div class="col-md-6">!-->
                                        <div class="form-group">
                                            <label>Admin Name</label>
                                            <input type="text" name="admin_name" id="admin_name" class="form-control" required data-parsley-pattern="/^[a-zA-Z0-9 \s]+$/" data-parsley-maxlength="175" data-parsley-trigger="keyup" />
                                        </div>
                                        <div class="form-group">
                                            <label>Admin Email Address</label>
                                            <input type="text" name="admin_email_address" id="admin_email_address" class="form-control" required  data-parsley-type="email" data-parsley-trigger="keyup" />
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="admin_password" id="admin_password" class="form-control" required data-parsley-maxlength="16" data-parsley-trigger="keyup" />
                                        </div>
                                        <div class="form-group">
                                            <label>Hospital Name</label>
                                            <input type="text" name="hospital_name" id="hospital_name" class="form-control" required  data-parsley-trigger="keyup" />
                                        </div>
                                        <div class="form-group">
                                            <label>Hospital Address</label>
                                            <textarea name="hospital_address" id="hospital_address" class="form-control" required ></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Hospital Contact No.</label>
                                            <input type="text" name="hospital_contact_no" id="hospital_contact_no" class="form-control" required  data-parsley-trigger="keyup" />
                                        </div>
                                        <div class="form-group">
                                            <label>Hospital Logo</label><br />
                                            <input type="file" name="hospital_logo" id="hospital_logo" />
                                            <span id="uploaded_hospital_logo"></span>
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

    <?php
    foreach($result as $row)
    {
    ?>
    $('#admin_email_address').val("<?php echo $row['admin_email_address']; ?>");
    $('#admin_password').val("<?php echo $row['admin_password']; ?>");
    $('#admin_name').val("<?php echo $row['admin_name']; ?>");
    $('#hospital_name').val("<?php echo $row['hospital_name']; ?>");
    $('#hospital_address').val("<?php echo $row['hospital_address']; ?>");
    $('#hospital_contact_no').val("<?php echo $row['hospital_contact_no']; ?>");
    <?php
        if($row['hospital_logo'] != '')
        {
    ?>
    $("#uploaded_hospital_logo").html("<img src='<?php echo $row["hospital_logo"]; ?>' class='img-thumbnail' width='100' /><input type='hidden' name='hidden_hospital_logo' value='<?php echo $row['hospital_logo']; ?>' />");

    <?php
        }
        else
        {
    ?>
    $("#uploaded_hospital_logo").html("<input type='hidden' name='hidden_hospital_logo' value='' />");
    <?php
        }
    }
    ?>

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

                    if(data.error != '')
                    {
                        $('#message').html(data.error);
                    }
                    else
                    {

                        $('#admin_email_address').val(data.admin_email_address);
                        $('#admin_password').val(data.admin_password);
                        $('#admin_name').val(data.admin_name);

                        $('#hospital_name').val(data.hospital_name);
                        $('#hospital_address').val(data.hospital_address);
                        $('#hospital_contact_no').val(data.hospital_contact_no);

                        if(data.hospital_logo != '')
                        {
                            $("#uploaded_hospital_logo").html("<img src='"+data.hospital_logo+"' class='img-thumbnail' width='100' /><input type='hidden' name='hidden_hospital_logo' value='"+data.hospital_logo+"'");
                        }
                        else
                        {
                            $("#uploaded_hospital_logo").html("<input type='hidden' name='hidden_hospital_logo' value='"+data.hospital_logo+"'");
                        }

                        $('#message').html(data.success);

    					setTimeout(function(){

    				        $('#message').html('');

    				    }, 5000);
                    }
				}
			})
		}
	});

});
</script>