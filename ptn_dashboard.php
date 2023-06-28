<?php
error_reporting( error_reporting() & ~E_NOTICE )
?>
<?php
include "conn.php";
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: ptn_login.php");
}
?>


<?php
$auth = $_SESSION['validation'];
include_once "header_patient.php";
?>
<?php
//session_start();
$auth = $_SESSION['validation'];
$res=mysqli_query($conn,"select * from patient where validation='".$auth."'");
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
<br>
<html lang="en">
	<head>
    <link rel="shortcut icon" type="image/icon" href="img/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>      
    
		<!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

	</head>

	<body>


	<section class="">
  <div class="container mt-2 p-4 shadow-lg rounded rounded-4 table-responsive">
    <table id="des" class="table table-hover table-bordered text-center align-middle animate__animated animate__fadeInRight">
		<tr>
          <th colspan="3" class="bg-light text-primary fs-4 text-center">PATIENT DASHBOARD &nbsp; <i class="bi bi-file-medical"></i></th>        
        <tr>
  <tr>
    <td colspan="4" align="left" valign="middle"><strong>Name: </strong><?php echo $f_name.'&nbsp;'.$l_name;?></td>
  </tr>
  <tr>       
    <td class="text-start"><strong>MRN: </strong><?php echo $icno;?></td>
    <td  class="text-start"><strong>GENDER:</strong> <?php echo strtoupper($gen);?></td>
    <td  rowspan="3" align="center"><img src="img/cov-19-logo.png" width="85" height="100"></td>
  </tr>
  <tr>
  <?php
	//$dateOfBirth = "17-10-1985";
	$today = date("Y-m-d");
	$diff = date_diff(date_create($dob), date_create($today));
	//echo 'Age is '.$diff->format('%y');
  ?>
  
    <td  class="text-start""><strong>AGE: </strong><?php echo ''.$diff->format('%y');?></td>
    <td class="text-start"><strong>DOB: </strong><?php echo $dob;?></td>
  </tr>
  <tr>
    <td  class="text-start"><strong>NATIONAL ID:</strong><?php echo $icno;?> </td>
    <td class="text-start"><strong>DOCTOR: </strong>
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

<div class="table-responsive">
	
    <table id="des" class="table table-hover table-bordered text-center align-middle animate__animated animate__fadeInLeft">
  <tr>       
    <td ><strong>TEST ID</strong></td>
    <td ><strong>TEST OBTAINED</strong></td>
    <td ><strong>COLLECTION DATE</strong> </td>
    <td ><strong>TEST STATUS</strong></td>
	<td ><strong>TEST RESULT</strong></td>
  </tr>
  <tr>
    <td ><?php echo $validation;?> </td>
    
   <!--  test type declaration  !--> 
    <td > <?php //echo $type;
	$type=mysqli_query($conn,"select * from test_type where id='".$type."'");
						while($row=mysqli_fetch_array($type))
                        {
						echo $row["test_type"];
						$t_type = $row["test_type"];
						}
?>
	
	
	</td>
    <td ><?php echo $test_date;?> </td>
	<td ><?php //echo $icno;
    $results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND icno = '".$icno."'");
      $numrows = mysqli_num_rows($results);
    if($numrows == 0)
      {
        echo "<font color=red>RESULT PENDING</font>";
      }
      else
      {
        $res_q = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND icno = '".$icno."'");
        while($row2=mysqli_fetch_array($res_q))
                        {
			//results   Positive / Negative Report
			//$results = $row1["r_case"];
            //echo $row2["r_case"];
            if($row2["r_case"]==0)
			{
				//echo "Influenza A & B";
				$inf=mysqli_query($conn,"select * from results where r_id = '".$p_id."' AND icno = '".$icno."'");
						while($row=mysqli_fetch_array($inf))
                        {
						if($row["e_gene"]==1)
						{
							echo "Influenza A :";
						}
						if($row["rdrp"]==1)
						{
							echo "<font color=red>Possitive</font>";
						}
						else
						{
							echo "<font color=green>Negative</font>";
						}
						echo "</br>"; 
						if($row["e_gene"]==1)
						{
							echo "Influenza B :";
						}
						if($row["ct_value"]==1)
						{
							echo "<font color=red>Possitive</font>";
						}
						else
						{
							echo "<font color=green>Negative</font>";
						}
						}
			}
			elseif($row2["r_case"]==1)
			{
				echo "<font color=red>POSITIVE</font>";
			}
			elseif($row2["r_case"]==2)
			{
				echo "<font color=green>NEGATIVE</font>";
			}
			else
			{
				echo "<font color=red>INCONCLUSIVE</font>";
			}
	
        }

      }

  ?> </td>
    <td><center>  <form method="post"> 
        <input type="submit" name="report" class="btn btn-outline-secondary" value="Get Report" /> 
          
           </form> </center></td>
  </tr>
