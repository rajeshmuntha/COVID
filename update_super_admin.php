<?php
include_once("header_super_admin.php");
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
}
?>
<?php
include "conn.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select * from patient where id='$id'"); // select query

$data = mysqli_fetch_array($qry);

if(isset($_POST['update'])) 
{
    
  $f_name = strtoupper($_POST['f_name']);
	$l_name = strtoupper($_POST['l_name']);
	$icno = strtoupper($_POST['icno']);
  $dob = strtoupper($_POST['dob']);
  $gender = strtoupper($_POST['gender']);
  $t_type = strtoupper($_POST['t_type']);
	$rm_cash = strtoupper($_POST['rm_cash']);
  $rm_online = strtoupper($_POST['rm_online']);
  $p_ref = strtoupper($_POST['p_ref']);
	
    $edit = mysqli_query($conn,"update patient set f_name='$f_name', l_name='$l_name', icno='$icno', dob='$dob', gender='$gender', t_type='$t_type', rm_cash='$rm_cash', rm_online='$rm_online', p_ref='$p_ref' where id='$id'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
		
		echo '<script type="text/javascript">
				location.replace("update_del_super_admin.php");
			  </script>';
        //header("location:update_del_super_admin.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>
<section class="pt-4 animate__animated animate__fadeInRight">
  <div class="container p-4 table-responsive shadow-lg rounded rounded-4">
<table width="500" class="table table-bordered table-hover align-middle text-center">
  <thead>
    <tr>
      <th colspan="2" class="text-center bg-light text-primary fs-4">Update Patient Details</th>
    </tr>
  </thead>
  
  <form method="POST">
 <tr> <td class="bg-light fw-bold" width="200" hight="30">First Name</td><td><input type="text" class="form-control" name="f_name" value="<?php echo $data['f_name'] ?>" placeholder="Enter First Name" Required></td></tr>
  <tr><td class="bg-light fw-bold" width="200">Last Name</td><td><input type="text" name="l_name" class="form-control" value="<?php echo $data['l_name'] ?>" placeholder="Enter Last Name" Required></td></tr>
 <tr><td class="bg-light fw-bold" width="200"> I/C No.</td><td><input type="text" name="icno" class="form-control" value="<?php echo $data['icno'] ?>" placeholder="Enter Valid ICNO" Required></td></tr>
 <tr><td class="bg-light fw-bold" width="200">DOB</td><td><input type="text" name="dob" class="form-control" value="<?php echo $data['dob'] ?>" placeholder="Date Of Birth" Required></td></tr>
 <tr><td class="bg-light fw-bold" width="200">Gender</td><td><input type="text" class="form-control" name="gender" value="<?php echo $data['gender'] ?>" placeholder="Gender" Required></td></tr>
 <tr><td class="bg-light fw-bold" width="200">Test Type</td><td><input type="text" class="form-control" name="t_type" value="<?php echo $data['t_type'] ?>" placeholder="TEST OBTAINED" Required></td></tr>
 <tr><td class="bg-light fw-bold" width="200">Cash</td><td><input type="text" class="form-control" name="rm_cash" value="<?php echo $data['rm_cash'] ?>" placeholder="CASH" Required></td></tr>
 <tr><td class="bg-light fw-bold" width="200">Online</td><td><input type="text" class="form-control" name="rm_online" value="<?php echo $data['rm_online'] ?>" placeholder="ONLINE" Required></td></tr>
 <tr><td class="bg-light fw-bold" width="200">Reference</td><td><input type="text" class="form-control" name="p_ref" value="<?php echo $data['p_ref'] ?>" placeholder="Reference" Required></td></tr>
 <tr>
   <td colspan="2"><input type="submit" class="btn btn-outline-success" name="update" value="Click to Update"></td></tr>
</form>


</table>