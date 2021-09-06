<?php
include('include/header.php');
include('include/navbar.php');
include('include/sidebar.php');
?>
<?php
$query=mysqli_query($conn,"select * from job_category");
?>

<!----------Body page----------------->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="background-color: #fff;">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="job_create.php">Create Job</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Job</li>
            </ol>
          </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Add Job</h1>
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
                  <input type="text" name="job_title" id="job_title" class="form-control">
                </div>

                <div class="form-group">
                  <label for="Job Description">Job Description</label>
                  <textarea name="job_des" id="job_des" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                  <label for="Keyword">Keyword</label>
                  <input type="text" name="Keyword" id="Keyword" class="form-control">
                </div>

                <div class="form-group">
                  <label for="country">Country</label>
                  <select name="country" class="countries form-control" id="countryId">
                      <option value="">Select Country</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="State">State</label>
                  <select name="state" class="states form-control" id="stateId">
                      <option value="">Select State</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="city">City</label>
                  <select name="city" class="cities form-control" id="cityId">
                      <option value="">Select City</option>
                  </select>
                </div>

                 <div class="form-group">
                  <label for="category">Category</label>
                  <select name="category" class="category form-control" id="category">
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

                  <div class="form-group" style="margin: 10px;">
                    <input type="submit" class="btn btn1" name="submit" id="submit">
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
          var job_title=$('#job_title').val();
          var job_des=$('#job_des').val();
          var category=$('#category').val();
          var countryId=$('#countryId').val();
          var stateId=$('#stateId').val();
          var cityId=$('#cityId').val();
          var Keyword=$('#Keyword').val();

          if (job_title=='' || job_des=='' || Keyword=='' || countryId==''|| stateId==''|| cityId=='' || category=='') {
            alert('Please enter all the details');
            return false;
          }

          var data=$('#job_form').serialize();

          $.ajax({
            type:"POST",
            url:"job_create_add.php",
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