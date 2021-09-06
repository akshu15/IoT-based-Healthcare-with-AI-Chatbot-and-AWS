<?php

//doctor.php

include('../class/Appointment.php');

$object = new Appointment;

if(!$object->is_login())
{
    header("location:".$object->base_url."admin");
}

include('header.php');

?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Doctor Schedule Management</h1>

                    <!-- DataTales Example -->
                    <span id="message"></span>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        	<div class="row">
                            	<div class="col">
                            		<h6 class="m-0 font-weight-bold text-primary">Doctor Schedule List</h6>
                            	</div>
                            	<div class="col" align="right">
                            		<button type="button" name="add_exam" id="add_doctor_schedule" class="btn btn-success btn-circle btn-sm"><i class="fas fa-plus"></i></button>
                            	</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="doctor_schedule_table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <?php
                                            if($_SESSION['type'] == 'Admin')
                                            {
                                            ?>
                                            <th>Doctor Name</th>
                                            <?php
                                            }
                                            ?>
                                            <th>Schedule Date</th>
                                            <th>Schedule Day</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Consulting Time</th>
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

<div id="doctor_scheduleModal" class="modal fade">
  	<div class="modal-dialog">
    	<form method="post" id="doctor_schedule_form">
      		<div class="modal-content">
        		<div class="modal-header">
          			<h4 class="modal-title" id="modal_title">Add Doctor Schedule</h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>
        		<div class="modal-body">
        			<span id="form_message"></span>
                    <?php
                    if($_SESSION['type'] == 'Admin')
                    {
                    ?>
                    <div class="form-group">
                        <label>Select Doctor</label>
                        <select name="doctor_id" id="doctor_id" class="form-control" required>
                            <option value="">Select Doctor</option>
                            <?php
                            $object->query = "
                            SELECT * FROM doctor_table 
                            WHERE doctor_status = 'Active' 
                            ORDER BY doctor_name ASC
                            ";

                            $result = $object->get_result();

                            foreach($result as $row)
                            {
                                echo '
                                <option value="'.$row["doctor_id"].'">'.$row["doctor_name"].'</option>
                                ';
                            }
                            ?>
                        </select>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <label>Schedule Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" name="doctor_schedule_date" id="doctor_schedule_date" class="form-control" required readonly />
                        </div>
                    </div>
		          	<div class="form-group">
		          		<label>Start Time</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-clock"></i></span>
                            </div>
		          		    <input type="text" name="doctor_schedule_start_time" id="doctor_schedule_start_time" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#doctor_schedule_start_time" required onkeydown="return false" onpaste="return false;" ondrop="return false;" autocomplete="off" />
                        </div>
		          	</div>
                    <div class="form-group">
                        <label>End Time</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="text" name="doctor_schedule_end_time" id="doctor_schedule_end_time" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#doctor_schedule_end_time" required onkeydown="return false" onpaste="return false;" ondrop="return false;" autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Average Consulting Time</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-clock"></i></span>
                            </div>
                            <select name="average_consulting_time" id="average_consulting_time" class="form-control" required>
                                <option value="">Select Consulting Duration</option>
                                <?php
                                $count = 0;
                                for($i = 1; $i <= 15; $i++)
                                {
                                    $count += 5;
                                    echo '<option value="'.$count.'">'.$count.' Minute</option>';
                                }
                                ?>
                            </select>
                        </div>
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />

<script>
$(document).ready(function(){

	var dataTable = $('#doctor_schedule_table').DataTable({
		"processing" : true,
		"serverSide" : true,
		"order" : [],
		"ajax" : {
			url:"doctor_schedule_action.php",
			type:"POST",
			data:{action:'fetch'}
		},
		"columnDefs":[
			{
                <?php
                if($_SESSION['type'] == 'Admin')
                {
                ?>
                "targets":[6, 7],
                <?php
                }
                else
                {
                ?>
                "targets":[5, 6],
                <?php
                }
                ?>
				
				"orderable":false,
			},
		],
	});

    var date = new Date();
    date.setDate(date.getDate());

    $('#doctor_schedule_date').datepicker({
        startDate: date,
        format: "yyyy-mm-dd",
        autoclose: true
    });

    $('#doctor_schedule_start_time').datetimepicker({
        format: 'HH:mm'
    });

    $('#doctor_schedule_end_time').datetimepicker({
        useCurrent: false,
        format: 'HH:mm'
    });

    $("#doctor_schedule_start_time").on("change.datetimepicker", function (e) {
        console.log('test');
        $('#doctor_schedule_end_time').datetimepicker('minDate', e.date);
    });

    $("#doctor_schedule_end_time").on("change.datetimepicker", function (e) {
        $('#doctor_schedule_start_time').datetimepicker('maxDate', e.date);
    });

	$('#add_doctor_schedule').click(function(){
		
		$('#doctor_schedule_form')[0].reset();

		$('#doctor_schedule_form').parsley().reset();

    	$('#modal_title').text('Add Doctor Schedule Data');

    	$('#action').val('Add');

    	$('#submit_button').val('Add');

    	$('#doctor_scheduleModal').modal('show');

    	$('#form_message').html('');

	});

	$('#doctor_schedule_form').parsley();

	$('#doctor_schedule_form').on('submit', function(event){
		event.preventDefault();
		if($('#doctor_schedule_form').parsley().isValid())
		{		
			$.ajax({
				url:"doctor_schedule_action.php",
				method:"POST",
				data:$(this).serialize(),
				dataType:'json',
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
						$('#doctor_scheduleModal').modal('hide');
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

		var doctor_schedule_id = $(this).data('id');

		$('#doctor_schedule_form').parsley().reset();

		$('#form_message').html('');

		$.ajax({

	      	url:"doctor_schedule_action.php",

	      	method:"POST",

	      	data:{doctor_schedule_id:doctor_schedule_id, action:'fetch_single'},

	      	dataType:'JSON',

	      	success:function(data)
	      	{
                <?php
                if($_SESSION['type'] == 'Admin')
                {
                ?>
                $('#doctor_id').val(data.doctor_id);
                <?php
                }
                ?>
	        	$('#doctor_schedule_date').val(data.doctor_schedule_date);

                $('#doctor_schedule_start_time').val(data.doctor_schedule_start_time);

                $('#doctor_schedule_end_time').val(data.doctor_schedule_end_time);

	        	$('#modal_title').text('Edit Doctor Schedule Data');

	        	$('#action').val('Edit');

	        	$('#submit_button').val('Edit');

	        	$('#doctor_scheduleModal').modal('show');

	        	$('#hidden_id').val(doctor_schedule_id);

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

        		url:"doctor_schedule_action.php",

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

	$(document).on('click', '.delete_button', function(){

    	var id = $(this).data('id');

    	if(confirm("Are you sure you want to remove it?"))
    	{

      		$.ajax({

        		url:"doctor_schedule_action.php",

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