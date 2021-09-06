	<nav class="navbar navbar-expand-sm ">
  		<!-- Brand -->

  		<!-- Links -->
	  	<ul class="navbar-nav">
	  		<li class="nav-item">
	  			<a class="nav-link" href="profile.php"><?php echo $_SESSION['patient_name']; ?></a>
	  		</li>
	    	<li class="nav-item">
	      		<a class="nav-link" href="dashboard.php">Book Appointment</a>
	    	</li>
	    	<li class="nav-item">
	      		<a class="nav-link" href="appointment.php">My Appointment</a>
	    	</li>
	    	<li class="nav-item">
	    		<!-- <a class="nav-link" href="https://edoc-website.s3.amazonaws.com/home.html" style="color: blue;">Analysis</a> -->
	    		<a class="nav-link" href="patients.php" style="color: blue;">Analysis</a>
	    	</li>
	  	</ul>
	</nav>