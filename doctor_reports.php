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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
           <title></title>  

      <body>  
          
      
      <header>
            <nav class="navbar navbar-expand-lg shadow-sm  bg-body-tertiary fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="cpanel.php? = Staff Home Page">
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
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="day_wise_super_admin.php? = Day wise reports for super admin">Day Wise</a></li>
                                <li><a class="dropdown-item" href="panel_wise_super_admin.php">Panel Wise</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown animate__animated animate__bounceInDown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item active" href="doctor_reports.php? = Panel Reports Super Admin">Doctor Wise</a></li>
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
                            <ul class="dropdown-menu">
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
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="reset.php?=Passwor Reset">Change Password</a></li>
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
                    <div class="mb-2">
                      <div class="bg-light text-primary border rounded rounded-2 fs-4 fw-bold text-center">DOCTOR REPORTS &nbsp; <i class="bi bi-file-medical-fill"></i></div>
                                </div>
                  <div class="row g-2">
                    <div class="col-lg-3 col-md-6 col-6">
                      <td>
                  <select class="form-control" name="p_id"  required>
                   		 	<option selected value="">Select Panel</option>
                			 	<?php
					  			 	$type = mysqli_query($conn, "SELECT * FROM panel");
					   				 while ($row = mysqli_fetch_array($type)) 
										{
									  	?>
                         	<option value="<?php echo $row['p_id'];?>"><?php echo $row['mode'];}?></option>             
				 		</select>	
                    </td></div>
                    <div class="col-lg-3 col-md-6 col-6"><td> <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" required/> </td></div>
                    <div class="col-lg-3 col-md-6 col-6"><td> <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" required/> </td></div>
                    <div class="col-lg-3 col-md-6 col-6 d-grid"><td><input type="submit" class="btn btn-outline-primary" name="submit" value="Generate Invoice"> </td> </div>
                  </div>                
                </form> 
  </div>
      </section>

 
      <section class="pt-5 animate__animated animate__bounceInDown">
  <div class="container p-4 shadow-lg rounded rounded-4 table-responsive">
                <table class="table table-bordered text-center align-middle ">
<tr>
<td>
<div id="div1">
<!-- <style>
#tb {
  font-family: "cambria";
  border-collapse: collapse;
  width: 900px;
}

#tb td {
  border: 1px solid #ddd;
  padding: 8px;
  font-size: 12px;
}

#tb tr:nth-child(even){background-color: #f2f2f2;}


