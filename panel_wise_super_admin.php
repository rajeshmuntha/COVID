<?php
include_once("header_super_admin.php");
include_once("conn.php");
?>

<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
<?php  
 $query = "SELECT * FROM patient ORDER BY id desc";  
 $result = mysqli_query($conn, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title></title>  
      <!-- Bootstrap icons cdn -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
      <body>  

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
                            <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="cpanel.php? = Cpanel Home Page">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="new_staff_super_admin.php?=new staff">Staff</a>
                            </li>                            
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="queries_super_admin.php? = All Queries for Employees">Emp. Queries</a>
                            </li>
                            <li class="nav-item dropdown  animate__animated animate__bounceInDown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Registrations
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="day_wise_super_admin.php? = Day wise reports for super admin">Day Wise</a></li>
                                <li><a class="dropdown-item active" href="panel_wise_super_admin.php">Panel Wise</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="doctor_reports.php? = Panel Reports Super Admin">Doctor Wise</a></li>
                                <li><a class="dropdown-item" href="report_super_admin_staff_wise.php? = Registration Date xrd336efe">Employee Wise</a></li>
                                <li><a class="dropdown-item" href="report_super_admin_day_wise.php? = Patient Reports Super Admin">Test Wise</a></li>
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

      <section class="mt-5">
  <div class="container p-4 shadow-lg rounded rounded-4 table-responsive">
                <form action="" method="POST">
                  <table class=" table table-hover table-bordered text-center align-middle ">
                  <thead>
        <tr><th colspan="3" class="bg-light text-primary fs-4">PANEL WISE REGISTRATIONS &nbsp; <i class="bi bi-bookmark-star-fill"></i></th></tr>
    </thead>
                <tr>
                    <td> <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" required/> </td>
                    <td> <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" required/> </td>
                    <td><input type="submit" class="btn btn-outline-primary" name="submit" value="Generate Report"> </td> 
                  </tr>
                
                </table>
                </form> 
  </div>
      </section>

 
      <section class="pt-5">
  <div class="container p-4 shadow-lg rounded rounded-4 table-responsive">
    
<table class=" table table-hover table-bordered text-center align-middle  animate__animated animate__bounceInDown">
<tr>
<td>
<div id="div1">
<?php  
  $i=1;
  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {   
     $output = '';  
      $query = " 
           SELECT * FROM patient  
           WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_mode = '4' group by p_id";  
      $result = mysqli_query($conn, $query);  
     ?>
       		    
              
            <br>
            <table class="table-responsive table table-hover table-bordered text-center align-middle ">
            <tr>
            <th colspan='9' class="bg-light text-primary fs-5">Panel Wise Registrations <br> Report Results Duration : <?php echo $_POST["from_date"].' to '.$_POST["to_date"]; ?>
            </th>
             </tr>
                <tr>  
                     <th>SL.NO</th>  
                     <th>Test Location</th>  
                     <th>rT-PCR</th>  
                     <th>RTK-Antigen</th> 
                     <th>RTK-Antigen<br>(PERKESO)</th>  
                     <th>Antibody <br>IGM/IGG</th>
                     <th>Rapid PCR <br>/Molecular</th>
                     <th>SALIVA PCR</th>
					          <th>Total <br>Registrations</th>  
                </tr>  
      <?php 
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
             ?>
               <tr>
               		<td><?php echo $i; ?> </td>
                    <td><?php //echo $row["p_id"]; 
					$panel = mysqli_query($conn, "SELECT * FROM panel WHERE p_id = '".$row["p_id"]."' ");
					  while ($p_name = mysqli_fetch_array($panel)) 
						{
							echo $p_name['mode'];
													
						}
					
					
					?> </td>
                    <td align="center"><?php 
			  //$sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_mode = '4' AND t_type = '1'");
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$row["p_id"]."' AND t_type = '1'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t1 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
                    <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$row["p_id"]."' AND t_type = '2'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t2 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
                    <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$row["p_id"]."' AND t_type = '3'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t3 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
                    <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$row["p_id"]."' AND t_type = '4'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t4 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
               <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$row["p_id"]."' AND t_type = '5'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t5 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
               <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$row["p_id"]."' AND t_type = '6'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t6 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
                    <td align="center"><?php 
					
					$total = $t1 + $t2 + $t3 + $t4 + $t5 + $t6;
					echo $total; ?> </td>
					
			    </tr>
               
               <?php
			  $i++;
           }  
		   
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="9" class="bg-danger text-white text-center align-middle">No Patient Records Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 } 
  
 ?>
  </div>
 </td>
 </tr>
  <tr>
 <td>
 <button onClick="printContent('div1')" class="btn btn-outline-secondary">Print <i class="bi bi-printer"></i></button></div>
 </td>
 </tr>
 </table>
</div>
      </section>

 