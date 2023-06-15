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
            
<section class="pt-5">
  <div class="container p-4 shadow-lg rounded rounded-4">
                <form action="" method="POST">
                <table class="table-responsive table table-hover table-bordered text-center align-middle ">
                  
    <thead>
        <tr><th colspan="3" class="bg-light text-primary fs-4">Day Wise Registrations</th></tr>
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
  <div class="container p-4 shadow-lg rounded rounded-4">
    
<table class="table-responsive table table-hover table-bordered text-center align-middle ">
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
           WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' group by t_location";  
      $result = mysqli_query($conn, $query);  
     ?>
       		    
              
            <br>
            <table class="table-responsive table table-hover table-bordered text-center align-middle  animate__animated animate__bounceInDown">
            <tr>
            <th colspan='10' class="bg-light text-primary fs-5">Day Wise Registrations <br> Report Results Duration : <?php echo $_POST["from_date"].' to '.$_POST["to_date"]; ?>
            </th>
             </tr>
                <tr>  
                     <th class="bg-light" width="20" align="center">SL.NO</th>  
                     <th class="bg-light" width="100" align="center">Test Location</th>  
                     <th class="bg-light" width="60" align="center">rT-PCR</th>  
                     <th class="bg-light" width="80" align="center">RTK-Antigen</th> 
                     <th class="bg-light" width="100" align="center">RTK-Antigen<br>(PERKESO)</th>  
                     <th class="bg-light" width="100" align="center">Antibody <br>IGM/IGG</th>
                     <th class="bg-light" width="100" align="center">Rapid PCR <br>/Molecular</th>
                     <th class="bg-light" width="90" align="center">SALIVA PCR</th>
                     <th class="bg-light" width="100" align="center">Influenza <br>A & B</th>
					           <th class="bg-light" width="100" align="center">Total <br>Registrations</th>  
                </tr>  
      <?php 
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
             ?>
               <tr>
               		<td><?php echo $i; ?> </td>
                    <td><?php //echo $row["t_location"]; 
					$t_l = mysqli_query($conn, "SELECT * FROM test_location WHERE location = '".$row["t_location"]."'");
					  while ($p_name = mysqli_fetch_array($t_l)) 
						{
							echo $p_name['location'];
													
						}
					
					
					?> </td>
                    <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND t_location = '".$row["t_location"]."' AND t_type = '1'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t1 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
                    <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND t_location = '".$row["t_location"]."' AND t_type = '2'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t2 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
                    <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND t_location = '".$row["t_location"]."' AND t_type = '3'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t3 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
                    <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND t_location = '".$row["t_location"]."' AND t_type = '4'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t4 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
               <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND t_location = '".$row["t_location"]."' AND t_type = '5'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t5 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
               <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND t_location = '".$row["t_location"]."' AND t_type = '6'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t6 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
               <td align="center"><?php 
              $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND t_location = '".$row["t_location"]."' AND t_type = '7'");
                      while ($row1 = mysqli_fetch_array($sql_r)) 
                        {
                            echo $row1['COUNT(t_type)'];
                            $t6 = $row1['COUNT(t_type)'];
                            
                        }
               ?> </td>
                    <td align="center"><?php 
					
					$total = $t1 + $t2 + $t3 + $t4 + $t5 + $t6 + $t7;
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
                     <td colspan="10" class="bg-danger text-white text-center align-middle">No Patient Records Found.</td>  
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
 