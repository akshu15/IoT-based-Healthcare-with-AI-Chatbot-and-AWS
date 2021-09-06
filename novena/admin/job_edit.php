<?php
include('connection/db.php');
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');

$id=$_GET['edit'];
$query=mysqli_query($conn,"select * from all_jobs where job_id ='$id'");
while ($row=mysqli_fetch_array($query)) {

$job_title=$row['job_title'];
$job_des=$row['job_des'];
$keyword=$row['keyword'];
$country=$row['country'];
$state=$row['state'];
$city=$row['city'];
$category=$row['category'];
}
?>
<!----------Body page----------------->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="background-color: #fff;">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="job_create.php">Create Job</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Job</li>
            </ol>
          </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit Job</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
              </div>
             </div>
            </div>

            <div style="width: 50%; margin: auto;">
              <div id="msg"></div>
              <form action="" method="post" name="job_form" id="job_form">
                <div class="form-group">
                  <label for="Job Title">Job Title</label>
                  <input type="text" name="job_title" id="job_title" value="<?php echo $job_title; ?>" class="form-control">
                </div>

                <div class="form-group">
                  <label for="Job Description">Job Description</label>
                  <textarea name="job_des" id="job_des" class="form-control" cols="30" rows="10"><?php echo $job_des; ?></textarea>
                </div>

                <div class="form-group">
                  <label for="keyword">Enter Keyword</label>
                  <input type="text" name="keyword" id="keyword" class="form-control" value="<?php echo $keyword; ?>">
                </div>

                <div class="form-group">
                  <label for="country">Country</label>
                  <select name="country" class="countries form-control" id="countryId">
                      <option value=""><?php echo $country; ?></option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="State">State</label>
                  <select name="state" class="states form-control" id="stateId">
                      <option value=""><?php echo $state; ?></option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="city">City</label>
                  <select name="city" class="cities form-control" id="cityId">
                      <option value=""><?php echo $city; ?></option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="category">Category</label>
                  <select name="category" class="form-control" id="category">
                    <?php
                    $query1=mysqli_query($conn,"select * from job_category");
                    while ($row=mysqli_fetch_array($query1)) {
                      ?>
      
                      <option value="<?php echo $row['job_id']; ?>"><?php echo $row['category']; ?></option>

                      <?php
                      }
                      ?>
                  </select>
                </div>

                 <input type="hidden" name="id" id="id" value="<?php echo $_GET['edit']; ?>">

                  <div class="form-group" style="margin: 10px;">
                    <input type="submit" class="btn btn1" placeholder="save" name="submit" id="submit" value="Update">
                  </div>          

              </form>
            </div>
          </div>

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

<?php
include('connection/db.php');

if(isset($_POST['submit'])){
	$id=$_POST['id'];
  $job_title=$_POST['job_title'];
  $job_des=$_POST['job_des'];
  $keyword=$_POST['keyword'];
  $country=$_POST['country'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $category=$_POST['category'];

	$query1=mysqli_query($conn,"update all_jobs set job_title='$job_title',job_des='$job_des',keyword='$keyword',country='$country',state='$state',city='$city',category='$category' where job_id='$id'");
	if ($query1) {
		echo "<script>alert('Job record updated')</script>";
		header('location:job_create.php');
	}else{
		echo "<script>alert('Unsuccessful')</script>";
	}
}
?>