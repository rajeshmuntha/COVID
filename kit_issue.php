<?php
include_once("header_level-II.php");
include_once("conn.php");
?> 
<?php
	                   
						$id =$_REQUEST['id'];
						$res=mysqli_query($conn,"select * from patient where id = '".$id."'");
                        while($row=mysqli_fetch_array($res))
                        {
                        //echo $row["user_id"]; 
						break;
						} 
	   			?>
                <?php

$date = date("Y-m-d");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
    <!-- Google Fonts cdn -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5.3 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="jquery-3.2.1.min.js"></script>
</head>
<body>
<div class="form">
<style type="text/css">

.tb1 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 2px; 
    border: 1.5px solid #3db2e1; 
    outline:0; 
    height:30px; 
    width: 200px; 
	font-family: "Cambria";
}
.tb2 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 2px; 
    border: 1.5px solid #3db2e1; 
    outline:0; 
    height:30px; 
    width: 170px; 
	font-family: "Courier New", Courier, monospace;
}
.tb3 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 2px; 
    border: 1.5px solid #3db2e1; 
    outline:0; 
    height:30px; 
    width: 70px; 
	font-family: "Courier New", Courier, monospace;
}
</style>
<p>
<?php
ob_start();
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id =$_REQUEST['id'];
$reg_date = $_REQUEST['reg_date'];
$status = $_REQUEST['status'];
$update="update patient set reg_date='".$reg_date."',status='".$status."' where id='".$id."'";
		$sql = "INSERT INTO kit_approved(kit_id) VALUES('$id')";
		$result = mysqli_query($conn, $sql);
mysqli_query($conn, $update) or die(mysqli_error());
$status = "Updated Successfully. </br></br>";
echo "<center>Name: ".$row['name']." <p style='color:#006600;'>".$status."</center>";
echo '<script type="text/javascript">location.replace("patient_data_level_II.php");</script>';
}else {

?>
</p>

<section class="pt-5">
  <div class="container p-4 shadow-lg rounded rounded-4">
    <form name="form" method="post" action=""> 
        <input type="hidden" name="new" value="1" />
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <table class="table table-responsive table-hover table-bordered">
        <thead>
            <tr class="text-center fs-4">
            <th scope="row" colspan="2" class="bg-light text-primary">Approve the Kit</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th scope="col">IC / NO : </th>
                <td><?php //echo $row['year'];
                      $res5=mysqli_query($conn,"select * from patient where id = '".$row['id']."'");
                      while($row5=mysqli_fetch_array($res5)){
                      echo $row5["icno"]; 
                      }
                  ?>
                </td>
            </tr>
            <tr>
                <th scope="col">Name : </th>
                <td><?php echo $row['f_name'].''.$row['l_name'];?></td>
            </tr>
            <tr>
                <th scope="col">Date of Registration : </th>
                <td><?php echo $row['time'];?></td>
            </tr>
            <tr>
                <th scope="col">Date of Approving : </th>
                <td><input type="date" class="form-control" name="reg_date" required/></td>
            </tr>
            <tr>
                <th scope="col">Kit Raising: </th>
                <td>
                  <select name="status" class="form-control" required/>
                      <option value="">Select</option>
                      <option value="1">Kit Approved</option>
                      <option value="1">Come back with remarks</option>
                  </select>
                </td>
            </tr>
            <tr class="">
                <th scope="row" colspan="2"><input name="submit" class="btn btn-outline-success" type="submit" value="Update Kit Issue" /></th>
            </tr>
        </tbody>
        </table>
    </form>
  </div>
</section>

<?php } ?>

</body>
</html>
