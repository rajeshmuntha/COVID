<?php
include "conn.php";
// include_once "left_menu_emp1.php";

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
include_once "header_level-I.php";
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
<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
<!-- Bootstrap 5.3 cdn -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


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
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="new_patient_level_1.php? = New Patient Creation">Add New Patient</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="patient_data_level_I.php? = Patient Details">Patient Details</a></li>
                            </ul>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="ptn_reports.php? = Patient Reports">Reports</a>
                            </li>
                            <li class="nav-item animate__animated animate__bounceInDown">
                            <a class="nav-link active" aria-current="page" href="queries_employee_1.php? = Emplyee Queries">Queries</a>
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

<section class="pt-5 mt-5 animate__animated animate__fadeInRight">
  <div class="container table-responsive p-4 shadow-lg rounded rounded-4">
        <table class="table table-responsive table-hover table-bordered align-middle">
          <thead>
              <tr class="text-center fs-4">
              <th scope="row" colspan="5" class="bg-light text-primary">Registered Queries <i class="bi bi-chat-dots"></i></th>
              </tr>
          </thead>
          <tbody class="text-center">
              <tr>
                  <th scope="col">Sl. No. </th>
                  <th scope="col">Query Type</th>
                  <th scope="col">Requested Date</th>
                  <th scope="col">Status</th>
                  <th scope="col">Response Date</th>
              </tr>
                <?php
                  $i=1;
                  $query=mysqli_query($conn,"select * from messages where author='".$auth."' ORDER by id desc limit 25");
                  while($row_q=mysqli_fetch_array($query)) {
                    $mid = $row_q["id"];
                ?>
              <tr>
                  <th scope="col"><?php echo $i;?></th>
                  <td scope="col"><?php echo $row_q["msg"];?></td>
                  <td scope="col"><?php echo $row_q["date"];?></td>
                  <td scope="col">
                  <?php 
                    switch($row_q["status"]){
                      case 0 : echo 'PENDING';
                      break;
                      case 1 : echo 'SUCCESS';
                      break;
                    }
                  ?>
                  </td>
                  <td scope="col">
                    <?php
                      $response=mysqli_query($conn,"select * from m_status where m_id='".$mid."'");
                      while($res_q=mysqli_fetch_array($response)) {
                      echo $res_q["date"];            
                      }
                      $i++;
              }  
                    ?>
                  </td>
              </tr>
          </tbody>
        </table>
  </div>
</section>




