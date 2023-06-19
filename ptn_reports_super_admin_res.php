<?php
include "header_super_admin.php";
include_once("conn.php");
//include_once "left_menu_emp1.php";
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

    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

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
                            <li class="nav-item  ">
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
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item " href="doctor_reports.php? = Panel Reports Super Admin">Doctor Wise</a></li>
                                <li><a class="dropdown-item" href="report_super_admin_staff_wise.php? = Registration Date xrd336efe">Employee Wise</a></li>
                                <li><a class="dropdown-item" href="report_super_admin_day_wise.php? = Patient Reports Super Admin">Test Wise</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="reports_panel.php? = Panel Reports Super Admin">Invoice</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown animate__animated animate__bounceInDown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Patient
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item " href="new_patient_super_admin.php? = Patient Creation">New Patient</a></li>
                                <li><a class="dropdown-item" href="patient_data_level_super_admin.php? = Patient Details">Patient Details</a></li>
                                <li><a class="dropdown-item" href="update_del_super_admin.php? = Registration Date xrd336efe">Update / Delete</a></li>                                
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="patient_data_level_II_super_admin.php? = Sample Kit Validate">Kit Validate</a></li>
                                <li><a class="dropdown-item active" href="ptn_reports_super_admin.php? = Patient Reports">Test Results</a></li>
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

<section class="mt-5 ">
  <div class="container p-4 table-responsive shadow-lg rounded rounded-4">
<table class="table table-bordered">
        <tr>
          <th class="bg-light text-center text-primary fs-4">PATIENT REPORTS &nbsp; <i class="bi bi-file-medical-fill"></i></th>        
        <tr>
        	<td align="right">
           <form action="ptn_reports_super_admin_res.php? = Reports" method="post" >
               Patient Uniq ID No: 
                 <input type="text" class="tb3" name="validation" placeholder="Enter Uniq ID" required="">
                <input type="submit" class="btn btn-secondary" name="submit" value="Search">
            </form>
            </td>
        <tr>
        </table>
