<?php
include_once("header_super_admin.php");
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  

    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
 
</head>
<body>

<header>
            <nav class="navbar navbar-expand-lg shadow-sm  bg-body-tertiary fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="employee_1.php? = Staff Home Page">
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
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item " href="doctor_reports.php? = Panel Reports Super Admin">Doctor Wise</a></li>
                                <li><a class="dropdown-item" href="report_super_admin_staff_wise.php? = Registration Date xrd336efe">Employee Wise</a></li>
                                <li><a class="dropdown-item" href="report_super_admin_day_wise.php? = Patient Reports Super Admin">Test Wise</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="reports_panel.php? = Panel Reports Super Admin">Invoice</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown animate__animated animate__bounceInDown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Patient
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item " href="new_patient_super_admin.php? = Patient Creation">New Patient</a></li>
                                <li><a class="dropdown-item" href="patient_data_level_super_admin.php? = Patient Details">Patient Details</a></li>
                                <li><a class="dropdown-item active" href="update_del_super_admin.php? = Registration Date xrd336efe">Update / Delete</a></li>                                
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

<section class="container mt-5">
<nav aria-label="breadcrumb mb-4">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="update_del_super_admin.php?id=<?php echo $row["id"]; ?>">Update Patient Records</a></li>
    <li class="breadcrumb-item active" aria-current="page">Searched Patient Record</li>
  </ol>
</nav>
  <div class="container p-4 table-responsive shadow-lg rounded rounded-4">
    <table class=" table table-hover table-bordered rounded rounded-2">
        <tr>
          <th class="bg-light text-primary text-center fs-4">UPDATE PATIENT RECORDS &nbsp; <i class="bi bi-file-earmark-text-fill"></i></th>        
        <tr>
        	<td align="right">
           <form action="" method="post" >
               Patient IC/Passport No: 
                 <input type="text" class="tb1" class="tb1" name="icno" placeholder="Enter IC/Passport No.">
                <input type="submit" class="tb2" name="submit" value="Search">
            </form>
            </td>
        <tr>
        </table>



        <table id="des" class="mt-3 table table-hover table-bordered rounded rounded-2 align-middle text-center animate__animated animate__bounceInDown">
  <tr>
  <th class="bg-light" width="30"><strong>S.NO</strong></th>
    <th class="bg-light" width="80"><strong>ICNO.</strong></th>
    <th class="bg-light" width="120"><strong>First Name</strong></th>
    <th class="bg-light" width="100"><strong>Last Name</strong></th>
    <th class="bg-light" width="90"><strong>DOB</strong></th>
    <th class="bg-light" width="80"><strong>Reg. No.</strong></th>
    <th class="bg-light" width="86"><strong>DOR</strong></th>
    <th class="bg-light" width="40"><strong>TOT</strong></th>
    <th class="bg-light" width="100"><strong>Test Location</strong></th>
    <th class="bg-light" width="100"><strong>Reference</strong></th>
    <th class="bg-light" width="27"><strong>Edit</strong></th>
    <th class="bg-light" width="45"><strong>Delete</strong></th>
  </tr>

<?php

include "conn.php"; // Using database connection file here
$i=1;
$icno = $_POST['icno'];
$records = mysqli_query($conn,"select * from patient where icno like '%".$icno."%' limit 25"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
	$id = $data['id'];
?>
  <tr>
  
    <td><?php echo $i; ?></td>
    <td><?php echo $data['icno']; ?></td>
    <td><?php echo $data['f_name']; ?></td>
    <td><?php echo $data['l_name']; ?></td>
    <td><?php echo $data['dob']; ?></td>
    <td><?php echo $data['validation']; ?></td>
    <td><?php echo $data['sys_date']; ?></td>
    <td><?php echo $data['t_type']; ?></td>
    <td><?php echo $data['t_location']; ?></td>
    <td><?php echo $data['p_ref']; ?></td>   
    <td align="center"><a href="update_super_admin.php?id=<?php echo $data['id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
    <td align="center"><a href="delete_super_admin.php?id=<?php echo $data['id']; ?> "onclick="return confirm('Delete Patient:<?php echo $data['icno']; ?>')"><button class="btn"><i class="bi bi-trash3 text-danger"></i></button></a></td>
  </tr>	
<?php
$i++;
}

?>
</table>
  </div>
</section>



</body>
</html>