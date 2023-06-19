<?php
include_once("header_super_admin.php");
include_once("conn.php");
?>

<?php  
 //$connect = mysqli_connect("localhost", "covid", "covid", "covidreports");  
 $query = "SELECT * FROM patient ORDER BY id desc";  
 $result = mysqli_query($conn, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title></title>  
        
    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
      </head>  
      <body>  

      <header>
            <nav class="navbar navbar-expand-lg shadow-sm  bg-body-tertiary fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="cpanel.php? = Staff Home Page">
                    <img src="./img/Logo.png" alt="Logo" width="45" height="auto" class="d-inline-block">
                    <span class="fw-bold fs-4 text-danger">COV-19</span><span class="fw-bold fs-4 text-primary"> SYS</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item  ">
                            <a class="nav-link " aria-current="page" href="cpanel.php? = Cpanel Home Page">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="new_staff_super_admin.php?=new staff">Staff</a>
                            </li>                            
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="queries_super_admin.php? = All Queries for Employees">Emp. Queries</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Registrations
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="day_wise_super_admin.php? = Day wise reports for super admin">Day Wise</a></li>
                                <li><a class="dropdown-item" href="panel_wise_super_admin.php">Panel Wise</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown  animate__animated animate__bounceInDown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="doctor_reports.php? = Panel Reports Super Admin">Doctor Wise</a></li>
                                <li><a class="dropdown-item" href="report_super_admin_staff_wise.php? = Registration Date xrd336efe">Employee Wise</a></li>
                                <li><a class="dropdown-item" href="report_super_admin_day_wise.php? = Patient Reports Super Admin">Test Wise</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item active" href="reports_panel.php? = Panel Reports Super Admin">Invoice</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Patient
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="new_patient_super_admin.php? = Patient Creation">New Patient</a></li>
                                <li><a class="dropdown-item" href="patient_data_level_super_admin.php? = Patient Details">Patient Details</a></li>
                                <li><a class="dropdown-item" href="update_del_super_admin.php? = Registration Date xrd336efe">Update / Delete</a></li>                                
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="patient_data_level_II_super_admin.php? = Sample Kit Validate">Kit Validate</a></li>
                                <li><a class="dropdown-item" href="ptn_reports_super_admin.php? = Patient Reports">Test Results</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <?php
                                session_start();
                                if(isset($_SESSION["user_id"]))
                                {
                                    if((time() - $_SESSION['last_time']) > 180000)
                                    {
                                      header("location:logout.php");
                                    }
                                    else
                                    {
                                      $_SESSION['last_time'] = time();
                                    }
                                  }
                                
                                  {
                                    echo "Hi..".$_SESSION['user_id']."";
                                  }
                              ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="reset.php?=Passwor Reset">Change Password</a></li>
                                <li><a class="dropdown-item" href="database-backup.php? = Database BackUp">DB Backup</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>    
                </div>
            </nav>
  </header> 

      <section class="mt-5 animate__animated animate__fadeInRight">
  <div class="container mt-5 p-4 shadow-lg rounded rounded-4 table-responsive">         
                  <form action="panel_action_report.php" method="POST">
                    <div class="row pt-2 g-2">
                      <div class="col-12 mb-2">
                        <div class="bg-light text-primary text-center border fs-4 fw-bold">PANEL WISE INVOICE &nbsp; <i class="bi bi-file-earmark-text-fill"></i></div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-6">
                        <select name="p_id" class="form-control" required=""/>
                 <option value="#">Select Panel</option>
                 <?php
					   $type = mysqli_query($conn, "SELECT * FROM panel where process_id='4'");
					    while ($row = mysqli_fetch_array($type)) 
						{
					  ?>
                 <option value="<?php echo $row['p_id'];?>"><?php echo $row['mode'];}?>             
				 </option></select>	</div>
                      <div class="col-lg-3 col-md-6 col-6"><input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" required/> </div>
                      <div class="col-lg-3 col-md-6 col-6"><input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" required/> </div>
                      <div class="col-lg-3 col-md-6 col-6 d-grid"><input type="submit" class="btn btn-outline-primary" name="submit" value="Generate Invoice"> </div>
                    </div>
                </form>  
                  
           </div> 
      </section> 
      </body>  
 </html>  
 