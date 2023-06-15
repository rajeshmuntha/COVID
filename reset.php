<?php
include_once("header_level-I.php");
include_once("conn.php");
?> 
<?php
	                    //session_start();
						$res=mysqli_query($conn,"select * from authenticate where user_id = '".$_SESSION["user_id"]."'");
                        while($row=mysqli_fetch_array($res))
                        {
                        //echo $row["user_id"]; 
						break;
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
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<!-- Bootstrap 5.3 cdn -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
<div class="form">
<style type="text/css">
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
</style>
<p>
  <?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$pass =$_REQUEST['pass'];
$update="update authenticate set pass='".md5($pass)."' where user_id='".$_SESSION["user_id"]."'";
mysqli_query($conn, $update) or die(mysqli_error());
$status = "Password Updated Successfully. </br></br>";
echo "<center>Login ID: ".$row['user_id']." <p style='color:#006600;'>".$status."</center>";
}else {
?>
</p>

<header>
            <nav class="navbar navbar-expand-md bg-body-tertiary shadow-sm fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="employee_1.php? = Staff Home Page">
                    <img src="./img/Logo.png" alt="Logo" width="45px" height="auto" class="d-inline-block ">
                    <span class="fw-bold fs-4 text-danger">COV-19</span><span class="fw-bold fs-4 text-primary"> SYS</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="employee_1.php? = Staff Home Page">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Patient
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="new_patient_level_1.php? = New Patient Creation">Add New Patient</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="patient_data_level_I.php? = Patient Details">Patient Details</a></li>
                            </ul>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="ptn_reports.php? = Patient Reports">Reports</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="queries_employee_1.php? = Emplyee Queries">Queries</a>
                            </li>
                            <li class="nav-item dropdown  animate__animated animate__bounceInDown">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
							echo "Hi..".$_SESSION['user_id'];
							?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Update Profile</a></li>
                                <li><a class="dropdown-item active" href="reset.php?=Password Reset">Change Password</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>    
                </div>
            </nav>
        </header>

<section class="pt-5 mt-5 animate__animated animate__fadeInRight">
  <div class="container p-4 shadow-lg rounded rounded-4">
    <form name="form" method="post" action=""> 
        <input type="hidden" name="new" value="1" />
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <table class="table table-responsive table-hover table-bordered">
        <thead>
            <tr class="text-center fs-4">
            <th scope="row" colspan="2" class="bg-light text-primary">Reset Your Password</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th scope="col">Login / User ID: </th>
                <td><?php echo $row['user_id'];?></td>
            </tr>
            <tr>
                <th scope="col">User Name: </th>
                <td><?php echo $row['name'];?></td>
            </tr>
            <tr>
                <th scope="col">Enter New Password: </th>
                <td><input type="password" class="form-control" name="pass" placeholder="Enter New Password" required value="" /></td>
            </tr>
            <tr class="">
                <th scope="row" colspan="2"><input name="submit" class="btn btn-outline-success" type="submit" value="Update Password" /></th>
            </tr>
        </tbody>
        </table>
    </form>
  </div>
</section>

<!-- <div>
  <form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<table width="600" align="center">
<tr>
<td align="left">Login ID :</td><td><?php echo $row['user_id'];?></td>
</tr>
<tr>
<td align="left" height="40">User Name :</td><td><?php echo $row['name'];?></td>
</tr>
<tr>
<td align="left">New Password :</td><td><input type="password" class="tb1" name="pass" placeholder="Enter New Password" required value="" /></td>
</tr>
<tr>
<td></td><td><input name="submit" class="tb3" type="submit" value="Update" /></td>
</tr>
</table>
</form>
</div> -->
<?php } ?>

<br />
</div>
</body>
</html>
