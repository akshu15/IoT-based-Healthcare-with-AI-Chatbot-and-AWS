<?php
include('connection/db.php');
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');

$id=$_GET['edit'];
$query=mysqli_query($conn,"select * from admin_login where id ='$id'");
while ($row=mysqli_fetch_array($query)) {
	$email=$row['admin_email'];
	$password=$row['admin_pass'];
	$username=$row['admin_username'];
	$first_name=$row['first_name'];
	$last_name=$row['last_name'];
	$admin_type=$row['admin_type'];
}
?>
<!----------Body page----------------->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="background-color: #fff;">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="customers.php">Customers</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Customer</li>
            </ol>
          </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit Customer</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
              </div>
             </div>
            </div>

            <div style="width: 50%; margin: auto;">
              <div id="msg"></div>
              <form action="" method="post" name="customer_form" id="customer_form">
                <div class="form-group">
                  <label for="Customer Email"></label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Enter Customer Email" value="<?php echo $email; ?>">
                </div>

                <div class="form-group">
                  <label for="Customer Username"></label>
                  <input type="text" name="Username" id="Username" class="form-control" placeholder="Enter Customer Username" value="<?php echo $username; ?>">
                </div>

                <div class="form-group">
                  <label for="Customer Password"></label>
                  <input type="text" name="Password" id="Password" class="form-control" placeholder="Enter Customer Password" value="<?php echo $password; ?>">
                </div>

                <div class="form-group">
                  <label for="First Name"></label>
                  <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter Firstname" value="<?php echo $first_name; ?>">
                </div>

                <div class="form-group">
                  <label for="Last Name"></label>
                  <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Lastname" value="<?php echo $last_name; ?>">
                </div>

                <div class="form-group">
                  <label for="Admin Type"></label>
                  <select name="admin_type" id="admin_type" class="form-control" value="<?php echo $admin_type; ?>">
                    <option value="1">Super Admin</option>
                    <option value="2">Customer Admin</option>
                  </select>
                </div>

                <input type="hidden" name="id" id="id" value="<?php echo $_GET['edit']; ?>">

                  <div class="form-group" style="margin: 10px;">
                    <input type="submit" class="btn"  name="submit" id="submit" value="Update">
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
	$email=$_POST['email'];
	$password=$_POST['Password'];
	$username=$_POST['Username'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$admin_type=$_POST['admin_type'];

	$query1=mysqli_query($conn,"update admin_login set admin_email='$email',admin_pass='$password',admin_username='$username',first_name='$first_name',last_name='$last_name', admin_type='$admin_type' where id='$id'");
	if ($query1) {
		echo "<script>alert('Record updated')</script>";
		header('location:customers.php');
	}else{
		echo "<script>alert('Unsuccessful')</script>";
	}
}
?>