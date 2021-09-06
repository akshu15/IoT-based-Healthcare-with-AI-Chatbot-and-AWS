<?php
include('connection/db.php');
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="apply_jobs.php">Apply Jobs</a></li>

              <li class="breadcrumb-item active" aria-current="page">Applied Job</li>
            </ol>
          </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
              <h1 class="h2">Applied Job</h1>
          </div>
<form style="border: 1px solid grey; padding: 10px; width: 80%; margin-left: 10%;">
<?php
    include('connection/db.php');
    $email=$_GET['view'];

    $sql= "select * from apply_job LEFT JOIN all_jobs ON apply_job.id_job = all_jobs.job_id where customer_email='{$_SESSION['email']}' and email='$email'";

    $query=mysqli_query($conn,$sql);
  
  while ($row=mysqli_fetch_array($query)) {
?>
            <div class="form-group">
              <label for each="" style="font-weight: bold;">Job Title: </label>
                <?php echo $row['job_title']; ?>
            </div>

            <div class="form-group">
              <label for each="" style="font-weight: bold;">Job Description: </label>
               <?php echo $row['job_des']; ?>
            </div>

            <div class="form-group">
              <label for each="" style="font-weight: bold;">Jobseeker name: </label>
               <?php echo $row['fname']; ?><?php echo $row['lname']; ?>
            </div>

            <div class="form-group">
              <label for each="" style="font-weight: bold;">Mobile Number: </label>
               <?php echo $row['phone']; ?>
            </div>

            <div class="form-group">
              <label for each="" style="font-weight: bold;">Jobseeker email: </label>
               <?php echo $row['email']; ?>
            </div>

            <div class="form-group">
              <label for each="" style="font-weight: bold;">Jobseeker file: </label>      
            <a href="http://localhost/job_portal/files/<?php echo $row['file']; ?>">Download File</a>
             </div>

<?php 
 } ?>
            <a href="#" class="btn btn-success">Accept</a>
            <a href="#" class="btn btn-danger">Decline</a>
</form>
  
        </main>
      </div>
    </div>
  </body>
</html>
