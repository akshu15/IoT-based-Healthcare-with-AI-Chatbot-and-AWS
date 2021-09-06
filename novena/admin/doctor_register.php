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
    <link href="../css/register.css" rel="stylesheet" media="all">
</head>

<body>
    <div>
        <a href="../index.php"><img src="../images/home.png" style="height: 50px;width: 50px; padding: 10px;"></a>
    </div>
    <div class="page-wrapper">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="post" action="doctor_register.php">
                        <div class="row">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Name</label>
                                    <input class="input--style-4" type="text" name="name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="Password" name="psd">
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Repeat Password</label>
                                    <input class="input--style-4" type="Password" name="rpsd">
                                </div>
                            </div>
                            
                        <div class="col-2">
                          <p class="label">Gender</p>
                            <div class="input-group">
                                <label class="container1">Male
                                  <input type="radio" name="gender" value="male">
                                  <span class="checkmark1"></span>
                                </label>
                                <label class="container1">Female
                                  <input type="radio" name="gender" value="female">
                                  <span class="checkmark1"></span>
                                </label>
                            </div>
                        </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-2">  
                                    
                                      <label class="label">Specialization</label>
                            
                                <div class="input-group">
                                    <select class="input--style-4" name="specialization">
                                          <option>Select</option>
                                  <option>Dentist</option>
                                  <option>Gynecologist</option>
                                  <option>Body Surgeon</option>
                                  <option>Neuro Surgeon</option>
                                  <option>Cardiologist</option>
                                  <option>Physiotherapist</option>
                                  <option>Psychatrist</option>
                                        </select>
                                </div>
                            
                            <label class="label">Year of Experience</label>
                            
                                <div class="input-group">
                                    <select class="input--style-4" name="year_of_exp">
                                          <option>Years</option><option>0</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option>
                                        </select>
                                </div>

                               
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

  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $psd=$_POST['psd'];
  $gender=$_POST['gender'];
  $specialization=$_POST['specialization'];
  $year_of_exp=$_POST['year_of_exp'];

  $query=mysqli_query($conn,"insert into doc(name,email,phone,psd,gender,specialization,year_of_exp)values('$name','$email','$phone','$psd','$gender','$specialization','$year_of_exp')");

  if($query){
    echo "<script>alert('Inserted')</script>";
    }else{
    echo "<script>alert('Not Inserted')</script>";
} 
}

?>
