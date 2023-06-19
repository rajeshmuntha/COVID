<?php
include_once("header_level-II.php");
include_once("conn.php");
// include_once "left_menu_emp2.php";
error_reporting( error_reporting() & ~E_NOTICE )
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
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
<script src="jquery-3.2.1.min.js"></script>
 


<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</head>

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
                            <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sample Kit
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="patient_data_level_II.php? = Patient Details">Issue Kit</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item " href="update_level_II.php? = Update Patient Details">Update / Edit</a></li>
                            </ul>
                            </li>
                            <li class="nav-item animate__animated animate__bounceInDown">
                            <a class="nav-link active" aria-current="page" href="report_emp2_day_wise.php? = Day Wise Reports SP Care">Reports</a>
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

<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
<section class="py-5">
  <div class="container p-4 shadow-lg rounded rounded-4">
    <form name="form" method="post" action="">
        <table class="table table-responsive table-hover table-bordered">
        <thead>
            <tr class="text-center fs-4">
            <th scope="row" colspan="2" class="bg-light text-primary  fs-4">SEARCH FOR REPORTS <i class="bi bi-file-earmark-medical"></i></th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th scope="col">Date of Report : </th>
                <td><input type ="date" name="reg_date" class="form-control" required></td>
            </tr>
            <tr>
                <th scope="col">Type of Test : </th>
                <td>
                  <select name="t_type" class="form-control" required="">
                      <option selected>Type of Test</option>
                        <?php
                          $type = mysqli_query($conn, "SELECT * FROM patient group by t_type order by t_type ASC");
                            while ($row = mysqli_fetch_array($type))  {                          
                          ?>
                           <option value="<?php echo $row['t_type'];	?>"><?php //echo $row['t_type'];
                            $sql = mysqli_query($conn, "SELECT * FROM test_type where id = '".$row['t_type']."'");
                            while ($row1 = mysqli_fetch_array($sql)) 
                            {
                            echo $row1['test_type'];
                            }                          
                            }?>
                      </option>
                              
                    </select>
                </td>
            </tr>
            <tr class="">
                <th scope="row" colspan="2"><input type="submit" name="submit" class="btn btn-outline-success" value="Search for results" /></th>
            </tr>
        </tbody>
        </table>
    </form>
  </div>
</section>


         <?php
			   $i=1;
			   if(isset($_POST['submit']))
			   {
			   $date = $_POST['reg_date'];
               $type = $_POST['t_type'];
            $sqlSelect = mysqli_query($conn, "SELECT * FROM patient where reg_date = '".$date."' AND t_type = '".$type."'");
               ?>


<div id="div1">
               
<section>
  <div class="container p-4 shadow-lg rounded rounded-4 table-responsive">
    <h4 class="text-center text-primary">Searched Results</h4>
  <table class="table text-center table-hover table-bordered align-middle">
            <thead>
                <tr>
                	  <th class="bg-light align-middle" width='50'>Sl.No</th>
                    <th class="bg-light align-middle" width='100'>ICNO</th>
                    <th class="bg-light align-middle" width='440'>Patient Name</th>
                    <th class="bg-light align-middle" width='150'>Date of Birth</th>
                    <th class="bg-light align-middle" width='100'>Ph. No.</th>
                    <th class="bg-light align-middle" width='150'>Panel Name</th>
                    <th class="bg-light align-middle" width='150'>Test Type</th>
                    <th class="bg-light align-middle" width='120'>Test Location</th>
                    <th class="bg-light align-middle" width='100'>Validate On</th>
                    
                </tr>
            </thead>
<?php
                
                while ($row = mysqli_fetch_array($sqlSelect)) {
                    ?>
                    
                <tbody>
                <tr>
                <td><?php  echo $i; ?></td>
                <td><?php  echo strtoupper($row['icno']); ?></td>
                <td><?php  echo $row['f_name']. '&nbsp;'.$row['l_name'];?></td>
                <td><?php  echo $row['dob']; ?></td>
                <td><?php  echo $row['phno']; ?></td>
                <td><?php   //echo $row['p_id']; 
                    $pnl = mysqli_query($conn, "SELECT * FROM panel where id = '".$row['p_id']."'");
					  while ($row_p = mysqli_fetch_array($pnl)) 
						{
							echo $row_p['mode'];
						}

                     ?></td>
				
               <td><?php  //echo $row['t_type']; 
                    switch($row['t_type'])
                    {
                            
                            case 1: echo"rT-PCR";
                            break;
                            case 2: echo"RTK-Antigen";
                            break;
                            case 3: echo"RTK-Antigen(PERKESO)";
                            break;
                            case 4: echo"Antibody IGM/IGG";
                            break;

                    }?>
                    </td>
                  <td><?php  echo strtoupper($row['t_location']); ?></td> 
                  <td><?php  echo strtoupper($row['reg_date']); ?></td>  
                </tr>
                    <?php
					$i++;
                }
                ?>
                </tbody>
        </table>
  </div>
</section>

<div class="container p-4 shadow rounded rounded-4">
<h6 class="text-center text-primary">Records Found</h6>
<table class="table text-center table-hover table-bordered">
            <tr>
              <td class="bg-light fw-bold" width="149">Total Records :</td>
              <td width="217"><?php 
                $sql_r = mysqli_query($conn, "SELECT COUNT(*) FROM patient where reg_date = '".$date."' AND t_type = '".$type."'");
                    while ($row1 = mysqli_fetch_array($sql_r)) 
                    {
                      echo $row1['COUNT(*)'];
                    }
                    }
			          ?>
              </td>            
            </tr>
            <tr class="text-center">
              <td  colspan="2"><button class="btn btn-outline-secondary btn-sm float-middle" onClick="printContent('div1')">Print Results <i class="bi bi-printer"></i></button></div></td>
            </tr>
  </table>
</div>
  </div>
  </div>

</body>

</html>