#tb th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #3db2e1;
  color: white;
  font-size: 12px;
}
</style> -->
<?php  
  $i=1;
  
 if(isset($_POST["from_date"], $_POST["to_date"], $_POST["p_id"]) and !empty($_POST['p_id']))  
 {   
     $output = '';  
      $query = " 
           SELECT * FROM patient  
           WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$_POST["p_id"]."'";  
      $result = mysqli_query($conn, $query);  
     ?>
       		    
              <table class="table table-bordered animate__animated animate__bounceInDown" id="tb">
              <tr>
            <td colspan="3" class="float-start text-primary fs-5"> KLINIK SP GROUP CARE</td>
            <td class="float-right text-primary">INVOICE</td>
            </tr> 
            <tr>
            <td> 2A-1,7,JALAN RAWANG MUTIARA 3,RAWANG MUTIARA BUSINESS CENTER</td>
            
            <td width="150" rowspan="4" align="center"><img src="img/Sp-cov-19-logo care1.png" width="100" height="auto"></td>
            </td></tr>
            <tr>
            <td> 48000 RAWANG, SELANGOR, MALAYSIA</td>
            </tr>
            <tr>
            <td> TEL: 03-6091 7753 FAX: 03-6093 7753 hello@spcaregroup.com</td>
            </tr>
            <tr>
            <td style="text-align:left; color:blue; font-size:100%;"><strong> BILL TO</strong></td>
            </tr>
            <tr>
            <?php 
			  $panel = mysqli_query($conn, "SELECT * FROM panel WHERE p_id = '".$_POST["p_id"]."'");
					  while ($row1 = mysqli_fetch_array($panel)) 
						{
							$name = $row1['mode'];
							$address = $row1['address'];
							$street = $row1['street'];
							$contact = $row1['contact'];
							
						}
			   ?>
            <td colspan="4" style="text-align:left;"> NAME : <?php echo $name;?><span style="float:right;">Bill Date : &nbsp; <?php echo date("Y.m.d");?></td>
            </tr>
            <tr>
            <?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(*) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$_POST["p_id"]."'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							$total = $row1['COUNT(*)'];
							
						}
			   ?>
            <?php 
					$t_sql1 = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$_POST["p_id"]."' AND t_type ='1'");
					  while ($row1 = mysqli_fetch_array($t_sql1)) 
						{
							$total1 = $row1['COUNT(t_type)'];
							$no1 = $total1;
						}
						$t_sql2 = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$_POST["p_id"]."' AND t_type ='2'");
					  while ($row2 = mysqli_fetch_array($t_sql2)) 
						{
							$total2 = $row2['COUNT(t_type)'];
							$no2 = $total2;
						}
						$t_sql3 = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$_POST["p_id"]."' AND t_type ='3'");
					  while ($row3 = mysqli_fetch_array($t_sql3)) 
						{
							$total3 = $row3['COUNT(t_type)'];
							$no3 = $total3;
						}
						$t_sql4 = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$_POST["p_id"]."' AND t_type ='4'");
					  while ($row4 = mysqli_fetch_array($t_sql4)) 
						{
							$total4 = $row4['COUNT(t_type)'];
							$no4 = $total4;
						}
												
					?>
          <?php
		  			$cost1 = mysqli_query($conn, "SELECT * FROM test_cost WHERE p_id = '".$_POST["p_id"]."' AND test_id = '1'");
					  while ($c_row1 = mysqli_fetch_array($cost1)) 
						{
							$p_cost1 = $c_row1['cost'];
							$t_cost1 = $p_cost1;
						}
						$cost2 = mysqli_query($conn, "SELECT * FROM test_cost WHERE p_id = '".$_POST["p_id"]."' AND test_id = '2'");
					  while ($c_row2 = mysqli_fetch_array($cost2)) 
						{
							$p_cost2 = $c_row2['cost'];
							$t_cost2 = $p_cost2;
						}
						$cost3 = mysqli_query($conn, "SELECT * FROM test_cost WHERE p_id = '".$_POST["p_id"]."' AND test_id = '3'");
					  while ($c_row3 = mysqli_fetch_array($cost3)) 
						{
							$p_cost3 = $c_row3['cost'];
							$t_cost3 = $p_cost3;
						}
						$cost4 = mysqli_query($conn, "SELECT * FROM test_cost WHERE p_id = '".$_POST["p_id"]."' AND test_id = '1'");
					  while ($c_row4 = mysqli_fetch_array($cost4)) 
						{
							$p_cost4 = $c_row4['cost'];
							$t_cost4 = $p_cost4;
						}
		  			$amount = ($no1* $t_cost1) + ($no2* $t_cost2) + ($no3* $t_cost3) + ($no4* $t_cost4);
		  ?>
            <td colspan="4"> ADDRESS : <?php echo $address.'-'.$street;?><span style="float:right;">Invoice :<?php echo $total.'0'.$amount?></td>
            </tr>
            <tr>
            <td colspan="4"> PHONE : <?php echo $contact;?></td>
            </tr>
            <tr>
            <td colspan="4" style="text-align:center; color:blue; font-size:100%;"> DESCRIPTION</td>
            </tr>
            <tr>
            <td colspan="4"> <span style="float:right;">Invoice Duration : From date <?php echo $_POST["from_date"]?> - To date : <?php echo $_POST["to_date"]?>
           
            </td>
            </tr>
            <tr>
            
            <td colspan="4"> <span style="float:right;">Total no.of Patients registered : <?php echo $total; ?>
						  
            </td>
            </tr>
            <tr>
            <td colspan="4"> <span style="float:right;">Total amount to be caluculated : <?php echo $amount;?></td>       
            </tr>
            <tr>
            <td colspan="4">COMMENTS:</td>       
            </tr>
            <tr>
            <td colspan="4" class="text-muted">1.Total Payment Due in 30 days. <br> 2. Please include invoice number on your check. <br> 3.Make all payments to your company name.</td>       
            </tr>
            </tr>
            </table> 
            <br>
           <table id="tb" class="table table-bordered align-middle">  
                <tr>  
                     <th class="bg-light" width="20" align="center">SL.NO</th>  
                     <th class="bg-light" width="100">ICNO</th>  
                     <th class="bg-light" width="150">NAME</th>  
                     <th class="bg-light" width="50">GENDER</th> 
                     <th class="bg-light" width="50">TEST MODE</th>  
                     <th class="bg-light" width="50">TEST COST</th>
					           <th class="bg-light" width="50">DATE</th>  
                </tr>  
      <?php 
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
             ?>
               <tr>
               		<td><?php echo $i; ?> </td>
                    <td><?php echo $row['icno']; ?> </td>
                    <td><?php echo $row['f_name']; ?> </td>
                    <td><?php echo $row['gender']; ?> </td>
                    <td><?php 
					$mode = mysqli_query($conn, "SELECT * FROM test_type where id = '".$row["t_type"]."'");
					    while ($type = mysqli_fetch_array($mode)) 
						{
							echo $type["test_type"];
							$test_id = $type["id"];
						}
									
					?> </td>
                    <td><?php 
					$cost = mysqli_query($conn, "SELECT * FROM test_cost where p_id = '".$row["p_id"]."' AND test_id='".$test_id."'");
					    while ($t_cost = mysqli_fetch_array($cost)) 
						{
							echo $t_cost["cost"];
							
						}
						//echo sum($t_cost["cost"]);
					?> 
                    </td>
                    <td><?php echo $row['reg_date']; ?> </td>
					
			    </tr>
               
               <?php
			  $i++;
           }  
		   
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="7"><center>No Patient Records Found</center></td>  
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
 <button onClick="printContent('div1')" class="btn btn-outline-primary">Print Report</button></div>
 </td>
</tr>
 </table>
</div>
      </section>