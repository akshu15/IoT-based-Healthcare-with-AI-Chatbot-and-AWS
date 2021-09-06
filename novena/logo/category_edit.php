<?php
include('connection/db.php');
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');

$id=$_GET['edit'];
$query=mysqli_query($conn,"select * from job_category where job_id ='$id'");
while ($row=mysqli_fetch_array($query)) {

$category=$row['category'];
$des=$row['des'];
}
?>
<!----------Body page----------------->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="background-color: #fff;">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="category.php">Category</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
            </ol>
          </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit Category</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
              </div>
             </div>
            </div>

            <div style="width: 50%; margin: auto;">
              <div id="msg"></div>
              <form action="" method="post" name="category_form" id="category_form">
                <div class="form-group">
                  <label for="Job Title">Category Name</label>
                  <input type="text" name="category_name" id="category_name" value="<?php echo $category; ?>" class="form-control">
                </div>

                <div class="form-group">
                  <label for="Description">Description</label>
                  <textarea name="des" id="des" class="form-control" cols="30" rows="10"><?php echo $des; ?></textarea>
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
  $category_name=$_POST['category_name'];
  $des=$_POST['des'];

	$query1=mysqli_query($conn,"update job_category set category='$category_name',des='$des' where job_id='$id'");
	if ($query1) {
		echo "<script>alert('Category record updated')</script>";
		header('location:category.php');
	}else{
		echo "<script>alert('Unsuccessful')</script>";
	}
}
?>