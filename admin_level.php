<?php
include_once "header_admin.php";
include "conn.php";
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
}
?>

<?php
//session_start();
$auth = $_SESSION['user_id'];
$res=mysqli_query($conn,"select * from authenticate where user_id='".$auth."'");
						while($row=mysqli_fetch_array($res))
                        {
						$emp_id = $row["user_id"];
						$emp_name = $row["name"];
						$emp_des = $row["dgn"];
						$emp_type = $row["role"];
						
						}
?>
<br>
<html>
<head>
    <link rel="shortcut icon" type="image/icon" href="img/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>      
  <!-- Google Fonts cdn -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
      <!-- Bootstrap 5.3 cdn -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <!-- Bootstrap icons cdn -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>  
</head>
<body>


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
                            <li class="nav-item animate__animated animate__bounceInDown">
                            <a class="nav-link active" aria-current="page" href="admin_level.php? = Admin Home Page">Home</a>
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


  <section style="padding-top: 100px;" class=" animate__animated animate__backInRight">
  <div class="container mt-5 p-4 table-responsive shadow-lg rounded rounded-4">
    <table class=" table table-hover table-bordered rounded rounded-2">
      <thead>
        <tr class="fs-5">
          <th scope="col" colspan="4" class="bg-light text-primary">
            <?php
            include_once "time.php"; ?>
          </th>
        </tr>
      </thead>
      <thead>
        <tr class="text-center fs-3">
        <th scope="col" colspan="3" class="bg-light text-danger"><i class="bi bi-virus"></i> COV-19<span class="text-primary"> SYS</span><span class="text-dark fw-normal"> | </span><span class="text-primary">Admin <i class="bi bi-person-square"></i></span></th>
        </tr>
      </thead>
    <td rowspan="5" width="175">
	<center>
	<?php
			  echo "<img src='img/staff_pics/".$emp_id.".jpg' width='100' height='auto'>"."";
			  ?>
			  
			  </center></td>       
    <th >User ID :</th>
    <td> <?php echo $emp_id;?></td>
  </tr>
  <tr>
    <th>Admin Name :</th>
    <td> <?php echo $emp_name;?></td>
  </tr>
  <tr>
    <th >Designation :</th>
    <td> <?php echo $emp_des;?></td>
  </tr>
  <tr>
    <th>User Type :</th>
    <td><?php //echo $emp_type;
	switch($emp_type)
	{
		case 1: echo"Super Admin";
		break;
		case 2: echo"Admin";
		break;
		case 3: echo"Doctor";
		break;
		case 4: echo"Employee-I";
		break;
		case 5: echo"Employee-II";
		break;
	}
	
	?></td>
  </tr>
 
</table>
  </div>
  </section>
</body>
</html>
