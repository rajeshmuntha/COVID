<?php
include_once("header_level-II.php");
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
    <!-- Bootstrap 5.3 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="jquery-3.2.1.min.js"></script>
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
$reg_date = $_REQUEST['reg_date'];
$status = $_REQUEST['status'];
$update="update patient set reg_date='".$reg_date."',status='".$status."' where id='".$id."'";
		$sql = "INSERT INTO kit_approved(kit_id) VALUES('$id')";
		$result = mysqli_query($conn, $sql);
mysqli_query($conn, $update) or die(mysqli_error());
$status = "Updated Successfully. </br></br>";
echo "<center>Name: ".$row['name']." <p style='color:#006600;'>".$status."</center>";
echo '<script type="text/javascript">location.replace("patient_data_level_II.php");</script>';
}else {

?>
</p>

<header>
            <nav class="navbar navbar-expand-md fixed-top bg-body-tertiary">
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
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="employee_2.php? = Staff Home Page">Home</a>
                            </li>
                            <li class="nav-item dropdown animate__animated animate__bounceInDown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sample Kit
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item active" href="patient_data_level_II.php? = Patient Details">Issue Kit</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="update_level_II.php? = Update Patient Details">Update / Edit</a></li>
                            </ul>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="report_emp2_day_wise.php? = Day Wise Reports SP Care">Reports</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="queries_employee_2.php? = Emplyee Queries">Reg. Queries</a>
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
                                <li><a class="dropdown-item" href="reset_emp2.php?=Passwor Reset">Change Password</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>    
                </div>
            </nav>
  </header>

<section class="pt-5 mt-5">
  <div class="container table-responsive p-4 shadow-lg rounded rounded-4">
    <form name="form" method="post" action=""> 
        <input type="hidden" name="new" value="1" />
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <table class="table table-hover table-bordered align-middle">
        <thead>
            <tr class="text-center fs-4">
            <th scope="row" colspan="2" class="bg-light text-primary">APPROVE KIT <i class="bi bi-patch-check"></i></th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th scope="col">IC / NO : </th>
                <td><?php //echo $row['year'];
                      $res5=mysqli_query($conn,"select * from patient where id = '".$row['id']."'");
                      while($row5=mysqli_fetch_array($res5)){
                      echo $row5["icno"]; 
                      }
                  ?>
                </td>
            </tr>
            <tr>
                <th scope="col">Name : </th>
                <td><?php echo $row['f_name'].''.$row['l_name'];?></td>
            </tr>
            <tr>
                <th scope="col">Date of Registration : </th>
                <td><?php echo $row['time'];?></td>
            </tr>
            <tr>
                <th scope="col">Date of Approving : </th>
                <td><input type="date" class="form-control" name="reg_date" required/></td>
            </tr>
            <tr>
                <th scope="col">Kit Raising: </th>
                <td>
                  <select name="status" class="form-control" required/>
                      <option value="">Select</option>
                      <option value="1">Kit Approved</option>
                      <option value="1">Come back with remarks</option>
                  </select>
                </td>
            </tr>
            <tr class="">
                <th scope="row" colspan="2"><input name="submit" class="btn btn-outline-success" type="submit" value="Approve Kit" /></th>
            </tr>
        </tbody>
        </table>
    </form>
  </div>
</section>

<?php } ?>

</body>
</html>
