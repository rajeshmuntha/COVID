<?php
//include_once("header_level-I.php");
include_once("conn.php");
error_reporting( error_reporting() & ~E_NOTICE )
?> 

<link rel="shortcut icon" type="image/icon" href="img/favicon.png"/>

<table width="943" border="0" align="center">
   <tr>
   <td align="right">
     <!--<td align="right"><a href="subject_list.php"><button><img src="img/back.png" width="20" height="20" /></button></a>-->
     <button onClick="printContent('div1')"><img src="img/print.png" width="20" height="20" /></button></div>&nbsp;</td>
     
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
 <div id="div1">
 	<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap');
</style>
<style type="text/css">
td.box {
		width: auto;
		height: auto;
		border: 2px solid #000;
		border-color: red;
		border-radius: 10px;
	}
td.results {
		width: auto;
		height: auto;
		border: 2px solid #000;
		border-color: blue;
		
	}
.tb1{
	width: 800px;
	border-collapse: collapse;
	height: 20px;
	text-align: center;
	font-family: "Times New Roman";
	font-size: 15px;
	border:#4e95f4;
	}
	.tb2{
	width: 850px;
	text-align: center;
	font-family: "Times New Roman";
	font-size: 18px;
	
	}
	.tb3{
	width: 700px;
	height: 75px;
	border-collapse: collapse;
	text-align: center;
	font-family: "Times New Roman";
	font-size: 30px;
	border:#4e95f4;	
	border :2px solid #4e95f4;
	}
	.tb4{
	width: 800px;
	height: 25px;
	
	font-family: "Times New Roman";
	font-size: 20px;
	
	}
	.tb5{
	        position: fixed; 
            padding: 10px 10px 0px 10px; 
            bottom: 5; 
           
            /* Height of the footer*/  
            height: 20px; 
			
            
       
	}
	.tb6{
	width: 800px;
	font-family: "Times New Roman";
	}
	tb7{
	width: 800px;
	height: 20px;
	text-align: center;
	font-family: "Times New Roman";
	font-size: 15px;
	}
	
</style>

<style>

hr.new2 {
  border-top: 2px dashed black;
}
</style>
<style>
font{
	font-family: "Times Roman";
}


