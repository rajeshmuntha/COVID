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
      <section class="">
  <div class="container p-4 shadow-lg rounded rounded-4">
                <form action="" method="POST">
                  <table class="table-responsive table table-hover table-bordered text-center align-middle ">
                  <thead>
        <tr><th colspan="3" class="bg-light text-primary fs-4">Panel Wise Registrations</th></tr>
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
    
<table class="table-responsive table table-hover table-bordered text-center align-middle  animate__animated animate__bounceInDown">
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

 