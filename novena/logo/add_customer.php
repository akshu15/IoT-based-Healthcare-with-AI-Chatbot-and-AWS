<?php
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');
?>
<!----------Body page----------------->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="background-color: #fff;">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="customers.php">Customers</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Customer</li>
            </ol>
          </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Add Customer</h1>
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
                  <input type="email" name="email" id="email" class="form-control" placeholder="Enter Customer Email">
                </div>

                <div class="form-group">
                  <label for="Customer Username"></label>
                  <input type="text" name="Username" id="Username" class="form-control" placeholder="Enter Customer Username">
                </div>

                <div class="form-group">
                  <label for="Customer Password"></label>
                  <input type="text" name="Password" id="Password" class="form-control" placeholder="Enter Customer Password">
                </div>

                <div class="form-group">
                  <label for="First Name"></label>
                  <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter Firstname">
                </div>

                <div class="form-group">
                  <label for="Last Name"></label>
                  <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Lastname">
                </div>

                <div class="form-group">
                  <label for="Admin Type"></label>
                  <select name="admin_type" id="admin_type" class="form-control">
                    <option value="1">Super Admin</option>
                    <option value="2">Customer Admin</option>
                  </select>
                </div>
                  <div class="form-group" style="margin: 10px;">
                    <input type="submit" class="btn btn1" placeholder="save" name="submit" id="submit">
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
    <script type="text/javascript">
      $(document).ready(function(){
        $('#submit').click(function(){
          var email=$('#email').val();
          var Username=$('#Username').val();
          var Password=$('#Password').val();
          var first_name=$('#first_name').val();
          var last_name=$('#last_name').val();
          var admin_type=$('#admin_type').val();

          var data=$('#customer_form').serialize();

          $.ajax({
            type:"POST",
            url:"Customer_add.php",
            data:data,
            success:function(data){
              alert(data);
            }
          });
        });
      });
    </script>
  </body>
</html>
