<?php
include_once("header_level-I.php");
include_once("conn.php");
// include_once "left_menu_emp1.php";
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
    <!-- Bootstrap 5.3 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
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
</head>
<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
<section class="pt-5">
  <div class="container table-responsive p-4 shadow-lg rounded rounded-4">
    <h4 class=" text-center text-primary">Patient Records</h4>
    <div class="">
        <form action="" method="post" >
            <div class="float-end py-4">
                <span>Patient IC/Passport No: </span>
                <input type="text" class="" name="icno" placeholder="Enter Uniq ID" required=""/>
                <input type="submit" class="btn btn-outline-success btn-sm" name="submit" value="Get Details">
            </div>
        </form>
    </div>
    <table class="table table-responsive table-hover table-bordered">
        <?php
			$i=1;
			$icno = $_POST['icno'];
            $sqlSelect = mysqli_query($conn, "SELECT * FROM patient where icno like '%".$icno."%' order by id desc LIMIT 15"); ?>
      <thead>
        <tr class="text-center">
          <th scope="row"">Sl No.</th>
          <th>IC/Passport No</th>
          <th>Patient Name</th>
          <th>Phone Number</th>
          <th>Reg. No.</th>
          <th>DOR</th>
          <th>Details</th>
        </tr>
      </thead>
      <?php
        while ($row = mysqli_fetch_array($sqlSelect)) {
                    ?>
      <tbody>
      <tr class="text-center">
          <td><?php  echo $i; ?></td>
          <td><?php  echo strtoupper($row['icno']); ?></td>
          <td><?php  echo $row['f_name']. '&nbsp;'.$row['l_name'];?></td>
		  <td><?php  echo $row['phno']; ?></td>
          <td><?php  echo $row['validation']; ?></td>
          <td><?php  echo $row['time'];?></td>
		  <td><a href="patient_view.php?id=<?php echo $row["id"]; ?>" target="_blank"><button><img src="img/correct.gif" width="15" height="15"></button></td>
      </tr>
        <?php
			$i++;
                }
                ?>
      </tbody>
    </table>
  </div>
</section>



</body>

</html>