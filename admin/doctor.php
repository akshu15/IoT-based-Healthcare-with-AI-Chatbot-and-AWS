<?php

//doctor.php

include('../class/Appointment.php');

$object = new Appointment;

if(!$object->is_login())
{
    header("location:".$object->base_url."admin");
}

if($_SESSION['type'] != 'Admin')
{
    header("location:".$object->base_url."");
}

include('header.php');

?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Doctor Management</h1>

                    <!-- DataTales Example -->
                    <span id="message"></span>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        	<div class="row">
                            	<div class="col">
                            		<h6 class="m-0 font-weight-bold text-primary">Doctor List</h6>
                            	</div>
                            	<div class="col" align="right">
                            		<button type="button" name="add_doctor" id="add_doctor" class="btn btn-success btn-circle btn-sm"><i class="fas fa-plus"></i></button>
                            	</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="doctor_table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Email Address</th>
                                            <th>Password</th>
                                            <th>Doctor Name</th>
                                            <th>Doctor Phone No.</th>
                                            <th>Doctor Speciality</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php
                include('footer.php');
                ?>

<div id="doctorModal" class="modal fade">
  	<div class="modal-dialog">
    	<form method="post" id="doctor_form">
      		<div class="modal-content">
        		<div class="modal-header">
          			<h4 class="modal-title" id="modal_title">Add Doctor</h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>
        		<div class="modal-body">
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
        		</div>
        		<div class="modal-footer">
          			<input type="hidden" name="hidden_id" id="hidden_id" />
          			<input type="hidden" name="action" id="action" value="Add" />
          			<input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />
          			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		</div>
      		</div>
    	</form>
  	</div>
</div>

