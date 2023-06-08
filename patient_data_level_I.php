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

</head>
<body>

<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
<section class="pt-5">
  <div class="container table-responsive p-4 shadow-lg rounded rounded-4 ">
    <h4 class=" text-center text-primary">Patient Records</h4>
    <div class="">
        <form action="patient_data_level_I_res.php? = Record search data" method="post" >
            <div class="float-end py-4">
                <span>Patient IC/Passport No: </span>
                <input type="text" class="" name="icno" placeholder="Enter IC/Passport No " required=""/>
                <input type="submit" class="btn btn-outline-success btn-sm" name="submit" value="Get Details">
            </div>
        </form>
    </div>
    <table class="table table-hover table-bordered align-middle">
        <?php
		   $i=1;
		   $sqlSelect = mysqli_query($conn, "SELECT * FROM patient order by id desc LIMIT 150"); ?>
      <thead class=" ">
        <tr class=" text-center align-middle">
          <th scope="row" class="bg-light">Sl No.</th>
          <th class="bg-light">IC/Passport No</th>
          <th class="bg-light">Patient Name</th>
          <th class="bg-light">Test Type</th>
          <th class="bg-light">Reg. No.</th>
          <th class="bg-light">test Location</th>
          <th class="bg-light">DOR</th>
          <th class="bg-light">Details</th>
        </tr>
      </thead>
      <?php
           while ($row = mysqli_fetch_array($sqlSelect)) {  ?>
      <tbody>
        <tr class="text-center">
            <td><?php  echo $i; ?></td>
            <td><?php  echo strtoupper($row['icno']); ?></td>
            <td><?php  echo $row['f_name']. '&nbsp;'.$row['l_name'];?></td>
			<td><!--<?php  echo $row['t_type']; ?>--><?php  //echo $row['t_type']; 
                switch($row['t_type']){
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
               ?></td>
            <td><?php  echo $row['validation']; ?></td>
            <td><?php  echo $row['t_location']; ?></td>
            <td><?php  echo $row['time'];?></td>
            <td><a href="patient_view.php?id=<?php echo $row["id"]; ?>" target="_blank"><button class="btn btn-outline-light"><img src="img/correct1.gif" width="20" height="auto"></button></td>
        </tr>
            <?php
				$i++;
                } ?>
      </tbody>
    </table>
  </div>
</section>




</body>

</html>