</table>
</div>
<div class="text-center">
	<button onClick="printContent('div1')" class="btn btn-outline-primary">Print Report <i class="bi bi-printer"></i></button>
</div>
	</div>
	</section>


  <div class="container mt-4 p-4 shadow-lg rounded rounded-4">
<div id="div1">
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
 
<br>

  <?php
  if(array_key_exists('report', $_POST)) { 
        $results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND icno = '".$icno."'");
     	 $numrows = mysqli_num_rows($results);
    		if($numrows == 0)
      			{
        			echo "<font color=red>RESULT PENDING</font>";
     			}
        else
		
		{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '1' && r_case ='1' AND icno = '".$icno."'");
			while($row=mysqli_fetch_array($results))
			{
				$e_gene = $row['e_gene'];
				$rdrp =  $row['rdrp'];
				$ngene = $row['ngene'];
				$d_date = $row['date'];
				
			echo "<table  class='' height='18' border='0' align='center'>";
			echo "<tr>";
			echo "<td>";
			echo"<tr>";
			 echo"<td colspan='6'><center><img src='img/receipt.png' width='1000' height='180'></center></td>";
				
   		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
	     echo"</tr>";
	     echo"<tr>";
		 echo"<td width='128'><b>Name </td>";
		 echo"<td width='300'><b>: $f_name &nbsp; $l_name</td>";
		 echo"<td width='162'><b>&nbsp;</td>";
		 echo"<td width='156'><b>Reg. No.</td>";
		 echo"<td width='215'><b>: $validation</td>";
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
     	 echo"<td colspan='5'><strong>$doctor</strong><br>
   		 <strong>KLINIK SP CARE, 2A-1-7 &amp; 2A-1-8 JALAN RAWANG  MUTIARA 3, RAWANG MUTIARA BUSINESS CENTRE 2, RAWANG, 48000</strong></td>";
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
		  // echo"<tr>";
			//echo" <td colspan='6'>&nbsp;</td>";
		 // echo" </tr>";
		   echo"<tr>";
			 echo"<td colspan='6'><strong>CORONAVIRUS  DISEASE 2019 RNA PCR</strong></td>";
		  echo" </tr>";
		    echo" <tr>";
			 echo"<td colspan='3'>NatureofSpecimen</td>";
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
			 echo"<td colspan='2'><strong>Interpretation:</strong></td>";
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
			 echo"<td colspan='2'><p><strong>Suggestion</strong></p></td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
		   echo"</tr>";
		  echo" <tr>";
			 echo"<td colspan='6'><p align='justify'>Sample with negative for COVID-19 is recommended to further test using our Respiratory  Pathogen Panel (RPP) to rule out  other respiratory pathogen infection.</p></td>";
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
			echo" <td colspan='6'><p><strong>Reported by:</strong><br>
			  ABDUL RAZAK BIN ABDUL  KHALID <br>
			SR. MEDICAL LABORATORY SCIENTIST</p></td>";
		   echo"</tr>";
		     echo"<tr>";
			echo" <td colspan='6'><strong>Verified by:</strong><br>
			  Dr. RohaniMdYassin<br>
			Consultant Medical Microbiologist</td>";
		   echo"</tr>";
		   
		   echo"<tr>";
		   echo"<td colspan='6'>Genes detected (Ct value): E gene ($e_gene), RdRP gene ($rdrp), N gene ($ngene)</td>";
			  
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
		   echo"<td style='text-align:right' colspan='3'><strong>Report Completed, Please File.</strong></td>";
		   echo" </tr>";

		   echo"<tr>";
		   echo"<td colspan='6'>&nbsp;</td>";
		   echo"</tr>";

		   echo"<tr>";
		   echo" <td colspan='6'><p style=font-size:14px; align='justify'><i>This e-report is copyrighted and contains confidential medical information of the patient named  above ('patient') that is intended solely for the use of Pantai Premier  Pathology, the patient and the healthcare professional rendering healthcare services to the patient. The e-report is the property of Pantai Premier  Pathology, and may not be reproduced or distributed save as otherwise stated herein in any manner without the express  written permission of Pantai Premier Pathology. Pantai Premier Pathology shall  not be responsible or liable in any manner whatsoever either for the receipt or  non- receipt of the e-report by the patient or any delay thereof for any reason whatsoever and shall not be held liable for any unauthorized modification of  the e-report. Pantai Premier Pathology assumes no liability for any errors or  omissions in the content of this e-report. Pantai Premier Pathology does not assume any risk for your use of any information provided in this e-report.  References to specific treatments, products, or services do not constitute or  imply recommendation by Pantai Premier Pathology and the patient is recommended to consult a healthcare professional of his/her choice to interpretthee-report. In case of any discrepancy found between thee-report and the original report,the original shallbe deemed final.</i></p></td>";
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
	
 <?php
	}
	
	{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '1' && r_case ='2'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
			echo "<table class='' height='18' border='0' align='center'>";
			echo "<tr>";
			echo "<td>";
			
			echo"<tr>";
			 echo"<td colspan='6'><center><img src='img/receipt.png' width='1000' height='180'></center></td>";
	  		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
	     echo"</tr>";
	     echo"<tr>";
		 echo"<td width='128'><b>Name </td>";
		 echo"<td width='280'><b>: $f_name &nbsp; $l_name</td>";
		 echo"<td width='162'>&nbsp;</td>";
		 echo"<td width='156'><b>Reg. No.</td>";
		 echo"<td width='215'><b>: $validation</td>";
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
			 echo"<td colspan='3'><font color=green><b>NotDetected</b></td>";
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
		  echo" <td colspan='6'> <p style=font-size:14px; align='justify'><i>This e-report is  copyrighted and contains confidential medical information of the patient named above ('patient') that is intended solely for the use of Pantai Premier Pathology, the patient and the healthcare professional rendering healthcare services to the patient. The e-report is the property of Pantai Premier  Pathology, and may  not be reproduced or distributed save as otherwise stated herein in any manner without the express  written permission of Pantai Premier Pathology. Pantai Premier Pathology shall  not be responsible or liable in any manner whatsoever either for the receipt or  non- receipt of the e-report by the patient or any delay thereof for any reason  whatsoever and shall not be held liable for any unauthorized modification of  the e-report. Pantai Premier Pathology assumes no liability for any errors or omissions in the content of this e-report. Pantai Premier Pathology does not  assume any risk for your use of any information provided in this e-report.  References to specific treatments, products, or services do not constitute or  imply recommendation by Pantai Premier Pathology and the patient is recommended to consult a healthcare professional of his/her choice to interpretthee-report. In case of any discrepancy found between thee-reportand the original report, the original shall bedeemed final.</i></p></td>";
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
 <?php
	
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '1' && r_case ='3'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
				$regno = $row['validation'];
				$ct_value = $row['ct_value'];
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<table class='' height='18' border='0' align='center'>";
			echo "<tr>";
			echo"<td colspan='6'><center><img src='img/receipt.png' width='1000' height='180'></center></td>";
			echo "</tr>";
		echo"<tr>";
		echo"<td colspan='6'></td>";
		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
	     echo"</tr>";
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
			 echo"<td colspan='3'><font color=orange><b>Inconclusive</b></td>";
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

<?php
	}
	
	{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '2' && r_case ='1'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
			echo "<table class='' height='18' border='0' align='center'>";
			echo "<tr>";
			echo "<td>";
			
			echo"<tr>";
			echo"<td colspan='6'><center><img src='img/receipt.png' width='1000' height='180'></center></td>";
	 
  		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
	     echo"</tr>";
	     echo"<tr>";
		 echo"<td width='128'><b>Name </td>";
		 echo"<td width='280'><b>: $f_name &nbsp; $l_name</td>";
		 echo"<td width='162'>&nbsp;</td>";
		 echo"<td width='156'><b>Reg. No.</td>";
		 echo"<td width='215'><b>: $validation</td>";
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
		 echo"<td colspan='5'><strong>IMMUNOLOGY &SEROLOGY</strong></td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo" </tr>";
		 
		 echo"<tr>";
		 echo"<td colspan='6'><p><strong>COVID-19 AntigenTest</strong></p></td>";
		 echo" </tr>";

	     echo" <tr>";
		 echo"<td colspan='3'>Nature of Specimen</td>";
		 echo" <td colspan='3'>Nasopharyngeal Swab</td>";
	     echo"</tr>";

		 echo"<tr>";
	     echo"<td colspan='3'>COVID-19(SARS-CoV-2)Antigen</td>";
		 echo"<td colspan='3'><font color='red'><b>Positive</b></td>";
		 echo"</tr>";

		 echo"<tr>";
		 echo"<td colspan='2'><strong><p>Comments:</p></strong></td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo" <td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"</tr>";

		 echo"<tr>";
		 echo"<td colspan='6'><align='justify'>1.	This test is intended as an aid to early diagnosis of SARS-CoV-2 infection in patient with clinical   symptoms to SARS-CoV-2infection.<br>
			2.	Children tend to shed virus for longer periods of time than adults, which may result in differences in sensitivity between adults andchildren.<br>
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
		  ?>
		 		  <tr>
		   <td colspan='6' align="center">
			 
		 </td>
			 
		  </tr>





<?php
	}
	
	{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '2' && r_case ='2'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
			echo "<table class='' height='18' border='0' align='center'>";
			echo "<tr>";
			echo "<td>";
			
			echo"<tr>";
			 echo"<td colspan='6'><center><img src='img/receipt.png' width='1000' height='180'></center></td>";
	  		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
	     echo"</tr>";
	     echo"<tr>";
		 echo"<td width='128'><b>Name </td>";
		 echo"<td width='280'><b>: $f_name &nbsp; $l_name</td>";
		 echo"<td width='162'>&nbsp;</td>";
		 echo"<td width='156'><b>Reg. No.</td>";
		 echo"<td width='215'><b>: $validation</td>";
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
		 echo"<td colspan='5'><strong>IMMUNOLOGY &SEROLOGY</strong></td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo" </tr>";
		 
		 echo"<tr>";
		 echo"<td colspan='6'><p><strong>COVID-19 AntigenTest</strong></p></td>";
		 echo" </tr>";

	     echo" <tr>";
		 echo"<td colspan='3'>Nature of Specimen</td>";
		 echo" <td colspan='3'>Nasopharyngeal Swab</td>";
	     echo"</tr>";

		 echo"<tr>";
	     echo"<td colspan='3'>COVID-19(SARS-CoV-2)Antigen</td>";
		 echo"<td colspan='3'><font color='green'><b>Negative</b></td>";
		 echo"</tr>";

		 echo"<tr>";
		 echo"<td colspan='2'><strong><p>Comments:</p></strong></td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo" <td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"</tr>";

		 echo"<tr>";
		 echo"<td colspan='6'><align='justify'>1.	This test is intended as an aid to early diagnosis of SARS-CoV-2 infection in patient with clinical   symptoms to SARS-CoV-2infection.<br>
			2.	Children tend to shed virus for longer periods of time than adults, which may result in differences in sensitivity between adults andchildren.<br>
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
		  ?>
		 
		  <tr>
		   <td colspan='6' align="center">
			 
		  </td>
			 
		  </tr>


		  <?php
	}
	
	{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '3' && r_case ='1'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
			echo "<table class='' height='18' border='0' align='center'>";
			echo "<tr>";
			echo "<td>";
			
			echo"<tr>";
			echo"<td colspan='6'><center><img src='img/receipt.png' width='1000' height='180'></center></td>";
	 
  		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
	     echo"</tr>";
	     echo"<tr>";
		 echo"<td width='128'><b>Name </td>";
		 echo"<td width='280'><b>: $f_name &nbsp; $l_name</td>";
		 echo"<td width='162'>&nbsp;</td>";
		 echo"<td width='156'><b>Reg. No.</td>";
		 echo"<td width='215'><b>: $validation</td>";
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
		 echo"<td colspan='5'><strong>IMMUNOLOGY &SEROLOGY</strong></td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo" </tr>";
		 
		 echo"<tr>";
		 echo"<td colspan='6'><p><strong>COVID-19 AntigenTest</strong></p></td>";
		 echo" </tr>";

	     echo" <tr>";
		 echo"<td colspan='3'>Nature of Specimen</td>";
		 echo" <td colspan='3'>Nasopharyngeal Swab</td>";
	     echo"</tr>";

		 echo"<tr>";
	     echo"<td colspan='3'>COVID-19(SARS-CoV-2)Antigen</td>";
		 echo"<td colspan='3'><font color='red'><b>Positive</b></td>";
		 echo"</tr>";

		 echo"<tr>";
		 echo"<td colspan='2'><strong><p>Comments:</p></strong></td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo" <td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"</tr>";

		 echo"<tr>";
		 echo"<td colspan='6'><align='justify'>1.	This test is intended as an aid to early diagnosis of SARS-CoV-2 infection in patient with clinical   symptoms to SARS-CoV-2infection.<br>
			2.	Children tend to shed virus for longer periods of time than adults, which may result in differences in sensitivity between adults andchildren.<br>
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
		  ?>
		 
		  <tr>
		   <td colspan='6' align="center">
			 
		 </td>
			 
		  </tr>


<?php
	}
	
	{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '3' && r_case ='2'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
			echo "<table class='' height='18' border='0' align='center'>";
			echo "<tr>";
			echo "<td>";
			
			echo"<tr>";
			 echo"<td colspan='6'><center><img src='img/receipt.png' width='1000' height='180'></center></td>";
		  		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
	     echo"</tr>";
	     echo"<tr>";
		 echo"<td width='128'><b>Name </td>";
		 echo"<td width='280'><b>: $f_name &nbsp; $l_name</td>";
		 echo"<td width='162'>&nbsp;</td>";
		 echo"<td width='156'><b>Reg. No.</td>";
		 echo"<td width='215'><b>: $validation</td>";
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
		 echo"<td colspan='5'><strong>IMMUNOLOGY &SEROLOGY</strong></td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo" </tr>";
		 
		 echo"<tr>";
		 echo"<td colspan='6'><p><strong>COVID-19 AntigenTest</strong></p></td>";
		 echo" </tr>";

	     echo" <tr>";
		 echo"<td colspan='3'>Nature of Specimen</td>";
		 echo" <td colspan='3'>Nasopharyngeal Swab</td>";
	     echo"</tr>";

		 echo"<tr>";
	     echo"<td colspan='3'>COVID-19(SARS-CoV-2)Antigen</td>";
		 echo"<td colspan='3'><font color='green'><b>Negative</b></td>";
		 echo"</tr>";

		 echo"<tr>";
		 echo"<td colspan='2'><strong><p>Comments:</p></strong></td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo" <td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"</tr>";

		 echo"<tr>";
		 echo"<td colspan='6'><align='justify'>1.	This test is intended as an aid to early diagnosis of SARS-CoV-2 infection in patient with clinical   symptoms to SARS-CoV-2infection.<br>
			2.	Children tend to shed virus for longer periods of time than adults, which may result in differences in sensitivity between adults andchildren.<br>
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
		  }
	?> 
    


    <?php
		  
		{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '5' && r_case ='1'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
				$regno = $row['validation'];
			
			echo "<table class='' height='18' border='0' align='center'>";
			echo "<tr>";
			echo "<td>";
			
			echo"<tr>";
			 echo"<td colspan='6'><center><img src='img/receipt.png' width='1000' height='180'></center></td>";
		  		 echo" </tr>";
   		 echo"<tr>";
			
		echo"<tr>";
		echo"<td colspan='6'></td>";
		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
	     echo"</tr>";
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
			
			echo "<table class='' height='18' border='0' align='center'>";
			echo "<tr>";
			echo "<td>";
			
			echo"<tr>";
			 echo"<td colspan='6'><center><img src='img/receipt.png' width='1000' height='180'></center></td>";
		  		 echo" </tr>";
   		 echo"<tr>";
			
		echo"<tr>";
		echo"<td colspan='6'></td>";
		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
	     echo"</tr>";
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
	
		  ?>
<!--END 5 REPORT!-->
<?php
	}	  
		{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '7' && r_case ='0'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
				$regno = $row['validation'];
			
			echo "<table class='' height='18' border='0' align='center'>";
			echo "<tr>";
			echo "<td>";
			
			echo"<tr>";
			 echo"<td colspan='6'><center><img src='img/receipt.png' width='1000' height='180'></center></td>";
		  		 echo" </tr>";
   		 echo"<tr>";
			
		echo"<tr>";
		echo"<td colspan='6'></td>";
		 echo" </tr>";
   		 echo"<tr>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
		 echo"<td>&nbsp;</td>";
	     echo"</tr>";
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
    	  echo"<td colspan='3'><strong>INFLUENZA A & B Antigen Test</strong></td>";
		  echo" <td><strong></strong></td>";
		  echo" <td></td>";
		  echo" <td></td>";
		  echo"</tr>";

		  echo" <tr>";
		  echo"<td colspan='2'>Nature of Specimen </td>";
		  //echo"<td>&nbsp;</td>";
		  echo"<td colspan='3'>Nasopharyngeal Swab</td>";
		  
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='2'>INFLUENZA A:</td>";
			echo" <td colspan='3'>";
			
			$inf=mysqli_query($conn,"select * from results where r_id = '".$p_id."' AND icno = '".$icno."'");
						while($row=mysqli_fetch_array($inf))
                        {
						if($row["rdrp"]==1)
						{
							echo "<font color=red><b>Possitive</b></font>";
						}
						else
						{
							echo "<font color=green><b>Negative</b></font>";
						}
						}		
			echo "</td>";
			 echo"<td>&nbsp;</td>";
		   echo"</tr>";
		   echo"<tr>";
			 echo"<td colspan='2'>INFLUENZA B:</td>";
			 echo"<td colspan='3'>";
			 $inf=mysqli_query($conn,"select * from results where r_id = '".$p_id."' AND icno = '".$icno."'");
						while($row=mysqli_fetch_array($inf))
                        {
						if($row["ct_value"]==1)
						{
							echo "<font color=red><b>Possitive</b></font>";
						}
						else
						{
							echo "<font color=green><b>Negative</b></font>";
						}
						}
			 
			 
			 echo "</td>";
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
		   ?>
			 <td colspan='6'>
			 <ol>
			 <li>This test is intended as an aid to early diagnosis of INFLUENZA A or B infection in patient with
clinical symptoms to INFLUENZA A or B infection.</li>
<li> Children tend to shed virus for longer periods of time than adults, which may result in differences
in sensitivity between adults and children.</li>
<li> Positive results do not rule out co-infections with other pathogens and negative results are not
intended to rule in other infections except INFLUENZA A or B.</li>
<li> More specific alternative diagnosis methods should be performed in order to obtain the confirmation
of INFLUENZA A or B infection. Test results should be considered in conjunction with clinical history
and other data available.</li>
</ol>			 
			 
			 
</td>";
<?php
		   echo"</tr>";
		 
		     echo" <tr>";
			 echo"<td colspan='2'><strong><p>Methodology</p></strong></td>";
			 echo"<td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
			echo" <td>&nbsp;</td>";
		   echo"</tr>";
		  echo" <tr>";
			 echo"<td colspan='6'> <p style= align='justify'><align='justify'>&nbsp;&nbsp;&nbsp;&nbsp;
			 This is a rapid chromatographic immunoassay for the qualitative detection of specific antigens to
INFLUENZA A or B present in human nasopharynx.";

		   echo"</tr>";
		     
		   		    
		  echo" <tr>";
			 echo"<td colspan='2'><strong><p>Disclaimer:</p></strong></td>";
			echo" <td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
			 echo"<td>&nbsp;</td>";
		  echo" </tr>";
		  echo" <tr>";
			 echo"<td colspan='6'><p>Influenza Prevention and control, avaiable at http://www.cdc.gov/ndcidod/diseases/flu/fluvirus.htm</p></td>";
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
	</div>
				</td>
		  </tr>
		  
		</table>
		
	</body>
</html>