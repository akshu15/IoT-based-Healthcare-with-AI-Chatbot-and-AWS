<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title></title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/register.css" rel="stylesheet" media="all">
</head>

<body>
    <div>
        <a href="index.php"><img src="images/home.png" style="height: 50px;width: 50px; padding: 10px;"></a>
    </div>
    <div class="page-wrapper">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="post" action="register.php">
                        <div class="row">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">First Name</label>
                                    <input class="input--style-4" type="text" name="first_name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Last Name</label>
                                    <input class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone">
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="Password" name="psd">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Repeat Password</label>
                                    <input class="input--style-4" type="Password" name="rpsd">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <p class="label">Check the conditions that apply to you or any members of your immediate relatives :</p>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="container">Asthma
                                        <input type="checkbox" name="health_issues[]" value="Asthma">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="container">Cancer
                                      <input type="checkbox" name="health_issues[]" value="Cancer">
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="container">Cardiac disease
                                      <input type="checkbox" name="health_issues[]" value="Cardiac">
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="container">Diabetes
                                      <input type="checkbox" name="health_issues[]" value="Diabetes">
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="container">Hypertension
                                      <input type="checkbox" name="health_issues[]" value="Hypertension">
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="container">Psychiatric disorder
                                      <input type="checkbox" name="health_issues[]" value="Psychiatric">
                                      <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <p class="label">Are you currently taking any medications</p>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="container1">Yes
                                  <input type="radio" name="med" value="yes">
                                  <span class="checkmark1"></span>
                                </label>
                                <label class="container1">No
                                  <input type="radio" name="med" value="no">
                                  <span class="checkmark1"></span>
                                </label>
                            </div>
                        </div>
                        <p class="label">Do you have any medication allergies</p>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="container1">Yes
                                  <input type="radio" name="allergy" value="yes">
                                  <span class="checkmark1"></span>
                                </label>
                                <label class="container1">No
                                  <input type="radio" name="allergy" value="no">
                                  <span class="checkmark1"></span>
                                </label>
                            </div>
                        </div>

                        
                        <div>
                            <button class="btn" name="submit" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<?php
include('connection/db.php');

if(isset($_POST['submit'])){

  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $psd=$_POST['psd'];
  $rpsd=$_POST['rpsd'];
  $checkbox1=$_POST['health_issues'];
  $chk="";  
    foreach($checkbox1 as $chk1)  
       {  
          $chk.= $chk1.",";  
       } 
  $med=$_POST['med'];
  $allergy=$_POST['allergy'];

  $query=mysqli_query($conn,"insert into patient(first_name,last_name,email,phone,psd,rpsd,health_issues,med,allergy)values('$first_name','$last_name','$email','$phone','$psd','$rpsd','$chk','$med','$allergy')");

  if($query){
    echo "<script>alert('Inserted')</script>";
    }else{
    echo "<script>alert('Not Inserted')</script>";
} 
}

?>
