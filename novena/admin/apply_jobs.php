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
              <li class="breadcrumb-item active" aria-current="page">Apply Jobs</li>
            </ol>
          </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
              <h1 class="h2">Apply Job</h1>
          </div>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Job Title</th>
                <th>Name</th>
                <th>Email</th>
                <th>File</th>
                <th>Resume</th>
            </tr>
        </thead>
        <tbody>
<?php
    include('connection/db.php');
    $a=1;
    $sql= "select * from apply_job LEFT JOIN all_jobs ON apply_job.id_job = all_jobs.job_id where customer_email='{$_SESSION['email']}'";
    $query=mysqli_query($conn,$sql);
  
  while ($row=mysqli_fetch_array($query)) {
?>
            <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $row['job_title']; ?></td>
                <td><?php echo $row['fname']; ?>  <?php echo $row['lname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><a href="http://localhost/job_portal/files/<?php echo $row['file']; ?>">Download File</a></td>
                
             <td>
                  <div class="row">
                    <div class="btn-group">
                      <a href="job_view.php?view=<?php echo $row['email']; ?>" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                     </div>
                  </div>
                </td>
            </tr>
<?php 
$a++; } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Sr No.</th>
                <th>Job Title</th>
                <th>Name</th>
                <th>Email</th>
                <th>File</th>
                <th>Resume</th>
            </tr>
        </tfoot>
    </table>
  
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    <!----datatables plugin---->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
      } );
    </script>
  </body>
</html>