<div id="viewModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_title">View Doctor Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="doctor_details">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

	var dataTable = $('#doctor_table').DataTable({
		"processing" : true,
		"serverSide" : true,
		"order" : [],
		"ajax" : {
			url:"doctor_action.php",
			type:"POST",
			data:{action:'fetch'}
		},
		"columnDefs":[
			{
				"targets":[0, 1, 2, 4, 5, 6, 7],
				"orderable":false,
			},
		],
	});

    $('#doctor_date_of_birth').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

	$('#add_doctor').click(function(){
		
		$('#doctor_form')[0].reset();

		$('#doctor_form').parsley().reset();

    	$('#modal_title').text('Add Doctor');

    	$('#action').val('Add');

    	$('#submit_button').val('Add');

    	$('#doctorModal').modal('show');

    	$('#form_message').html('');

	});

	$('#doctor_form').parsley();

	$('#doctor_form').on('submit', function(event){
		event.preventDefault();
		if($('#doctor_form').parsley().isValid())
		{		
			$.ajax({
				url:"doctor_action.php",
				method:"POST",
				data: new FormData(this),
				dataType:'json',
                contentType: false,
                cache: false,
                processData:false,
				beforeSend:function()
				{
					$('#submit_button').attr('disabled', 'disabled');
					$('#submit_button').val('wait...');
				},
				success:function(data)
				{
					$('#submit_button').attr('disabled', false);
					if(data.error != '')
					{
						$('#form_message').html(data.error);
						$('#submit_button').val('Add');
					}
					else
					{
						$('#doctorModal').modal('hide');
						$('#message').html(data.success);
						dataTable.ajax.reload();

						setTimeout(function(){

				            $('#message').html('');

				        }, 5000);
					}
				}
			})
		}
	});

	$(document).on('click', '.edit_button', function(){

		var doctor_id = $(this).data('id');

		$('#doctor_form').parsley().reset();

		$('#form_message').html('');

		$.ajax({

	      	url:"doctor_action.php",

	      	method:"POST",

	      	data:{doctor_id:doctor_id, action:'fetch_single'},

	      	dataType:'JSON',

	      	success:function(data)
	      	{

	        	$('#doctor_email_address').val(data.doctor_email_address);

                $('#doctor_email_address').val(data.doctor_email_address);
                $('#doctor_password').val(data.doctor_password);
                $('#doctor_name').val(data.doctor_name);
                $('#uploaded_image').html('<img src="'+data.doctor_profile_image+'" class="img-fluid img-thumbnail" width="150" />')
                $('#hidden_doctor_profile_image').val(data.doctor_profile_image);
                $('#doctor_phone_no').val(data.doctor_phone_no);
                $('#doctor_address').val(data.doctor_address);
                $('#doctor_date_of_birth').val(data.doctor_date_of_birth);
                $('#doctor_degree').val(data.doctor_degree);
                $('#doctor_expert_in').val(data.doctor_expert_in);

	        	$('#modal_title').text('Edit Doctor');

	        	$('#action').val('Edit');

	        	$('#submit_button').val('Edit');

	        	$('#doctorModal').modal('show');

	        	$('#hidden_id').val(doctor_id);

	      	}

	    })

	});

	$(document).on('click', '.status_button', function(){
		var id = $(this).data('id');
    	var status = $(this).data('status');
		var next_status = 'Active';
		if(status == 'Active')
		{
			next_status = 'Inactive';
		}
		if(confirm("Are you sure you want to "+next_status+" it?"))
    	{

      		$.ajax({

        		url:"doctor_action.php",

        		method:"POST",

        		data:{id:id, action:'change_status', status:status, next_status:next_status},

        		success:function(data)
        		{

          			$('#message').html(data);

          			dataTable.ajax.reload();

          			setTimeout(function(){

            			$('#message').html('');

          			}, 5000);

        		}

      		})

    	}
	});

    $(document).on('click', '.view_button', function(){
        var doctor_id = $(this).data('id');

        $.ajax({

            url:"doctor_action.php",

            method:"POST",

            data:{doctor_id:doctor_id, action:'fetch_single'},

            dataType:'JSON',

            success:function(data)
            {
                var html = '<div class="table-responsive">';
                html += '<table class="table">';

                html += '<tr><td colspan="2" class="text-center"><img src="'+data.doctor_profile_image+'" class="img-fluid img-thumbnail" width="150" /></td></tr>';

                html += '<tr><th width="40%" class="text-right">Doctor Email Address</th><td width="60%">'+data.doctor_email_address+'</td></tr>';

                html += '<tr><th width="40%" class="text-right">Doctor Password</th><td width="60%">'+data.doctor_password+'</td></tr>';

                html += '<tr><th width="40%" class="text-right">Doctor Name</th><td width="60%">'+data.doctor_name+'</td></tr>';

                html += '<tr><th width="40%" class="text-right">Doctor Phone No.</th><td width="60%">'+data.doctor_phone_no+'</td></tr>';

                html += '<tr><th width="40%" class="text-right">Doctor Address</th><td width="60%">'+data.doctor_address+'</td></tr>';

                html += '<tr><th width="40%" class="text-right">Doctor Date of Birth</th><td width="60%">'+data.doctor_date_of_birth+'</td></tr>';
                html += '<tr><th width="40%" class="text-right">Doctor Qualification</th><td width="60%">'+data.doctor_degree+'</td></tr>';

                html += '<tr><th width="40%" class="text-right">Doctor Speciality</th><td width="60%">'+data.doctor_expert_in+'</td></tr>';

                html += '</table></div>';

                $('#viewModal').modal('show');

                $('#doctor_details').html(html);

            }

        })
    });

	$(document).on('click', '.delete_button', function(){

    	var id = $(this).data('id');

    	if(confirm("Are you sure you want to remove it?"))
    	{

      		$.ajax({

        		url:"doctor_action.php",

        		method:"POST",

        		data:{id:id, action:'delete'},

        		success:function(data)
        		{

          			$('#message').html(data);

          			dataTable.ajax.reload();

          			setTimeout(function(){

            			$('#message').html('');

          			}, 5000);

        		}

      		})

    	}

  	});



});
</script>