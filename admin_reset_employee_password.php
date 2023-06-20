<?php
include_once("header_super_admin.php");
include_once("conn.php");
?> 
<?php
	                    //session_start();
						$id =$_REQUEST['id'];
						$res=mysqli_query($conn,"select * from authenticate where id = '".$id."'");
                        while($row=mysqli_fetch_array($res))
                        {
                        //echo $row["user_id"]; 
						break;
						} 
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
<div class="form">
<p>
<?php
ob_start();
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id =$_REQUEST['id'];
$pass = md5($_REQUEST['pass']);
$update="update authenticate set pass='".$pass."' where id='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error());
$status = "Updated Successfully. </br></br>";
echo "<center>Subject Name: ".$row['name']." <p style='color:#006600;'>".$status."</center>";

//header('Refresh: 2; URL=staff_permissions.php');

 echo '<script type="text/javascript">
 
 window.setTimeout(function() {
    window.location.href = "new_staff_super_admin.php? = 12345611";}, 1500);
				
			  </script>';
}else {

?>
</p>

<header>
            <nav class="navbar navbar-expand-md fixed-top bg-body-tertiary">
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
                            <a class="nav-link" aria-current="page" href="admin_level.php? = Admin Home Page">Home</a>
                            </li>
                            <li class="nav-item animate__animated animate__bounceInDown">
                            <a class="nav-link active" aria-current="page" href="new_staff.php? = New Patient Creation">Staff</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Patient
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="new_patient_admin.php? = Patient Creation">Add New Patient</a></li>
                                <li><a class="dropdown-item" href="patient_data_level_admin.php? = Patient Details">Patient Details</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="patient_data_level_II.php? = Patient Details">Issue Kit</a></li>
                            </ul>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="ptn_reports_admin.php? = Patient Reports">Test Results</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="report_admin_day_wise.php? = Patient Reports Admin">Test Wise</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="reports_panel.php? = Panel Reports Super Admin">Invoice</a></li>
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

<section style="margin-top: 100px;" class="animate__animated animate__backInDown">
  <div class="container p-4 shadow-lg rounded rounded-4">
  <form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<table class="table-responsive table table-hover table-bordered text-center align-middle ">
    <thead>
        <tr><th colspan="2" class="bg-light text-primary fs-4">Reset the Password</th></tr>
    </thead>
<tr>
<td >User ID :</td><td><?php //echo $row['year'];
$res5=mysqli_query($conn,"select * from authenticate where id = '".$row['id']."'");
								while($row5=mysqli_fetch_array($res5))
								{
								echo $row5["user_id"]; 
								}

?></td>
</tr>
<tr>
<tr>

</tr>
<tr>
<tr>
<td >Employee Name :</td><td><?php echo $row['name'];?></td>
</tr>
<tr>
<td >New Password :</td><td><!--<input type="text" class="tb1" name="status" required value="<?php //echo $row['status'];?>" />!-->
<input type="password" name="pass" class="form-control" placeholder ="EnterNew Password" required="required">
      
</td>
</tr>
<tr>
    <td colspan="2">
        <div class="d-grid">
            <input name="submit" class="btn btn-success" type="submit"  value="Click to Update" />
        </div>
    </td>
</tr>
</table>
</form>
<?php } ?>

<br />
</div>
</div>
</body>
</html>
