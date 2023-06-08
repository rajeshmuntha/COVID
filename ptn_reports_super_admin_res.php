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
<style type="text/css">
 
.tb3 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
	font-family: "Cambria";
    outline:0; 
    height:30px; 
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
<table width="1000" border='0' align="center">
        <tr>
          <td align="center"><strong>PATIENT REPORTS</strong></td>        
        <tr>
        	<td align="right">
           <form action="ptn_reports_super_admin_res.php? = Reports" method="post" >
               Patient Uniq ID No: 
                 <input type="text" class="tb3" name="validation" placeholder="Enter Uniq ID" required="">
                <input type="submit" class="tb2" name="submit" value="Search">
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
<br>

<table width="1000" id="des" border="1" align="center" bgcolor="#FFFFFF">

  <tr>
    <td height="35" colspan="3" align="left" valign="middle">Name: <?php echo $f_name.'&nbsp;'.$l_name;?></td>
  </tr>
  <tr>       
    <td height="35"width="500">MRN: <?php echo $icno;?></td>
    <td>GENDER: <?php echo strtoupper($gen);?></td>
  </tr>
  <tr>
  <?php
	$today = date("Y-m-d");
	$diff = date_diff(date_create($dob), date_create($today));
?>
  
    <td height="35">AGE: <?php echo ''.$diff->format('%y');?></td>
    <td>DOB: <?php echo $dob;?></td>
  </tr>
  <tr>
    <td height="35">NATIONAL ID:<?php echo $icno;?> </td>
    <td>DOCTOR: 
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
<br>
<table width="1000" id="des" border="1" align="center" bgcolor="#FFFFFF">
  <tr>       
    <td height="35"width="250" align="center">TEST ID</td>
    <td height="35"width="250" align="center">TEST OBTAINED</td>
    <td height="35"width="250" align="center">COLLECTION DATE </td>
    <td height="35"width="250" align="center">TEST STATUS</td>
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
<table width="1000" align="center">
<tr>
<td align="right">
<button onClick="printContent('div1')"><img src="img/print.png" width="20" height="20" /></button></div>
</td>
</tr>
</table>
 <div id="div1">
<style type="text/css">
.tb1{
	/*width: 800px;*/
	border-collapse: collapse;
	height: 20px;
	text-align: left;
	font-family: "cambria";
	font-size: 15px;
	border:#4e95f4;
	}
	
</style>
<style type="text/css">
.tb7{
	width: 1000px;
	height: 100px;
	border-collapse: collapse;
	
	font-family: "Courier";
	font-size: 16px;
	border:#4e95f4;	
	}
</style>

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
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<table width='1200' class='tb7' height='18' border='0' align='center'>";
			echo "<tr>";
			echo "<td>";
			
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
	      echo"<tr>";
    	  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
		  echo"<td>&nbsp;</td>";
    	  echo" <td>&nbsp;</td>";
		  echo" </tr>";
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
			echo "<br>";
			echo "<table width='1200' class='tb7' height='18' border='0' align='center'>";
			echo "<tr>";
			echo "<td>";
			
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
			echo "<br>";
			echo "<table width='1200' class='tb7' height='18' border='0' align='center'>";
			echo "<tr>";
			echo "<td>";
			
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
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
		    echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
		{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '2' && r_case ='1'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
				$regno = $row['validation'];
			
			echo "<table width='1200' class='tb7' height='18' border='0' align='center'>";
			
			
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
			 echo"<td colspan='6'><p <align='justify'>1.	This test is intended as an aid to early diagnosis of SARS-CoV-2 infection in patient with clinical symptoms to SARS-CoV-2infection.</p><br>
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
			
			echo "<table width='1200' class='tb7' height='18' border='0' align='center'>";
			echo "<tr>";
			echo "<td>";
		echo "<br>";	
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
		  ?>
          
          <!------!-->
           <?php
		 
		{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '3' && r_case ='1'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
				$regno = $row['validation'];
			
			echo "<table width='1200' class='tb7' height='18' border='0' align='center'>";
			
			
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
			 echo"<td colspan='6'><p <align='justify'>1.	This test is intended as an aid to early diagnosis of SARS-CoV-2 infection in patient with clinical symptoms to SARS-CoV-2infection.</p><br>
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
			
			echo "<table width='1200' class='tb7' height='18' border='0' align='center'>";
			echo "<tr>";
			echo "<td>";
		echo "<br>";	
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
		  ?>
         <!-- --------5-------!-->
         <?php
		  
		{
			$results = mysqli_query($conn, "SELECT * FROM results WHERE r_id = '".$p_id."' AND t_type = '5' && r_case ='1'");
			while($row=mysqli_fetch_array($results))
			{
				$d_date = $row['date'];
				$regno = $row['validation'];
			
			echo "<table width='1200' class='tb7' height='18' border='0' align='center'>";
			
			
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
			
			echo "<table width='1200' class='tb7' height='18' border='0' align='center'>";
			
			
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
	}
		  ?>
		  </div>
		 
 <?php
	}

}
else {
           echo "<center>INVALID PATIENT ID</center>";
        }	
		}
	?> 
			 
				</td>
		  </tr>
		  
		</table>


