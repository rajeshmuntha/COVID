<?php
include "conn.php";
// include_once "left_menu_emp2.php";
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
<?php
include_once "header_level-II.php";
// include_once "time.php";
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
<html lang="en">
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
            <nav class="navbar navbar-expand-md  bg-body-tertiary">
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
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sample Kit
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="patient_data_level_II.php? = Patient Details">Issue Kit</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="update_level_II.php? = Update Patient Details">Update / Edit</a></li>
                            </ul>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="report_emp2_day_wise.php? = Day Wise Reports SP Care">Reports</a>
                            </li>
                            <li class="nav-item animate__animated animate__bounceInDown">
                            <a class="nav-link active" aria-current="page" href="queries_employee_2.php? = Emplyee Queries">Reg. Queries</a>
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

<section class="mt-5">
  <div class="container shadow-lg rounded rounded-4 table-responsive py-4 px-5">
  <table class="table table-hover table-bordered text-center align-middle">
  <tr>
    <th colspan="5" class="bg-light fs-4 text-primary py-3">Employee Registered Queries</th>
  </tr>
  <tr>
    <td class="bg-light"><strong>SL.NO</strong></td>
    <td class="bg-light" width="300"><strong>Query Type</strong></td>
    <td class="bg-light"><strong>Request Date</strong></td>
    <td class="bg-light"><strong>Status</strong></td>
    <td class="bg-light"><strong>Response Date</strong></td>
  </tr>
<?php
$i=1;
$query=mysqli_query($conn,"select * from messages where author='".$auth."' ORDER by id desc limit 25");
						while($row_q=mysqli_fetch_array($query))
                        {
							
						$mid = $row_q["id"];
?>


<br>

  <tr>
 	 <td><?php echo $i;?></td>
  	<td><?php echo $row_q["msg"];?></td>
	<td><?php echo $row_q["date"];?></td>
	<td><?php //echo $row_q["status"];
	switch($row_q["status"])
	{
		case 0 : echo "<font color='red'>PENDING</font>";
		break;
		case 1 : echo "<font color='green'>SUCCESS</font>";;
		break;
	}
	
	?></td>
	<td align="center">
    				<?php

					$response=mysqli_query($conn,"select * from m_status where m_id='".$mid."'");
						while($res_q=mysqli_fetch_array($response))
                        {
									
								echo $res_q["date"];
														
						}
		$i++;
		}
						
?>
    
    </td>
  </tr>
</table>
  </div>
</section>