<?php
//session_start();
if(isset($_POST['submit']))
{
$uniq = $_POST['validation'];
$res=mysqli_query($conn,"select * from patient where validation='".$uniq."'");
if (mysqli_num_rows($res) > 0)
        {
						while($row=mysqli_fetch_array($res))
                        {
						$f_name = $row["f_name"];
						$l_name = $row["l_name"];
						$dob = $row["dob"];
						$icno = $row["icno"];
						$type = $row["t_type"];
						$test_date = $row["reg_date"];
						$gen = $row["gender"];
						$validation = $row["validation"];
           				$p_id = $row["id"];
			$date = mysqli_query($conn, "SELECT * FROM kit_approved WHERE kit_id = '".$p_id."'");
			while($row_d=mysqli_fetch_array($date))
                        {
                        $k_date = $row_d["date"];
						//echo $k_date;
                        }		
		}
						
?>

<table id="des" class="table table-bordered table-hover text-center align-middle mt-3  animate__animated animate__bounceInDown">

  <tr>
    <td height="35" colspan="3" align="left" valign="middle" class="bg-light"><strong>Name :</strong> <?php echo $f_name.'&nbsp;'.$l_name;?></td>
  </tr>
  <tr>       
    <td height="35"width="500"><strong>MRN :</strong> <?php echo $icno;?></td>
    <td><strong>Gender :</strong> <?php echo strtoupper($gen);?></td>
  </tr>
  <tr>
  <?php
	$today = date("Y-m-d");
	$diff = date_diff(date_create($dob), date_create($today));
?>
  
    <td height="35"><strong>Age :</strong> <?php echo ''.$diff->format('%y');?></td>
    <td><strong>DOB :</strong> <?php echo $dob;?></td>
  </tr>
  <tr>
    <td height="35"><strong>National ID :</strong><?php echo $icno;?> </td>
    <td><strong>Doctor :</strong>
      <?php
      $doc=mysqli_query($conn,"select * from results where r_id='".$p_id."'");
            while($row=mysqli_fetch_array($doc))
                        {
                        $name = $row["uid"];
                          $name=mysqli_query($conn,"select * from authenticate where user_id='".$name."'");
                            while($row1=mysqli_fetch_array($name))
                        {
                                echo $row1["name"];
								$doctor = $row1["name"];
								
                        }  
                        }
                         ?>

    </td>
  </tr>
</table>

<table id="des" class="table table-bordered table-hover text-center align-middle mt-3 animate__animated animate__bounceInDown">
  <tr>       
    <td height="35"width="250" align="center" class="bg-light fw-bold">Test ID</td>
    <td height="35"width="250" align="center" class="bg-light fw-bold">Test Obtained</td>
    <td height="35"width="250" align="center" class="bg-light fw-bold">Collection Date </td>
    <td height="35"width="250" align="center" class="bg-light fw-bold">Test Status</td>
	<!--<td height="35"width="250" align="center">TEST RESULT</td>!-->
  </tr>
  <tr>
    <td height="35"width="250" align="center"><?php echo $validation;?> </td>
    
   <!--  test type declaration  !--> 
    <td height="35"width="250" align="center"> <?php //echo $type;
	$type=mysqli_query($conn,"select * from test_type where id='".$type."'");
						while($row=mysqli_fetch_array($type))
                        {
						echo $row["test_type"];
						$t_type = $row["test_type"];
						}
?>
	
	
	</td>
    <td height="35"width="250" align="center"><?php echo $test_date;?> </td>
	<td height="35"width="250" align="center"><?php //echo $icno;
    $results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND validation ='".$uniq."'");
      $numrows = mysqli_num_rows($results);
    if($numrows == 0)
      {
        echo "<font color=red>RESULT PENDING</font>";
      }
      else
      {
        $res_q = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."'");
        while($row2=mysqli_fetch_array($res_q))
                        {
			//$results = $row1["r_case"];
            switch($row2["r_case"])
            {
              case 1: echo "<font color=red>POSITIVE</font>";
              break;
              case 2: echo "<font color=green>NEGATIVE</font>";
              break;
			  case 3: echo "<font color=red>INCONCLUSIVE</font>";
              break;
            }
            
            }

      }

  ?> </td>
   
  </tr>
</table>

<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
<table class="table">
<tr>
<td align="center">
<button onClick="printContent('div1')" class="btn btn-outline-primary">Print Report <i class="bi bi-printer"></i></button></div>
</td>
</tr>
</table>


 <div id="div1">

<br>

  <?php
  //if(array_key_exists('report', $_POST)) { 
        $results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."'");
     	 $numrows = mysqli_num_rows($results);
    		if($numrows == 0)
      			{
        			echo "<center><font color=red>RESULT PENDING</font></center>";
     			}
        else
		
		{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '1' && r_case ='1'");
			while($row=mysqli_fetch_array($results))
			{
				$e_gene = $row['e_gene'];
				$rdrp =  $row['rdrp'];
				$ngene = $row['ngene'];
				$d_date = $row['date'];
				$regno = $row['validation'];
				
				echo "<br>";
			echo "<table class='table text-center table-bordered'>";
			echo "<tr>";
			echo "<td>";
			echo"<tr>";
		echo"<td colspan='6' class='text-center fs-4 text-primary'>PATIENT REPORT</td>";
		 echo" </tr>";
		 echo"<tr>";
		 echo"<td ><b>Name </td>";
		 echo"<td colspan='2'><b>: $f_name &nbsp; $l_name</td>";
		 echo"<td ><b>Reg.No.</td>";
		 echo"<td ><b>: $regno</td>";
   		 echo"</tr>";
 		 echo" <tr>";
     	 echo"<td><b>IC No </td>";
   		 echo" <td><b>: $icno</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td><b>Collected</td>";
    	 echo"<td><b>: $test_date</td>";
  		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>DOB </td>";
		 echo"<td><b>: $dob</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Received</td>";
		 echo"<td><b>: $k_date</td>";
 		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>Age/Sex </td>";
		 echo"<td><b>: $gen</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Reported</td>";
		 echo"<td><b>: $d_date</td>";
  		 echo"</tr>";
  		  echo"<tr>";
     	 echo"<td style='vertical-align:top'><strong>Consultant:</strong></td>";
     	 echo"<td colspan='5'><p><strong>$doctor</strong><br>
   		 <strong>KLINIK SP CARE, 2A-1-7 &amp; 2A-1-8 JALAN RAWANG  MUTIARA 3, RAWANG MUTIARA BUSINESS CENTRE 2, RAWANG, 48000</strong></p></td>";
 		  echo" </tr>";

	      echo"<tr>";
    	  echo"<td class='bg-light'><strong>TEST</strong></td>";
				echo" <td class='bg-light'><strong>RESULT</strong></td>";
				echo" <td class='bg-light'><strong>FLAG</strong></td>";
				echo" <td class='bg-light'><strong>UNIT</strong></td>";
				echo" <td class='bg-light'><strong>REFERENCE RANGE</strong></td>";
	      echo"</tr>";
		  echo" <tr>";
		  echo"<td><strong>MOLECULER</strong></td>";
		  echo" </tr>";
		  // echo"<tr>";
			//echo" <td colspan='6'>&nbsp;</td>";
		 // echo" </tr>";
		   echo"<tr>";
			 echo"<td colspan='6'><strong>CORONAVIRUS  DISEASE 2019 RNA PCR</strong></td>";
		  echo" </tr>";
		    echo" <tr>";
			 echo"<td colspan='3'>Nature of Specimen</td>";
			echo" <td colspan='3'>Nasopharyngeal and Oropharyngeal Swab</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='3'>SARS-CoV-2 RNA</td>";
			 ?>
			 <td colspan='3'>
             <?php
			 	switch($results)
				{
			 	case 1: echo "<font color=red>DETECTED";
			 		break;
				case 2: echo "Not Detected";
				break;
				}
			 ?>
			 </td>
             <?php
		   echo"</tr>";
		    echo"<tr>";
			 echo"<td colspan='2'><p><strong>Interpretation:</strong></p></td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			echo" <td colspan='6'>Positive for Coronavirus disease 2019 (COVID-19).</td>";
		 	echo" </tr>";
		   echo"<tr>";
			 echo"<td colspan='6'><p align='justify'>This assay is in vitro diagnostic medical device designed for qualitative detection of Coronavirus Disease 2019 (COVID-19) or previously known as Novel Coronavirus 2019 by using real-time reverse transcription PCR. This PCR assay is able to detect E gene, RdRP gene and N gene simultaneously in one single reaction. The detection limit of this assay is 100 RNA copies/reaction and it is CE-IVD certified.</p></td>";
		   echo"</tr>";
		 	 echo" <tr>";
			 echo"<td colspan='2'><strong>Suggestion</strong></td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
		   echo"</tr>";
		  echo" <tr>";
			 echo"<td colspan='6'><align='justify'>Sample with negative for COVID-19 is recommended to further test using our Respiratory  Pathogen Panel (RPP) to rule out  other respiratory pathogen infection.</td>";
		   echo"</tr>";
		    echo" <tr>";
			 echo"<td colspan='2'><strong>Reference:</strong></td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='6'>1.  Guidelines 2019 Novel Coronavirus (2019 nCoV) Management in Malaysia. No.  3/2020</td>";
		   echo"</tr>";
		   
		   echo"<tr>";
			
		      echo"<tr>";
			 echo"<td colspan='6'>Genes detected (Ct value): E gene ($e_gene), RdRP gene ($rdrp), N gene ($ngene)</td>";
			  
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='2'><strong>Test(s)requested:</strong> <strong>COVID19</strong></td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td style='text-align:right' colspan='3'><strong>Report Completed, Please File.</strong></td>";
		  echo" </tr>";
		   echo"<tr>";
			 echo"<td colspan='6'>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			echo" <td colspan='6'><p style=font-size:12px; align='justify'><align='justify'><i>This e-report is  copyrighted and contains confidential medical information of the patient named  above ('patient') that is intended solely for the use of Pantai Premier  Pathology, the patient and the healthcare professional rendering healthcare  services to the patient. The e-report is the property of Pantai Premier  Pathology, and may  not be reproduced or  distributed save as otherwise stated herein in any manner without the express  written permission of Pantai Premier Pathology. Pantai Premier Pathology shall  not be responsible or liable in any manner whatsoever either for the receipt or  non- receipt of the e-report by the patient or any delay thereof for any reason  whatsoever and shall not be held liable for any unauthorized modification of  the e-report. Pantai Premier Pathology assumes no liability for any errors or  omissions in the content of this e-report. Pantai Premier Pathology does not  assume any risk for your use of any information provided in this e-report.  References to specific treatments, products, or services do not constitute or  imply recommendation by Pantai Premier Pathology and the patient is recommended  to consult a healthcare professional of his/her choice to interpretthee-report. In case of any discrepancy found between thee-report and the original report, the original shall be deemed final.</i></P></td>";
		   echo"</tr>";
		  echo" <tr>";
		  echo"<td colospan='2'><img src='img/ptn-reports.png' width='95' height='95'></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo" </tr>";
		 		  
				}
		  
	}
	?>
    
    <!-----------------!-->
    
    
    <?php
	{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '1' && r_case ='2'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
				$regno = $row['validation'];
			echo "<br>";
			echo "<br>";
			echo "<table class='table text-center table-bordered'>";
			echo "<tr>";
			echo "<td>";
			
			echo"<tr>";
			echo"<td colspan='6' class='text-center fs-4 text-primary'>PATIENT REPORT</td>";
			 echo" </tr>";
	     echo"<tr>";
		 echo"<td><b>Name </td>";
		 echo"<td ><b>: $f_name &nbsp; $l_name</td>";
		 echo"<td ><b>Reg.No.</td>";
		 echo"<td ><b>: $regno</td>";
   		 echo"</tr>";
 		 echo" <tr>";
     	 echo"<td><b>IC No </td>";
   		 echo" <td><b>: $icno</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td><b>Collected</td>";
    	 echo"<td><b>: $test_date</td>";
  		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>DOB </td>";
		 echo"<td><b>: $dob</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Received</td>";
		 echo"<td><b>: $k_date</td>";
 		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>Age/Sex </td>";
		 echo"<td><b>: $gen</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Reported</td>";
		 echo"<td><b>: $d_date</td>";
  		 echo"</tr>";
  		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
    	 echo" <td>&nbsp;</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td>&nbsp;</td>";
  		 echo" </tr>";
   		 echo"<tr>";
     	 echo"<td style='vertical-align:top'><strong>Consultant:</strong></td>";
     	 echo"<td colspan='5'><p><strong>$doctor</strong><br>
   		 <strong>KLINIK SP CARE, 2A-1-7 &amp; 2A-1-8 JALAN RAWANG  MUTIARA 3, RAWANG MUTIARA BUSINESS CENTRE 2, RAWANG, 48000</strong></p></td>";
 		  echo" </tr>";
 		
	      echo"<tr>";
    	  echo"<td><strong>TEST</strong></td>";
		  echo" <td><strong>RESULT</strong></td>";
		  echo" <td><strong>FLAG</strong></td>";
		  echo" <td><strong>UNIT</strong></td>";
		  echo" <td><strong>REFERENCERANGE</strong></td>";
		  echo"<td>&nbsp;</td>";
	      echo"</tr>";

		  echo" <tr>";
		  echo"<td><strong>MOLECULER</strong></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo" </tr>";
		 
		   echo"<tr>";
			 echo"<td colspan='6'><p><strong>CORONAVIRUS  DISEASE 2019 RNA PCR</strong></p></td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='3'>Nature of Specimen</td>";
			echo" <td colspan='3'>Nasopharyngeal and Oropharyngeal Swab</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='3'>SARS-CoV-2RNA</td>";
			 echo"<td colspan='3'><font color='green'><b><NotDetected</b>NotDetected</td>";
		   echo"</tr>";

		   echo"<tr>";
			 echo"<td colspan='2'><strong>Interpretation:</strong></td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='6'><align='justify'>Negative for Coronavirus disease  2019 (COVID-19).A single negative  result, particularly if the samples  were collected from an upper  respiratory tract does not exclude the  infection. Repeat sampling and testing. Lower respiratory tract specimen is  strongly recommended in severe or progressive disease (1).</td>";
		   echo"</tr>";
		 
		   echo"<tr>";
			echo" <td colspan='6'><p align='justify'>This assay is in vitro diagnostic  medical device designed for qualitative  detection of Coronavirus Disease  2019 (COVID-19) or previously known as  Novel Coronavirus 2019 by using real-time reverse transcription PCR. This PCR  assay is able to detect E gene, RdRP gene and N gene simultaneously in one single reaction. The detection limit of this assay is 100 RNA copies/reactionand  it is CE-IVD certified.</p></td>";
		   echo"</tr>";
		     echo" <tr>";
			 echo"<td colspan='2'><strong>Suggestion</strong></td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
		   echo"</tr>";
		  echo" <tr>";
			 echo"<td colspan='6'> <align='justify'>Sample with negative for COVID-19 is recommended to further test using our Respiratory  Pathogen Panel (RPP) to rule out  other respiratory pathogen infection.</td>";
		   echo"</tr>";
		  
		  echo" <tr>";
			 echo"<td colspan='2'><strong>Reference:</strong></td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='6'><p>1.  Guidelines 2019 Novel Coronavirus (2019 nCoV) Management in Malaysia. No.  3/2020</p></td>";
		   echo"</tr>";
		  
		  		   
		   echo"<tr>";
			 echo"<td colspan='2'><strong>Test(s)requested:</strong> <strong>COVID19</strong></td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td style='text-align:center' colspan='3'><strong>Report Completed, Please File.</strong></td>";
		  echo" </tr>";
		   echo"<tr>";
			 echo"<td colspan='6'>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			echo" <td colspan='6'> <p style=font-size:12px; align='justify'><i>This e-report is  copyrighted and contains confidential medical information of the patient named  above ('patient') that is intended solely for the use of Pantai Premier  Pathology, the patient and the healthcare professional rendering healthcare  services to the patient. The e-report is the property of Pantai Premier  Pathology, and may  not be reproduced or  distributed save as otherwise stated herein in any manner without the express  written permission of Pantai Premier Pathology. Pantai Premier Pathology shall  not be responsible or liable in any manner whatsoever either for the receipt or  non- receipt of the e-report by the patient or any delay thereof for any reason  whatsoever and shall not be held liable for any unauthorized modification of  the e-report. Pantai Premier Pathology assumes no liability for any errors or  omissions in the content of this e-report. Pantai Premier Pathology does not  assume any risk for your use of any information provided in this e-report.  References to specific treatments, products, or services do not constitute or  imply recommendation by Pantai Premier Pathology and the patient is recommended  to consult a healthcare professional of his/her choice to interpretthee-report.In  case of any discrepancy found between thee-reportand the original report,the original shall be deemed final.</i></p></td>";
		   echo"</tr>";
		  echo" <tr>";
		  echo"<td colospan='2'><img src='img/ptn-reports.png' width='95' height='95'></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		   echo" </tr>";
				}
		  ?><!----------------------!-->
           <?php
	
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '1' && r_case ='3'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
				$regno = $row['validation'];
				$ct_value = $row['ct_value'];
			echo "<br>";
			echo "<br>";
			echo "<table class='table text-center table-bordered' >";
			echo "<tr>";
			echo "<td>";
			
			echo"<tr>";
			echo"<td colspan='6' class='text-center fs-4 text-primary'>PATIENT REPORT</td>";
			 echo" </tr>";
	     echo"<tr>";
		 echo"<td width='128'><b>Name </td>";
		 echo"<td colspan='2'><b>: $f_name &nbsp; $l_name</td>";
		 echo"<td width='156'><b>Reg.No.</td>";
		 echo"<td width='215'><b>: $regno</td>";
   		 echo"</tr>";
 		 echo" <tr>";
     	 echo"<td><b>IC No </td>";
   		 echo" <td><b>: $icno</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td><b>Collected</td>";
    	 echo"<td><b>: $test_date</td>";
  		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>DOB </td>";
		 echo"<td><b>: $dob</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Received</td>";
		 echo"<td><b>: $k_date</td>";
 		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>Age/Sex </td>";
		 echo"<td><b>: $gen</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Reported</td>";
		 echo"<td><b>: $d_date</td>";
  		 echo"</tr>";
  		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
    	 echo" <td>&nbsp;</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td>&nbsp;</td>";
  		 echo" </tr>";
   		 echo"<tr>";
     	 echo"<td style='vertical-align:top'><strong>Consultant:</strong></td>";
     	 echo"<td colspan='5'><p><strong>$doctor</strong><br>
   		 <strong>KLINIK SP CARE, 2A-1-7 &amp; 2A-1-8 JALAN RAWANG  MUTIARA 3, RAWANG MUTIARA BUSINESS CENTRE 2, RAWANG, 48000</strong></p></td>";
 		  echo" </tr>";
 		
	      echo"<tr>";
    	  echo"<td><strong>TEST</strong></td>";
		  echo" <td><strong>RESULT</strong></td>";
		  echo" <td><strong>FLAG</strong></td>";
		  echo" <td><strong>UNIT</strong></td>";
		  echo" <td><strong>REFERENCERANGE</strong></td>";
		  echo"<td>&nbsp;</td>";
	      echo"</tr>";

		  echo" <tr>";
		  echo"<td><strong>MOLECULER</strong></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo" </tr>";
		 
		   echo"<tr>";
			 echo"<td colspan='6'><p><strong>CORONAVIRUS  DISEASE 2019 RNA PCR</strong></p></td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='3'>NatureofSpecimen</td>";
			echo" <td colspan='3'>Nasopharyngeal and Oropharyngeal Swab</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='3'>SARS-CoV-2RNA</td>";
			 echo"<td colspan='3'>Inconclusive</td>";
		   echo"</tr>";
		 echo" <tr>";
			 echo"<td colspan='3'>Genes Detected:</td>";
			echo" <td colspan='3'>Ct value</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='3'>N gene</td>";
			 echo"<td colspan='3'> $ct_value</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='2'><strong>Interpretation:</strong></td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='6'><align='justify'>Result is inconclusive due to only single gene detected. Please send in new swab sample if clinically indicated.</td>";
		   echo"</tr>";
		 
		   echo"<tr>";
			echo" <td colspan='6'><p align='justify'>This assay is in vitro diagnostic  medical device designed for qualitative  detection of Coronavirus Disease  2019 (COVID-19) or previously known as  Novel Coronavirus 2019 by using real-time reverse transcription PCR. This PCR  assay is able to detect E gene, RdRP gene and N gene simultaneously in one single reaction. The detection limit of this assay is 100 RNA copies/reactionand  it is CE-IVD certified.</p></td>";
		   echo"</tr>";
		     echo" <tr>";
			 echo"<td colspan='2'><strong>Suggestion</strong></td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
		   echo"</tr>";
		  echo" <tr>";
			 echo"<td colspan='6'> <align='justify'>Sample with negative for COVID-19 is recommended to further test using our Respiratory  Pathogen Panel (RPP) to rule out  other respiratory pathogen infection.</td>";
		   echo"</tr>";
		  
		  echo" <tr>";
			 echo"<td colspan='2'><strong>Reference:</strong></td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='6'><p>1.  Guidelines 2019 Novel Coronavirus (2019 nCoV) Management in Malaysia. No.  3/2020</p></td>";
		   echo"</tr>";
		  
		  		   
		   echo"<tr>";
			 echo"<td colspan='2'><strong>Test(s)requested:</strong> <strong>COVID19</strong></td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td style='text-align:center' colspan='3'><strong>Report Completed, Please File.</strong></td>";
		  echo" </tr>";
		   echo"<tr>";
			 echo"<td colspan='6'>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			echo" <td colspan='6'> <p style=font-size:12px; align='justify'><i>This e-report is  copyrighted and contains confidential medical information of the patient named  above ('patient') that is intended solely for the use of Pantai Premier  Pathology, the patient and the healthcare professional rendering healthcare  services to the patient. The e-report is the property of Pantai Premier  Pathology, and may  not be reproduced or  distributed save as otherwise stated herein in any manner without the express  written permission of Pantai Premier Pathology. Pantai Premier Pathology shall  not be responsible or liable in any manner whatsoever either for the receipt or  non- receipt of the e-report by the patient or any delay thereof for any reason  whatsoever and shall not be held liable for any unauthorized modification of  the e-report. Pantai Premier Pathology assumes no liability for any errors or  omissions in the content of this e-report. Pantai Premier Pathology does not  assume any risk for your use of any information provided in this e-report.  References to specific treatments, products, or services do not constitute or  imply recommendation by Pantai Premier Pathology and the patient is recommended  to consult a healthcare professional of his/her choice to interpretthee-report.In  case of any discrepancy found between thee-reportand the original report,the original shall be deemed final.</i></p></td>";
		   echo"</tr>";
		  echo" <tr>";
		  echo"<td colospan='2'><img src='img/ptn-reports.png' width='95' height='95'></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		   echo" </tr>";
				}
		  ?>
           <!-------------------------!-->  
          <?php
		  echo "<br>";
		{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '2' && r_case ='1'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
				$regno = $row['validation'];
			
			echo "<table class='table text-center table-bordered' >";
			
			
		echo"<tr>";
		echo"<td colspan='6' class='text-center fs-4 text-primary'>PATIENT REPORT</td>";
		 echo" </tr>";
	     echo"<tr>";
		 echo"<td width='128'><b>Name</td>";
		 echo"<td colspan='2'><b>: $f_name &nbsp; $l_name</td>";
		 echo"<td width='156'><b>Reg.No.</td>";
		 echo"<td width='215'><b>: $regno</td>";
   		 echo"</tr>";
 		 echo" <tr>";
     	 echo"<td><b>IC No </td>";
   		 echo" <td><b>: $icno</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td><b>Collected</td>";
    	 echo"<td><b>: $test_date</td>";
  		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>DOB </td>";
		 echo"<td><b>: $dob</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Received</td>";
		 echo"<td><b>: $k_date</td>";
 		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>Age/Sex </td>";
		 echo"<td><b>: $gen</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Reported</td>";
		 echo"<td><b>: $d_date</td>";
  		 echo"</tr>";
  		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
    	 echo" <td>&nbsp;</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td>&nbsp;</td>";
  		 echo" </tr>";
   		 echo"<tr>";
     	 echo"<td style='vertical-align:top'><strong>Consultant:</strong></td>";
     	 echo"<td colspan='5'><p><strong>$doctor</strong><br>
   		 <strong>KLINIK SP CARE, 2A-1-7 &amp; 2A-1-8 JALAN RAWANG  MUTIARA 3, RAWANG MUTIARA BUSINESS CENTRE 2, RAWANG, 48000</strong></p></td>";
 		  echo" </tr>";
 		
	      echo"<tr>";
    	  echo"<td><strong>TEST</strong></td>";
		  echo" <td><strong>RESULT</strong></td>";
		  echo" <td><strong>FLAG</strong></td>";
		  echo" <td><strong>UNIT</strong></td>";
		  echo" <td><strong>REFERENCERANGE</strong></td>";
		  echo"<td>&nbsp;</td>";
	      echo"</tr>";

		  echo" <tr>";
		  echo"<td colspan='3'><strong>IMMUNOLOGY &SEROLOGY</strong></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo" </tr>";
		 
		   echo"<tr>";
			 echo"<td colspan='6'><p><strong>COVID-19 AntigenTest</strong></p></td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='2'>NatureofSpecimen</td>";
			echo" <td colspan='3'>NasopharyngealSwab</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='2'>COVID-19(SARS-CoV-2)Antigen</td>";
			 echo"<td colspan='3'><font color='red'><b>Positive</b></td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";

		   echo"<tr>";
			 echo"<td colspan='2'><strong><p>Comments:</p></strong></td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='6' align='justify'>1.	This test is intended as an aid to early diagnosis of SARS-CoV-2 infection in patient with clinical symptoms to SARS-CoV-2infection.<br>
2.	Children tend to shed virus for longer periods of time than adults, which may result in differences in sensitivity between adults and children.<br>
3.	Positive results do not rule out co-infections with other pathogens and negative results are not intended to rule in other coronavirus infection exceptSARS-CoV-1.<br>
4.	More specific alternative diagnosis methods should be performed in order to obtain the confirmation of SARS-CoV-2 infection. Test results should be considered in conjunction with clinical history and other dataavailable.
</td>";
		   echo"</tr>";
		 
		     echo" <tr>";
			 echo"<td colspan='2'><strong><p>Methodology</p></strong></td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
		   echo"</tr>";
		  echo" <tr>";
			 echo"<td colspan='6'> <align='justify'>This is a rapid chromatographic immunoassay for the qualitative detection of specific antigens to SARS- CoV-2 present in human nasopharynx.</td>";
		   echo"</tr>";
		  
		  echo" <tr>";
			 echo"<td colspan='2'><strong><p>Disclaimer:</p></strong></td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='6'><p>1. Guideline on COVID-19 Testing using Antigen Rapid Test Kit (RTK-Ag) for the Health Facilities, Ministry of Health version 4.0</p></td>";
		   echo"</tr>";
		  echo" <tr>";
		  echo"<td colospan='2'><img src='img/ptn-reports.png' width='75' height='75'></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		   echo" </tr>";
				}
	}
		  ?>
          
               
            <?php
			
		{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '2' && r_case ='2'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
				$regno = $row['validation'];
			
			echo "<table class='table text-center table-bordered'>";
			echo "<tr>";
			echo "<td>";
			echo"<tr>";
			echo"<td colspan='6' class='text-center fs-4 text-primary'>PATIENT REPORT</td>";
			 echo" </tr>";
	     echo"<tr>";
		 echo"<td width='128'><b>Name</td>";
		 echo"<td colspan='2'><b>: $f_name &nbsp; $l_name</td>";
		 echo"<td width='156'><b>Reg.No.</td>";
		 echo"<td width='215'><b>: $regno</td>";
   		 echo"</tr>";
 		 echo" <tr>";
     	 echo"<td><b>IC No </td>";
   		 echo" <td><b>: $icno</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td><b>Collected</td>";
    	 echo"<td><b>: $test_date</td>";
  		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>DOB </td>";
		 echo"<td><b>: $dob</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Received</td>";
		 echo"<td><b>: $k_date</td>";
 		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>Age/Sex </td>";
		 echo"<td><b>: $gen</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Reported</td>";
		 echo"<td><b>: $d_date</td>";
  		 echo"</tr>";
  		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
    	 echo" <td>&nbsp;</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td>&nbsp;</td>";
  		 echo" </tr>";
   		 echo"<tr>";
     	 echo"<td style='vertical-align:top'><strong>Consultant:</strong></td>";
     	 echo"<td colspan='5'><p><strong>$doctor</strong><br>
   		 <strong>KLINIK SP CARE, 2A-1-7 &amp; 2A-1-8 JALAN RAWANG  MUTIARA 3, RAWANG MUTIARA BUSINESS CENTRE 2, RAWANG, 48000</strong></p></td>";
 		  echo" </tr>";
 		
	      echo"<tr>";
    	  echo"<td><strong>TEST</strong></td>";
		  echo" <td><strong>RESULT</strong></td>";
		  echo" <td><strong>FLAG</strong></td>";
		  echo" <td><strong>UNIT</strong></td>";
		  echo" <td><strong>REFERENCERANGE</strong></td>";
		  echo"<td>&nbsp;</td>";
	      echo"</tr>";

		  echo" <tr>";
		  echo"<td colspan='3'><strong><p>IMMUNOLOGY &SEROLOGY</p></strong></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo" </tr>";
		 
		   echo"<tr>";
			 echo"<td colspan='6'><p><strong>COVID-19 AntigenTest</strong></p></td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='2'>NatureofSpecimen</td>";
			echo" <td colspan='3'>NasopharyngealSwab</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='2'>COVID-19(SARS-CoV-2)Antigen</td>";
			 echo"<td colspan='3'><font color='green'><b>Negative</b></td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";

		   echo"<tr>";
			 echo"<td colspan='2'><strong><p>Comments:</p></strong></td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='6' align='justify'>1.	This test is intended as an aid to early diagnosis of SARS-CoV-2 infection in patient with clinical   symptoms to SARS-CoV-2infection.<br>
2.	Children tend to shed virus for longer periods of time than adults, which may result in differences in sensitivity between adults and children.<br>
3.	Positive results do not rule out co-infections with other pathogens and negative results are not intended to rule in other coronavirus infection exceptSARS-CoV-1.<br>
4.	More specific alternative diagnosis methods should be performed in order to obtain the confirmation of SARS-CoV-2 infection. Test results should be considered in conjunction with clinical history and other dataavailable.
</td>";
		   echo"</tr>";
		 
		     echo" <tr>";
			 echo"<td colspan='2'><strong><p>Methodology</p></strong></td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
		   echo"</tr>";
		  echo" <tr>";
			 echo"<td colspan='6'> <align='justify'>This is a rapid chromatographic immunoassay for the qualitative detection of specific antigens to SARS- CoV-2 present in human nasopharynx.</td>";
		   echo"</tr>";
		  
		  echo" <tr>";
			 echo"<td colspan='2'><strong><p>Disclaimer:</p></strong></td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='6'><p>1. Guideline on COVID-19 Testing using Antigen Rapid Test Kit (RTK-Ag) for the Health Facilities, Ministry of Health version 4.0</p></td>";
		   echo"</tr>";
		  echo" <tr>";
		  echo"<td colospan='2'><img src='img/ptn-reports.png' width='95' height='95'></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		   echo" </tr>";
				}
	}
		  ?>
          
          <!------!-->
           <?php
		 
		{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '3' && r_case ='1'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
				$regno = $row['validation'];
			
			echo "<table class='table text-center table-bordered'>";
			
			
			echo"<tr>";
			echo"<td colspan='6' class='text-center fs-4 text-primary'>PATIENT REPORT</td>";
			 echo" </tr>";
	     echo"<tr>";
		 echo"<td width='128'><b>Name</td>";
		 echo"<td colspan='2'><b>: $f_name &nbsp; $l_name</td>";
		 echo"<td width='156'><b>Reg.No.</td>";
		 echo"<td width='215'><b>: $regno</td>";
   		 echo"</tr>";
 		 echo" <tr>";
     	 echo"<td><b>IC No </td>";
   		 echo" <td><b>: $icno</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td><b>Collected</td>";
    	 echo"<td><b>: $test_date</td>";
  		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>DOB </td>";
		 echo"<td><b>: $dob</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Received</td>";
		 echo"<td><b>: $k_date</td>";
 		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>Age/Sex </td>";
		 echo"<td><b>: $gen</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Reported</td>";
		 echo"<td><b>: $d_date</td>";
  		 echo"</tr>";
  		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
    	 echo" <td>&nbsp;</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td>&nbsp;</td>";
  		 echo" </tr>";
   		 echo"<tr>";
     	 echo"<td style='vertical-align:top'><strong>Consultant:</strong></td>";
     	 echo"<td colspan='5'><p><strong>$doctor</strong><br>
   		 <strong>KLINIK SP CARE, 2A-1-7 &amp; 2A-1-8 JALAN RAWANG  MUTIARA 3, RAWANG MUTIARA BUSINESS CENTRE 2, RAWANG, 48000</strong></p></td>";
 		  echo" </tr>";
 		
	      echo"<tr>";
    	  echo"<td><strong>TEST</strong></td>";
		  echo" <td><strong>RESULT</strong></td>";
		  echo" <td><strong>FLAG</strong></td>";
		  echo" <td><strong>UNIT</strong></td>";
		  echo" <td><strong>REFERENCERANGE</strong></td>";
		  echo"<td>&nbsp;</td>";
	      echo"</tr>";

		  echo" <tr>";
		  echo"<td colspan='3'><strong>IMMUNOLOGY &SEROLOGY</strong></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo" </tr>";
		 
		   echo"<tr>";
			 echo"<td colspan='6'><p><strong>COVID-19 AntigenTest</strong></p></td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='2'>NatureofSpecimen</td>";
			echo" <td colspan='3'>NasopharyngealSwab</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='2'>COVID-19(SARS-CoV-2)Antigen</td>";
			 echo"<td colspan='3'><font color='red'><b>Positive</b></td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";

		   echo"<tr>";
			 echo"<td colspan='2'><strong><p>Comments:</p></strong></td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='6' align='justify'>1.	This test is intended as an aid to early diagnosis of SARS-CoV-2 infection in patient with clinical symptoms to SARS-CoV-2infection.<br>
2.	Children tend to shed virus for longer periods of time than adults, which may result in differences in sensitivity between adults and children.<br>
3.	Positive results do not rule out co-infections with other pathogens and negative results are not intended to rule in other coronavirus infection exceptSARS-CoV-1.<br>
4.	More specific alternative diagnosis methods should be performed in order to obtain the confirmation of SARS-CoV-2 infection. Test results should be considered in conjunction with clinical history and other dataavailable.
</td>";
		   echo"</tr>";
		 
		     echo" <tr>";
			 echo"<td colspan='2'><strong><p>Methodology</p></strong></td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
		   echo"</tr>";
		  echo" <tr>";
			 echo"<td colspan='6'> <align='justify'>This is a rapid chromatographic immunoassay for the qualitative detection of specific antigens to SARS- CoV-2 present in human nasopharynx.</td>";
		   echo"</tr>";
		  
		  echo" <tr>";
			 echo"<td colspan='2'><strong><p>Disclaimer:</p></strong></td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='6'><p>1. Guideline on COVID-19 Testing using Antigen Rapid Test Kit (RTK-Ag) for the Health Facilities, Ministry of Health version 4.0</p></td>";
		   echo"</tr>";
		  echo" <tr>";
		  echo"<td colospan='2'><img src='img/ptn-reports.png' width='75' height='75'></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		   echo" </tr>";
				}
	}
		  ?>
          
               
            <?php
			
		{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '3' && r_case ='2'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
				$regno = $row['validation'];
			
			echo "<table class='table text-center table-bordered'>";
			echo "<tr>";
			echo "<td>";
			echo"<tr>";
			echo"<td colspan='6' class='text-center fs-4 text-primary'>PATIENT REPORT</td>";
			 echo" </tr>";
	     echo"<tr>";
		 echo"<td width='128'><b>Name</td>";
		 echo"<td colspan='2'><b>: $f_name &nbsp; $l_name</td>";
		 echo"<td width='156'><b>Reg.No.</td>";
		 echo"<td width='215'><b>: $regno</td>";
   		 echo"</tr>";
 		 echo" <tr>";
     	 echo"<td><b>IC No </td>";
   		 echo" <td><b>: $icno</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td><b>Collected</td>";
    	 echo"<td><b>: $test_date</td>";
  		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>DOB </td>";
		 echo"<td><b>: $dob</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Received</td>";
		 echo"<td><b>: $k_date</td>";
 		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>Age/Sex </td>";
		 echo"<td><b>: $gen</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Reported</td>";
		 echo"<td><b>: $d_date</td>";
  		 echo"</tr>";
  		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
    	 echo" <td>&nbsp;</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td>&nbsp;</td>";
  		 echo" </tr>";
   		 echo"<tr>";
     	 echo"<td style='vertical-align:top'><strong>Consultant:</strong></td>";
     	 echo"<td colspan='5'><p><strong>$doctor</strong><br>
   		 <strong>KLINIK SP CARE, 2A-1-7 &amp; 2A-1-8 JALAN RAWANG  MUTIARA 3, RAWANG MUTIARA BUSINESS CENTRE 2, RAWANG, 48000</strong></p></td>";
 		  echo" </tr>";
 		
	      echo"<tr>";
    	  echo"<td><strong>TEST</strong></td>";
		  echo" <td><strong>RESULT</strong></td>";
		  echo" <td><strong>FLAG</strong></td>";
		  echo" <td><strong>UNIT</strong></td>";
		  echo" <td><strong>REFERENCERANGE</strong></td>";
		  echo"<td>&nbsp;</td>";
	      echo"</tr>";

		  echo" <tr>";
		  echo"<td colspan='3'><strong><p>IMMUNOLOGY &SEROLOGY</p></strong></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo" </tr>";
		 
		   echo"<tr>";
			 echo"<td colspan='6'><p><strong>COVID-19 AntigenTest</strong></p></td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='2'>NatureofSpecimen</td>";
			echo" <td colspan='3'>NasopharyngealSwab</td>";
			 echo"<td>&nbsp;</td>";

		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='2'>COVID-19(SARS-CoV-2)Antigen</td>";
			 echo"<td colspan='3'><font color='green'><b>Negative</b></td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";

		   echo"<tr>";
			 echo"<td colspan='2'><strong><p>Comments:</p></strong></td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='6' align='justify'>1.	This test is intended as an aid to early diagnosis of SARS-CoV-2 infection in patient with clinical   symptoms to SARS-CoV-2infection.<br>
2.	Children tend to shed virus for longer periods of time than adults, which may result in differences in sensitivity between adults and children.<br>
3.	Positive results do not rule out co-infections with other pathogens and negative results are not intended to rule in other coronavirus infection exceptSARS-CoV-1.<br>
4.	More specific alternative diagnosis methods should be performed in order to obtain the confirmation of SARS-CoV-2 infection. Test results should be considered in conjunction with clinical history and other dataavailable.
</td>";
		   echo"</tr>";
		 
		     echo" <tr>";
			 echo"<td colspan='2'><strong><p>Methodology</p></strong></td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
		   echo"</tr>";
		  echo" <tr>";
			 echo"<td colspan='6'> <align='justify'>This is a rapid chromatographic immunoassay for the qualitative detection of specific antigens to SARS- CoV-2 present in human nasopharynx.</td>";
		   echo"</tr>";
		  
		  echo" <tr>";
			 echo"<td colspan='2'><strong><p>Disclaimer:</p></strong></td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='6'><p>1. Guideline on COVID-19 Testing using Antigen Rapid Test Kit (RTK-Ag) for the Health Facilities, Ministry of Health version 4.0</p></td>";
		   echo"</tr>";
		  echo" <tr>";
		  echo"<td colospan='2'><img src='img/ptn-reports.png' width='95' height='95'></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		   echo" </tr>";
				}
	}
		  ?>
         <!-- --------5-------!-->
         <?php
		  
		{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '5' && r_case ='1'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
				$regno = $row['validation'];
			
			echo "<table class='table text-center table-bordered'>";
			echo"<tr>";
			echo"<td colspan='6' class='text-center fs-4 text-primary'>PATIENT REPORT</td>";
			 echo" </tr>";
	     echo"<tr>";
		 echo"<td width='128'><b>Name</td>";
		 echo"<td colspan='2'><b>: $f_name &nbsp; $l_name</td>";
		 echo"<td width='156'><b>Reg.No.</td>";
		 echo"<td width='215'><b>: $regno</td>";
   		 echo"</tr>";
 		 echo" <tr>";
     	 echo"<td><b>IC No </td>";
   		 echo" <td><b>: $icno</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td><b>Collected</td>";
    	 echo"<td><b>: $test_date</td>";
  		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>DOB </td>";
		 echo"<td><b>: $dob</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Received</td>";
		 echo"<td><b>: $k_date</td>";
 		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>Age/Sex </td>";
		 echo"<td><b>: $gen</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Reported</td>";
		 echo"<td><b>: $d_date</td>";
  		 echo"</tr>";
  		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
    	 echo" <td>&nbsp;</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td>&nbsp;</td>";
  		 echo" </tr>";
   		 echo"<tr>";
     	 echo"<td style='vertical-align:top'><strong>Consultant:</strong></td>";
     	 echo"<td colspan='5'><p><strong>$doctor</strong><br>
   		 <strong>KLINIK SP CARE, 2A-1-7 &amp; 2A-1-8 JALAN RAWANG  MUTIARA 3, RAWANG MUTIARA BUSINESS CENTRE 2, RAWANG, 48000</strong></p></td>";
 		  echo" </tr>";
 		
	      echo"<tr>";
    	  echo"<td><strong>TEST</strong></td>";
		  echo" <td><strong></strong></td>";
		  echo" <td><strong>RESULT</strong></td>";
		  echo" <td><strong>UNIT</strong></td>";
		  echo" <td><strong>REFERENCERANGE</strong></td>";
		  echo"<td>&nbsp;</td>";
	      echo"</tr>";

		  echo" <tr>";
		  echo"<td colspan='3'><strong>COVID-19 / SARS CoV-2 MOLECULAR DETECTION </strong></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo" </tr>";
		 
		   echo"<tr>";
			 echo"<td colspan='6'><p><strong>RAPID PCR / MOLECULAR</strong></p></td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='2'>Sample type</td>";
			echo" <td colspan='3'>NasopharyngealSwab</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='2'>SARS CoV-2 / COVID-19 RNA</td>";
			 echo"<td colspan='3'><font color='red'><b>Detected</b></td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";

		   echo"<tr>";
			 echo"<td colspan='2'><strong><p>Methodology:</p></strong></td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='2'><p>By Abbott ID NOW COVID-19 Molecular Assay</p></td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='6'><p <align='justify'>The ID NOW COVID-19 assay performed on the ID NOW Instrument is a rapid automated molecular in vitro diagnostic assay that utilizing an isothermal nucleic acid amplification technology intended for the qualitative detection of SARS-CoV-2 viral RNA in direct nasal, nasopharyngeal or throat swabs from individuals who are suspected of COVID-19, within the first seven days of the onset of symptoms.
</td>";
		   echo"</tr>";
		 
		     echo" <tr>";
			 echo"<td colspan='2'><strong><p>Disclaimer:</p></strong></td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
		   echo"</tr>";
		  echo" <tr>";
			 echo"<td colspan='6'> <p style=font-size:12px; align='justify'><align='justify'><i>&nbsp;&nbsp;&nbsp;&nbsp;The SARS-CoV-2 Viral RNA is generally detectable in respiratory samples during the acute phase of infection. This assay is designed to target on the SARS-CoV-2 Viral RNA at a unique region of the RdRp segment. As with any molecular test, mutations within the target regions of the Abbott ID NOW COVID-19 test could affect primer and/or probe binding resulting in failure to detect the presence of the virus.</td>";
		   echo"</tr>";
		   echo" <tr>";
		   echo"<td colspan='6'> <p style=font-size:12px; align='justify'><align='justify'><i>&nbsp;&nbsp;&nbsp;&nbsp;A negative test result for this test means that SARS-CoV-2 RNA was not present in the specimen or below the limit of detection. However, a negative result does not rule out COVID-19 and should not be used as the sole basis for treatment or patient management decision. Negative result should be treated as presumptive and, if inconsistent with clinical signs and symptoms or necessary for patient management, should be tested with an alternative molecular assay. The result may not flesh out infection if to test a person too early or too late during COVID-19 infection to make an accurate diagnosis.</td>";
		   echo"</tr>";
		   
		 echo" <tr>";
		   echo"<td colspan='6'> <p style=font-size:12px; align='justify'><align='justify'><i>nbsp;&nbsp;&nbsp;&nbsp;A positive test result for COVID-19 indicates that RNA from SARS-CoV-2 was detected, and therefore the patient is infected with the virus and presumed to be contagious. Laboratory test results should always be considered in the context of clinical observations and epidemiological data (such as local prevalence rates and current outbreak / epicenter locations) in making a final diagnosis and patient management decisions. The ID NOW COVID-19 has been designed to minimize the likelihood of false positive test results. However, it is still possible that this test can give a false positive result, even when used in locations where the prevalence is below 5%.</td>";
		   echo"</tr>";
		   
		   		    
		  echo" <tr>";
			 echo"<td colspan='2'><strong><p>Reference:</p></strong></td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='6'><p>https://abbott.mediaroom.com/2020-10-07-Abott-Releases-ID-NOW-TM-COVID-19-Interim-Clinical-Study-Results-from-1-003-People-to-Provide-the-Facts-on-Clinical-Performance-and-to-Support-Public-Health</p></td>";
		   echo"</tr>";
		  echo" <tr>";
		  echo"<td colospan='2'><img src='img/ptn-reports.png' width='75' height='75'></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		   echo" </tr>";
				}
	}
		  ?>
          
               
            <?php
			
		{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '5' && r_case ='2'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
				$regno = $row['validation'];
			
			echo "<table class='table text-center table-bordered'>";
			
			
			echo"<tr>";
			echo"<td colspan='6' class='text-center fs-4 text-primary'>PATIENT REPORT</td>";
			 echo" </tr>";
	     echo"<tr>";
		 echo"<td width='128'><b>Name</td>";
		 echo"<td colspan='2'><b>: $f_name &nbsp; $l_name</td>";
		 echo"<td width='156'><b>Reg.No.</td>";
		 echo"<td width='215'><b>: $regno</td>";
   		 echo"</tr>";
 		 echo" <tr>";
     	 echo"<td><b>IC No </td>";
   		 echo" <td><b>: $icno</td>";
    	 echo"<td>&nbsp;</td>";
     	 echo"<td><b>Collected</td>";
    	 echo"<td><b>: $test_date</td>";
  		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>DOB </td>";
		 echo"<td><b>: $dob</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Received</td>";
		 echo"<td><b>: $k_date</td>";
 		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td><b>Age/Sex </td>";
		 echo"<td><b>: $gen</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td><b>Reported</td>";
		 echo"<td><b>: $d_date</td>";
  		 echo"</tr>";
   		 echo"<tr>";
     	 echo"<td style='vertical-align:top'><strong>Consultant:</strong></td>";
     	 echo"<td colspan='5'><p><strong>$doctor</strong><br>
   		 <strong>KLINIK SP CARE, 2A-1-7 &amp; 2A-1-8 JALAN RAWANG  MUTIARA 3, RAWANG MUTIARA BUSINESS CENTRE 2, RAWANG, 48000</strong></p></td>";
 		  echo" </tr>";
 		
	      echo"<tr>";
    	  echo"<td><strong>TEST</strong></td>";
		  echo" <td><strong></strong></td>";
		  echo" <td><strong>RESULT</strong></td>";
		  echo" <td><strong>UNIT</strong></td>";
		  echo" <td><strong>REFERENCERANGE</strong></td>";
		  echo"<td>&nbsp;</td>";
	      echo"</tr>";

		  echo" <tr>";
		  echo"<td colspan='3'><strong>COVID-19 / SARS CoV-2 MOLECULAR DETECTION </strong></td>";
		  echo"<td>&nbsp;</td>";
		  
		  
		  echo" </tr>";
		 
		   echo"<tr>";
			 echo"<td colspan='6'><p><strong>RAPID PCR / MOLECULAR</strong></p></td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='2'>Sample type</td>";
			echo" <td colspan='3'>NasopharyngealSwab</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='2'>SARS CoV-2 / COVID-19 RNA</td>";
			 echo"<td colspan='3'><font color='red'><b>Not Detected</b></td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";

		   echo"<tr>";
			 echo"<td colspan='2'><strong><p>Methodology:</p></strong></td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='2'><p>By Abbott ID NOW COVID-19 Molecular Assay</p></td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='6'><p style=font-size:12px; align='justify'>The ID NOW COVID-19 assay performed on the ID NOW Instrument is a rapid automated molecular in vitro diagnostic assay that utilizing an isothermal nucleic acid amplification technology intended for the qualitative detection of SARS-CoV-2 viral RNA in direct nasal, nasopharyngeal or throat swabs from individuals who are suspected of COVID-19, within the first seven days of the onset of symptoms.
</td>";
		   echo"</tr>";
		 
		     echo" <tr>";
			 echo"<td colspan='2'><strong><p>Disclaimer:</p></strong></td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
		   echo"</tr>";
		  echo" <tr>";
			 echo"<td colspan='6'><p style=font-size:12px; align='justify'><i>&nbsp;&nbsp;&nbsp;&nbsp;The SARS-CoV-2 Viral RNA is generally detectable in respiratory samples during the acute phase of infection. This assay is designed to target on the SARS-CoV-2 Viral RNA at a unique region of the RdRp segment. As with any molecular test, mutations within the target regions of the Abbott ID NOW COVID-19 test could affect primer and/or probe binding resulting in failure to detect the presence of the virus.</td>";
		   echo"</tr>";
		   echo" <tr>";
		   echo"<td colspan='6'> <p style=font-size:12px; align='justify'><i>&nbsp;&nbsp;&nbsp;&nbsp;A negative test result for this test means that SARS-CoV-2 RNA was not present in the specimen or below the limit of detection. However, a negative result does not rule out COVID-19 and should not be used as the sole basis for treatment or patient management decision. Negative result should be treated as presumptive and, if inconsistent with clinical signs and symptoms or necessary for patient management, should be tested with an alternative molecular assay. The result may not flesh out infection if to test a person too early or too late during COVID-19 infection to make an accurate diagnosis.</td>";
		   echo"</tr>";
		   
		 echo" <tr>";
		   echo"<td colspan='6'> <p style=font-size:12px; align='justify'><i>&nbsp;&nbsp;&nbsp;&nbsp;A positive test result for COVID-19 indicates that RNA from SARS-CoV-2 was detected, and therefore the patient is infected with the virus and presumed to be contagious. Laboratory test results should always be considered in the context of clinical observations and epidemiological data (such as local prevalence rates and current outbreak / epicenter locations) in making a final diagnosis and patient management decisions. The ID NOW COVID-19 has been designed to minimize the likelihood of false positive test results. However, it is still possible that this test can give a false positive result, even when used in locations where the prevalence is below 5%.</td>";
		   echo"</tr>";
		   
		   		    
		  echo" <tr>";
			 echo"<td colspan='2'><strong><p>Reference:</p></strong></td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='6'><p>https://abbott.mediaroom.com/2020-10-07-Abott-Releases-ID-NOW-TM-COVID-19-Interim-Clinical-Study-Results-from-1-003-People-to-Provide-the-Facts-on-Clinical-Performance-and-to-Support-Public-Health</p></td>";
		   echo"</tr>";
		  echo" <tr>";
		  echo"<td colospan='2'><img src='img/ptn-reports.png' width='75' height='75'></td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		   echo" </tr>";
				}
	}
		  ?>
		  </div>
		 
 <?php
	}

}
else {
           echo "<div class='alert alert-danger alert-dismissible text-center' role='alert'>
					 Entered ID is INVALID!. <br> Please Enter Valid PATIENT ID!
					 <button type='button' class='btn-close text-danger'  data-bs-dismiss='alert' aria-label='Close'></button>
				 </div>";
        }	
		}
	?> 
			 
				</td>
		  </tr>
		  
		</table>


