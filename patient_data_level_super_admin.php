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
<?php
$auth = $_SESSION["user_id"];
if($auth =='')
{
echo '<script type="text/javascript">
location.replace("logout.php? = Invalid Login");
 </script>';
}
?>
<!DOCTYPE html>
<html>

<head>
<script src="jquery-3.2.1.min.js"></script>
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</head>
<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    <div class="">
    <section class="animate__animated animate__fadeInRight">
  <div class="container p-4 table-responsive shadow-lg rounded rounded-4">
    <table class=" table table-bordered">
        <tr>
          <th class="text-center bg-light text-primary fs-4">Patient Records</th>        
        <tr>
        	<td align="right">
           <form action="patient_data_level_super_admin_res.php? = Record search data" method="post" >
               Patient IC/Passport No: 
                 <input type="text" class="" name="icno" placeholder="Enter IC/Passport No." required/>
                <input type="submit" class="btn btn-secondary" name="submit" value="Search">
            </form>
            </td>
        <tr>
        </table>
               <?php
			   $i=1;
			   //$icno = $_POST['icno'];
            //$sqlSelect = mysqli_query($conn, "SELECT * FROM patient where icno like '%".$icno."%' order by id desc LIMIT 15");
			$sqlSelect = mysqli_query($conn, "SELECT * FROM patient order by id desc LIMIT 250");
			
               ?>
            <div class="table-data-scroll">   
            
    <table class=" table table-hover table-bordered rounded rounded-2 text-center align-middle">
            <thead>
                <tr>
                	<th class="bg-light align-middle" width='20'>S.No</th>
                    <th class="bg-light align-middle" width='90'>IC/Passport No</th>
                    <th class="bg-light align-middle" width='280'>Patient Name</th>
                    <th class="bg-light align-middle" width='90'>Test Type</th>
                    <th class="bg-light align-middle" width='80'>Reg. No.</th>
                    <th class="bg-light align-middle" width='100'>Test Location</th>
					<th class="bg-light align-middle" width="140">DOR</th>
                    <th class="bg-light align-middle" width='40'>Details</th>
                    
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
				<td><!--<?php  echo $row['t_type']; ?>--><?php  //echo $row['t_type']; 
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
                
               </td>
               <td><?php  echo $row['validation']; ?></td>
                    <td><?php  echo $row['t_location']; ?></td>
                    <td><?php  echo $row['time'];?></td>
					                    
                   <td><a href="patient_view.php?id=<?php echo $row["id"]; ?>" target="_blank"><button class="btn btn-outline-light"><img src="img/correct1.gif" width="30" height="auto"></button></td>
                </tr>
                    <?php
					$i++;
                }
                ?>
                </tbody>
        </table>
        </div>
        <?php //} ?>
            </section>
    </div>

</body>

</html>