<?php
include_once("header_doctor.php");
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
 

<style type="text/css">
 
.tb1 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
	font-family: "Cambria";
    outline:0; 
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
</head>
<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    <div class="outer-scontainer">
        <div class="row" align='center'>
        <table width="1200">
        <tr>
          <td align="center"><strong>PATIENT REPORTS</strong></td>        
        <tr>
        	<td align="right">
           <form action="" method="post" >
               Patient IC/Passport No: 
                 <input type="text" class="tb1" name="icno" placeholder="Enter IC/Passport No.">
                <input type="submit" class="tb2" name="submit" value="Search">
            </form>
            </td>
        <tr>
        </table>
               <?php
			   $i=1;
			   $icno = $_POST['icno'];
            $sqlSelect = mysqli_query($conn, "SELECT * FROM patient where icno like '%".$icno."%' order by id desc LIMIT 15");
			//$sqlSelect = mysqli_query($conn, "SELECT * FROM patient where icno = $icno group by icno LIMIT 10");
               ?>
               
            <table align='center' border="1" width="1200">
            <thead>
                <tr>
                	<th width='40'>S.No</th>
                    <th width='100'>IC/Passport No</th>
                    <th width='250'>Patient Name</th>
                    <th width='150'>Phone No</th>
                    <th width='150'>E-mail ID</th>
					<th width="120">DOT</th>
                    <th width='40'>Details</th>
                    
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
				
               <td><?php  echo $row['phno']; ?></td>
                    <td><?php  echo $row['email']; ?></td>
                    <td><?php  echo $row['time'];?></td>
					                    
                   <td><a href="patient_view.php?id=<?php echo $row["id"]; ?>" target="_blank"><button><img src="img/correct.gif" width="20" height="20"></button></td>
                </tr>
                    <?php
					$i++;
                }
                ?>
                </tbody>
        </table>
        <?php //} ?>
    </div>

</body>

</html>