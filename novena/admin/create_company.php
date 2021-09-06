<?php
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Company</li>
            </ol>
          </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Company</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
              </div>
              <a href="add_company.php" style="text-decoration: none; color: #A569BD;"><i class="fa fa-plus-square" aria-hidden="true" style="color: #A569BD;"></i> Add Company</a>
            </div>
          </div>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Description</th>
                <th>Company Admin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
<?php
  include('connection/db.php');

  $query=mysqli_query($conn,"select * from company");
  
  while ( $row =mysqli_fetch_array($query)) {
?>
            <tr>
                <td><?php echo $row['company_name']; ?></td>
                <td><?php echo $row['des']; ?></td>
                <td><?php echo $row['admin']; ?></td>
                <td>
                  <div class="row">
                    <div class="btn-group">
                      <a href="company_edit.php?edit=<?php echo $row['company_id']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                      <a href="company_delete.php?del=<?php echo $row['company_id']; ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </td>
            </tr>
<?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Company Name</th>
                <th>Description</th>
                <th>Company Admin</th>
                <th>Action</th>
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
