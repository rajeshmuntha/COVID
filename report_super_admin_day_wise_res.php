<?php
include_once("header_super_admin.php");
include_once("conn.php");
error_reporting( error_reporting() & ~E_NOTICE )
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
<script src="jquery-3.2.1.min.js"></script>

    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
 


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
                            <li class="nav-item ">
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
                            <li class="nav-item dropdown animate__animated animate__bounceInDown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="doctor_reports.php? = Panel Reports Super Admin">Doctor Wise</a></li>
                                <li><a class="dropdown-item" href="report_super_admin_staff_wise.php? = Registration Date xrd336efe">Employee Wise</a></li>
                                <li><a class="dropdown-item active" href="report_super_admin_day_wise.php? = Patient Reports Super Admin">Test Wise</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="reports_panel.php? = Panel Reports Super Admin">Invoice</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Patient
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="new_patient_super_admin.php? = Patient Creation">New Patient</a></li>
                                <li><a class="dropdown-item" href="patient_data_level_super_admin.php? = Patient Details">Patient Details</a></li>
                                <li><a class="dropdown-item" href="update_del_super_admin.php? = Registration Date xrd336efe">Update / Delete</a></li>                                
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

<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    <div class="outer-scontainer">
    <section class=" mt-5">
  <div class="container p-4 shadow-lg rounded rounded-4 ">   
        
           <form action="" method="post" >
             <div class="table-responsive">
             <table class="table table-bordered text-center align-middle">
             <thead>
              <tr><th colspan="5" class="bg-light text-primary text-center fs-4">TEST WISE RESULTS &nbsp; <i class="bi bi-file-earmark-text-fill"></i></th></tr>
            </thead>
               <th width="140" >Report Date</th>
               <td width="191" ><input type ="date" name="reg_date" class="form-control" required></td>
               <th width="150" >Test Type</th>
               <td ><select name="t_type" class="form-control" required="">
                 <option selected>Type of Test</option>
                   <?php
					   $type = mysqli_query($conn, "SELECT * FROM patient group by t_type order by t_type ASC");
					    while ($row = mysqli_fetch_array($type)) 
						{
						
					  ?>
                   <option value="<?php echo $row['t_type'];	?>">
                     <?php //echo $row['t_type'];
					  $sql = mysqli_query($conn, "SELECT * FROM test_type where id = '".$row['t_type']."'");
					  while ($row1 = mysqli_fetch_array($sql)) 
						{
							echo $row1['test_type'];
						}
					  
					  	}?>
                   </option>
                   <!--   <option value="1">rT-PCR</option>
                      <option value="2">RTK-Antigen</option>
                      <option value="3">RTK-Antigen(PERKESO)</option>
                      <option value="4">Antibody IGM/IGG</option> !-->
                 </select></td>
                 <td ><input type="submit" class="btn btn-outline-secondary" name="submit" value="Search"></td>
             </table>
             </div>
           </form>

           <hr class="text-primary">
           
       <div class="table-responsive" id="div1">
               <?php
			   $i=1;
			   $date = $_POST['reg_date'];

               $type = $_POST['t_type'];
            $sqlSelect = mysqli_query($conn, "SELECT * FROM patient where reg_date = '".$date."' AND t_type = '".$type."'");
			//$sqlSelect = mysqli_query($conn, "SELECT * FROM patient where icno = $icno group by icno LIMIT 10");
               ?>
 
 
 <table id="des" class="table table-bordered text-center align-middle  animate__animated animate__bounceInDown">
            <thead> 
                <tr>
                	  <th class="align-middle" width='40'>Sl.No</th>
                    <th class="align-middle" width='100'>ICNO</th>
                    <th class="align-middle" width='420'>Patient Name</th>
                    <th class="align-middle" width='150'>Reg. No</th>
                    <th class="align-middle" width='150'>Payment Method</th>
                    <th class="align-middle" width='150'>Test Type</th>
                    <th class="align-middle" width='150'>Test Location</th>
                    <th class="align-middle" width='100'>Validate On</th>
					<!-- <th width="100">Kit Approved</th>
                     <th width='40'>Details</th>!-->
                    
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
                <td><?php  echo $row['validation']; ?></td>
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
                            case 5: echo"Rapid PCR";
                            break;
                            case 6: echo"Saliva PCR";
                            break;
                            case 7: echo"Influenza A & B";
                            break;
                    }
               ?></td>
                  <td><?php  echo strtoupper($row['t_location']); ?></td> 
                  <td><?php  echo strtoupper($row['reg_date']); ?></td> 
                   
                </tr>
                    <?php
					$i++;
                }
                ?>
                
            <tr>
              <td colspan="3">Total Records :</td>
              <td colspan="5"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(*) FROM patient where reg_date = '".$date."' AND t_type = '".$type."'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(*)'];
						}
			   ?></td>
            </tr>
                </tbody>
        </table>
  
  </div>
  <table class="table">
            <tr>
              <td align="center"><button onClick="printContent('div1')" class="btn btn-outline-primary">Print Results <i class="bi bi-printer"></i></button></div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
    </section>
  </div>

</body>

</html>