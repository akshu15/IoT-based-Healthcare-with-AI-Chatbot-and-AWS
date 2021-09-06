<!---Navbar------->
<div class="bs-example">
    <nav class="navbar navbar-expand-md">
       <!-- <a href="#" class="navbar-brand">Brand</a>-->
       <div class="company-logo">
            <img class="logo"  onclick="admin_dashboard.php" src="../img/logo1.png" alt="logo">
            <h1 class="heading"> Dhanda.com </h1>
        </div>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"><i class="fa fa-fw fa-bars" style="color: #fff; font-size: 20px;"></i>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="customers.php" class="nav-item nav-link"><i class="fa fa-user-circle" aria-hidden="true"></i> Customers</a>
                <a href="create_company.php" class="nav-item nav-link"><i class="fa fa-fw fa-building"></i> Companies</a>
                <a href="../about-us/about-us.html" class="nav-item nav-link"><i class="fa fa-fw fa-info"></i> About Us</a>
                <a href="category.php" class="nav-item nav-link"><i class="fa fa-fw fa-info"></i> Category</a>
                <a class="nav-link" href="job_create.php">
                  <span data-feather="bar-chart-2"></span>
                  Job Create
                </a>
                <a class="nav-link" href="apply_jobs.php">
                  <span data-feather="bar-chart-2"></span>
                  Apply Job
                </a>
                <div class="nav-item dropdown" style="margin-left: 0px;">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-search"></i>Jobs </a>
                    <div class="dropdown-menu">
                        <a href="../walkin/alljobs.html" class="dropdown-item">All Jobs</a>
                        <a href="../walkin/govtjob.html" class="dropdown-item">Govt. Jobs</a>
                        <a href="../walkin/privatejobs.html" class="dropdown-item">Pvt. Jobs</a>
                        <a href="../walkin/walkin.html" class="dropdown-item">Walk In</a>
                    </div>
                </div>
            </div>
            <div class="navbar-nav">
                <a href="logout.php" class="nav-item nav-link"><i class="fa fa-fw fa-user"></i>Sign Out</a>
            </div>
        </div>
    </nav>
</div>
