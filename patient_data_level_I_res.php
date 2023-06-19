<?php
include_once("header_level-I.php");
include_once("conn.php");
// include_once "left_menu_emp1.php";
error_reporting( error_reporting() & ~E_NOTICE )
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
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
    <!-- Bootstrap 5.3 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="jquery-3.2.1.min.js"></script>
 

<style type="text/css">
 
.tb1 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
	font-family: "Cambria";
    outline:0; 
    height:30px; 
    
}
.tb2 {
	-webkit-border-radius: 1px; 
    -moz-border-radius: 1px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
	font-family: "Cambria", Courier, monospace;
    outline:0; 
    height:30px; 
    width: 50px; 
}
</style>
<style>
#des {
  font-family: "cambria";
  border-collapse: collapse;
  width: 1000px;
   }

#des td {
  border: 1px solid #09F;
  padding: 9px;
  font-size: 14px;
 }

#des tr:nth-child(even){background-color: #f2f2f2;}

/*#des tr:hover {background-color: #ddd;}*/

#des th {
  padding-top: 16px;
  padding-bottom: 10px;
  text-align: center;
  background-color: #3db2e1;
  color: white;
  font-size: 16px;
}
</style>
</head>

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
                            <li class="nav-item dropdown animate__animated animate__bounceInDown">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Patient
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="new_patient_level_1.php? = New Patient Creation">Add New Patient</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item active" href="patient_data_level_I.php? = Patient Details">Patient Details</a></li>
                            </ul>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="ptn_reports.php? = Patient Reports">Reports</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="queries_employee_1.php? = Emplyee Queries">Queries</a>
                            </li>
                            <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
							echo "Hi..".$_SESSION['user_id'];
							?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="#">Update Profile</a></li>
                                <li><a class="dropdown-item" href="reset.php?=Password Reset">Change Password</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>    
                </div>
            </nav>
        </header>

<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
<section class="pt-5">
  <div class="container table-responsive p-4 shadow-lg rounded rounded-4">
    <h4 class=" text-center text-primary">Patient Records</h4>
    <div class="">
        <form action="" method="post" >
            <div class="float-end py-4">
                <span>Patient IC/Passport No: </span>
                <input type="text" class="" name="icno" placeholder="Enter Uniq ID" required=""/>
                <input type="submit" class="btn btn-outline-success btn-sm" name="submit" value="Get Details">
            </div>
        </form>
    </div>
    <table class="table table-responsive table-hover table-bordered">
        <?php
			$i=1;
			$icno = $_POST['icno'];
            $sqlSelect = mysqli_query($conn, "SELECT * FROM patient where icno like '%".$icno."%' order by id desc LIMIT 15"); ?>
      <thead>
        <tr class="text-center">
          <th scope="row"">Sl No.</th>
          <th>IC/Passport No</th>
          <th>Patient Name</th>
          <th>Phone Number</th>
          <th>Reg. No.</th>
          <th>DOR</th>
          <th>Details</th>
        </tr>
      </thead>
      <?php
        while ($row = mysqli_fetch_array($sqlSelect)) {
                    ?>
      <tbody>
      <tr class="text-center">
          <td><?php  echo $i; ?></td>
          <td><?php  echo strtoupper($row['icno']); ?></td>
          <td><?php  echo $row['f_name']. '&nbsp;'.$row['l_name'];?></td>
		  <td><?php  echo $row['phno']; ?></td>
          <td><?php  echo $row['validation']; ?></td>
          <td><?php  echo $row['time'];?></td>
		  <td><a href="patient_view.php?id=<?php echo $row["id"]; ?>" target="_blank"><button><img src="img/correct.gif" width="15" height="15"></button></td>
      </tr>
        <?php
			$i++;
                }
                ?>
      </tbody>
    </table>
  </div>
</section>



</body>

</html>