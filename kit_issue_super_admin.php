<?php
include_once("header_super_admin.php");
include_once("conn.php");
?> 
<?php
	                   
						$id =$_REQUEST['id'];
						$res=mysqli_query($conn,"select * from patient where id = '".$id."'");
                        while($row=mysqli_fetch_array($res))
                        {
                        //echo $row["user_id"]; 
						break;
						} 
	   			?>
                <?php

$date = date("Y-m-d");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
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
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="day_wise_super_admin.php? = Day wise reports for super admin">Day Wise</a></li>
                                <li><a class="dropdown-item" href="panel_wise_super_admin.php">Panel Wise</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
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
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item " href="new_patient_super_admin.php? = Patient Creation">New Patient</a></li>
                                <li><a class="dropdown-item" href="patient_data_level_super_admin.php? = Patient Details">Patient Details</a></li>
                                <li><a class="dropdown-item" href="update_del_super_admin.php? = Registration Date xrd336efe">Update / Delete</a></li>                                
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item active" href="patient_data_level_II_super_admin.php? = Sample Kit Validate">Kit Validate</a></li>
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
                            <ul class="dropdown-menu dropdown-menu-end animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="reset_s_admin.php?=Passwor Reset">Change Password</a></li>
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

<div class="form">

<p>
<?php
ob_start();
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id =$_REQUEST['id'];
$reg_date = $_REQUEST['reg_date'];
$status = $_REQUEST['status'];
$update="update patient set reg_date='".$reg_date."',status='".$status."' where id='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error());
$status = "Updated Successfully. </br></br>";
echo "<center>Subject Name: ".$row['name']." <p style='color:#006600;'>".$status."</center>";

//header('Refresh: 2; URL=subject_list.php');

 echo '<script type="text/javascript">
				location.replace("patient_data_level_II_super_admin.php");
			  </script>';
}else {

?>
</p>
<div>


<section class="container pt-5 animate__animated animate__fadeInRight">
<nav aria-label="breadcrumb mb-4">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="patient_data_level_II_super_admin.php?id=<?php echo $row["id"]; ?>">Patient Records</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Approve Kit</li>
  </ol>
</nav>
  <div class="container p-4 shadow-lg rounded rounded-4 table-responsive">   
  <form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<table class="table table-bordered table-hover text-center align-middle">  
<tr>
          <th colspan="2" class="bg-light text-primary text-center fs-4">APPROVE KIT &nbsp; <i class="bi bi-patch-check-fill"></i></th>        
        <tr>
<tr>
<th>IC/NO :</th>
<td><?php //echo $row['year'];
$res5=mysqli_query($conn,"select * from patient where id = '".$row['id']."'");
								while($row5=mysqli_fetch_array($res5))
								{
								echo $row5["icno"]; 
								}

?></td>
</tr>
<tr>
<tr>
<th >Name :</th>
<td><?php echo $row['f_name'].''.$row['l_name'];?></td>
</tr>
<tr>
<tr>
<th>Date of Registration :</th>
<td><?php echo $row['time'];?></td>
</tr>
<tr>
  <th >Date of Conform:</th>
  <td><input type="date" class="form-control" name="reg_date" required/></td>
</tr>
<th>Kit Raising :</th>
  
  <td>
  <select name="status" class="form-control" required/>
                      <option value="">Select</option>
                      <option value="1">Kit Approved</option>
  </select>          
  </td>
</tr>
<tr>
  <td colspan="2" class="text-center"><div class="">
  <input name="submit" class="btn btn-outline-primary" type="submit" value="Approve" />
  </div></td>
</tr>
</table>
</form>
<?php } ?>
  </div>
</section>

</div>
</div>
</body>
</html>
