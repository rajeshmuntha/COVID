<?php
include "header_admin.php";
include "conn.php";
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: ptn_login.php");
}
?>
<?php
$auth = $_SESSION["user_id"];
if($auth =='')
{
echo '<script type="text/javascript">
location.replace("logout.php? = Invalid Login");
 </script>';
}
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
<!-- Bootstrap icons cdn -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


<header>
            <nav class="navbar navbar-expand-md fixed-top bg-body-tertiary shadow">
                <div class="container-fluid">
                    <a class="navbar-brand" href="admin_level.php? = Admin Home Page">
                    <img src="./img/Logo.png" alt="Logo" width="45" height="auto" class="d-inline-block">
                    <span class="fw-bold fs-4 text-danger">COV-19</span><span class="fw-bold fs-4 text-primary"> SYS</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="admin_level.php? = Admin Home Page">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="new_staff.php? = New Patient Creation">Staff</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Patient
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="new_patient_admin.php? = Patient Creation">Add New Patient</a></li>
                                <li><a class="dropdown-item" href="patient_data_level_admin.php? = Patient Details">Patient Details</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="patient_data_level_II_admin.php? = Patient Details">Issue Kit</a></li>
                            </ul>
                            </li>
                            <li class="nav-item animate__animated animate__bounceInDown">
                            <a class="nav-link active" aria-current="page" href="ptn_reports_admin.php? = Patient Reports">Test Results</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item " href="report_admin_day_wise.php? = Patient Reports Admin">Test Wise</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="reports_panel_admin.php? = Panel Reports Super Admin">Invoice</a></li>
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
                            <ul class="dropdown-menu dropdown-menu-end animate__animated animate__flipInX">
                                <li><a class="dropdown-item " href="#">Update Profile</a></li>
                                <li><a class="dropdown-item" href="reset_admin.php?=Passwor Reset">Change Password</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>    
                </div>
            </nav>
  </header>

  <section style="padding-top: 80px;">
  <div class="container mt-5 p-4 table-responsive shadow-lg rounded rounded-4 animate__animated animate__fadeInRight">
<table class="table table-bordered">
<tr>
          <th class="bg-light text-center text-primary fs-4">PATIENT REPORTS &nbsp; <i class="bi bi-file-medical-fill"></i></th>        
        <tr>
        	<td align="right">
           <form action="ptn_reports_admin_res.php? = Reports" method="post" >
               <label for="" class="fw-bold">Patient Uniq ID No: </label>
                 <input type="text" class="tb3" name="validation" placeholder="Enter Uniq ID" required=""/>
                <input type="submit" class="btn btn-outline-secondary" name="submit" value="Search">
            </form>
            </td>
        <tr>
        </table>
  </div>
  </section>
