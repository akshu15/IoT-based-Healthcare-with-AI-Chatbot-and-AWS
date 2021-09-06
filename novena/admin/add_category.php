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
              <li class="breadcrumb-item"><a href="category.php">Category</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Category</li>
            </ol>
          </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Add Category</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
              </div>
             </div>
            </div>

            <div style="width: 50%; margin: auto;">
              <div id="msg"></div>
              <form action="" method="post" name="category_form" id="category_form">

                <div class="form-group">
                  <label for="Category Name">Category Name</label>
                  <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Enter Job Name">
                </div>

                <div class="form-group">
                  <label for="Job Description">Description</label>
                  <textarea name="des" id="des" class="form-control" cols="30" rows="10"></textarea>
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

          var category=$('#category_name').val();
          var des=$('#des').val();

          if (des=='' || category_name=='') {
            alert('Please enter all the details');
            return false;
          }
            var data=$('#category_form').serialize();
          $.ajax({
            type:"POST",
            url:"Category_add.php",
            data:data,
            success: function(data){
                alert(data);
              }
              // ,error: function(data){
              //   alert('Error');
              // }
          });
        });
      });
    </script>
  </body>
</html>