</style>


	 <?php
   	  @$id=$_REQUEST['id'];
	                    $res=mysqli_query($conn,"select * from patient where id='".$id."'");
						
						while($row=mysqli_fetch_array($res))
                        {
							$location = $row["t_location"];
						?>
                        <table width="613" border='0' align='center'>
						<!--<tr>
						  <th colspan="7">&nbsp;</th>
						  </tr>-->
						<tr>
						  <th colspan="7">
                          <?php
                          $print=mysqli_query($conn,"select * from test_location where location='".$location."'");
							while($row_img=mysqli_fetch_array($print))
							{
								//echo $row_img["location_id"];
								$img_id = $row_img["location_id"];
								
								echo "<img src='img/".$img_id.".png' width='935' height='170'>"."";
							}
						?>
                          
                         <!-- <img src="img/receipt.png" width="935" height="156" />!-->
                         
                         </th>
                         </tr>
						<tr>
						  <th height="4" colspan="7">
                          <hr class="new2">
                          </th>
						  </tr>
						<tr>
	 						<th height="37" colspan="7"><strong><u><h2>Official Receipt</h2></u></strong></th>
                           </tr>
                              <tr>
                              <td width="102" height="24">
                              <td colspan="2" style="font-family:roboto;">Reg. No:  <strong><?php echo $row["validation"]; ?>                            
                              </strong>
                              <td width="399">                              
                          <td colspan="3" align="left">Date:&nbsp;&nbsp;<?php echo $row["sys_date"]; ?> </tr>
                            <tr>
                              <td height="24">                              
                              <td width="143">                              
                              <td width="108">                              
                              <td>                              
                              <td width="86" align="right">                              
                              <td colspan="2">                              
                          </tr>
                            <tr>
                              <td height="31">                              
                              <td>Received From
                              <td colspan="5">:&nbsp;&nbsp; <?php  echo $row['f_name']. '&nbsp;'.$row['l_name'];?>  
						       <tr>
                              <td height="31">  
                              <td>IC/Passport No:                             
                              <td colspan="5" style="font-family:roboto;">:&nbsp;&nbsp; <strong><?php echo $row["icno"]; ?></strong>                     
                          </tr>
                            <tr>
                              <td height="24">                              
                              <td>The Sum of Ringgit                              
                              <td colspan="5">:&nbsp;                
                     <?php

               	$payment = $row["rm_online"] + $row["rm_cash"];
				//echo $row["rm_online"] + $row["rm_cash"];

                ?>     
                          <?php
								//$i = "0";
								$num = $payment;
								function numberTowords($num)
								{
								
								$ones = array(
								0 =>"ZERO",
								1 => "ONE",
								2 => "TWO",
								3 => "THREE",
								4 => "FOUR",
								5 => "FIVE",
								6 => "SIX",
								7 => "SEVEN",
								8 => "EIGHT",
								9 => "NINE",
								10 => "TEN",
								11 => "ELEVEN",
								12 => "TWELVE",
								13 => "THIRTEEN",
								14 => "FOURTEEN",
								15 => "FIFTEEN",
								16 => "SIXTEEN",
								17 => "SEVENTEEN",
								18 => "EIGHTEEN",
								19 => "NINETEEN",
								"014" => "FOURTEEN"
								);
								$tens = array( 
								0 => "ZERO",
								1 => "TEN",
								2 => "TWENTY",
								3 => "THIRTY", 
								4 => "FORTY", 
								5 => "FIFTY", 
								6 => "SIXTY", 
								7 => "SEVENTY", 
								8 => "EIGHTY", 
								9 => "NINETY" 
								); 
								$hundreds = array( 
								"HUNDRED", 
								"THOUSAND", 
								"MILLION", 
								"BILLION", 
								"TRILLION", 
								"QUARDRILLION" 
								); /*limit t quadrillion */
								$num = number_format($num,2,".",","); 
								$num_arr = explode(".",$num); 
								$wholenum = $num_arr[0]; 
								$decnum = $num_arr[1]; 
								$whole_arr = array_reverse(explode(",",$wholenum)); 
								krsort($whole_arr,1); 
								$rettxt = ""; 
								foreach($whole_arr as $key => $i){
									
								while(substr($i,0,1)=="0")
										$i=substr($i,1,5);
								if($i < 20){ 
								/* echo "getting:".$i; */
								//$rettxt .= $ones[$i]; 
								}elseif($i < 100){ 
								if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
								if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
								}else{ 
								if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
								if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
								if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
								} 
								if($key > 0){ 
								$rettxt .= " ".$hundreds[$key]." "; 
								}
								} 
								if($decnum > 0){
								$rettxt .= " and ";
								if($decnum < 20){
								$rettxt .= $ones[$decnum];
								}elseif($decnum < 100){
								$rettxt .= $tens[substr($decnum,0,1)];
								$rettxt .= " ".$ones[substr($decnum,1,1)];
								}
								}
								return $rettxt;
								}
								extract($_POST);
								//if(isset($convert))
								//{
								//echo "".numberTowords("$num")."";
								$rs = "".numberTowords("$num")."";
								echo ucwords($rs);
								//}
								?>
						</td>
                          
                          
                          </tr>
                            <tr>
                              <td height="24">                              
                              <td>Being Payment of
                              <td colspan="5">: <?php  //echo $row['t_type']; 
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
                    
               ?>                    
                          </tr>
                            <tr>
                              <td height="24">                              
                              <td>RM                                                           
                              <td colspan="2"><strong>:&nbsp;&nbsp;<?php echo $payment;?>
                              </strong>                            
                              <td align="center">                              
                              <td width="72">                                                            
                              <td width="1">                              
                          </tr>
                            <tr>
                              <td height="31">                              
                              <td>Payment Mode                              
                              <td colspan="2">:&nbsp;&nbsp;<?php //echo $row[" "];
                              switch($row['p_id'])
                           {
                            
                            case 1: echo"CASH";
                            break;
                            case 2: echo"ONLINE";
                            break;
                            case 3: echo"DEBIT/CREDIT Card";
                            break;
                            case 4: echo"PANEL";
                            break;
                            case 5: echo"CHEQUE";
                            break;

                           }

                           ?>

                            <?php echo $row["rm_online"]; ?>,&nbsp;&nbsp;&nbsp; Cash&nbsp;&nbsp; - <?php echo $row["rm_cash"]; ?>                 
                              <td align="center">                                                            
                              <td colspan="2"></tr>
                            <tr>
                              <td height="24">                              
                              <td>Reference
                              <td colspan="2">:&nbsp;&nbsp;<?php echo $row["p_ref"]; ?>
                              <td align="center"><?php echo $row["author"]; }?>
                              <td colspan="2">                              
                          </tr>
                            <tr>
                              <td height="4" colspan="7">
                              
                              <hr class="new2">
                              
                                                                                                                                                                                                                  
                          </tr>
                            <!--<tr>
                              <td height="24">                              
                              <td>                                                            
                              <td>                              
                              <td>                              
                              <td colspan="2">                              
                          </tr>
                            <tr>
                              <td height="24">                              
                              <td align="center">                              
                              <td align="center">                              
                              <td align="center">                              
                              <td colspan="2">                              
                          </tr>-->
                            <tr>
                              <td height="24">                              
                              <td rowspan="4"><img src="img/ptn-reports.png" width="110" height="100" />                                                                                                                        
                              <td colspan="2" align="center">Computer generated Receipt. No signature is required                                                                                          
                              <td align="right">                              
                              <td colspan="2">                              
                          </tr>
                            <tr>
                              <td height="24">                              
                              
                              <td colspan="2" align="center">To get your test results please scan the QR code                              
                              <td align="right">                              
                              <td colspan="2">                              
                          </tr>
                          <tr>
                              <td height="24">                              
                              
                              <td colspan="2" align="center">Please Enter your IC/Passport No and Reg. No. to login                               
                              <td align="right">                              
                              <td colspan="2">                              
                          </tr> 
                           <tr>
                              <td height="24">                              
                              
                              <td colspan="2" align="center"><b>www.spcaregroup.com  </b>                              
                              <td align="right">                              
                              <td colspan="2">                              
                          </tr> 
                                                       <tr>
                              <td>                              
                              <td align="right">                              
                              <td height="31" colspan="7">                              
                          </tr>
                            <tr>
                              <td>                              
                              <td align="right">                              
                            <td height="24" colspan="7"></th>
 </tr>
 </table>  
        
                 