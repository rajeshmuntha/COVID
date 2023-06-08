<?php
include_once("header_admin.php");
include_once("conn.php");
//include_once "left_menu_emp1.php";
?> 
<style type="text/css">
  
.tb1 {
  
  -webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
  font-family: "Courier New", Courier, monospace;
    outline:0; 
    height:30px; 
   width: 200px;
}
.tb2 {
  -webkit-border-radius: 1px; 
    -moz-border-radius: 1px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
  font-family: "Courier New", Courier, monospace;
    outline:0; 
    height:30px; 
   width: 610px;
}
.tb3 {
  -webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
  font-family: "Courier New", Courier, monospace;
    outline:0; 
    height:30px; 
    width: 150px; 
}
.tb4 {
  -webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
  font-family: "Courier New", Courier, monospace;
    outline:0; 
    height:30px; 
    width: 100px; 
}

  </style>
  
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<script>
function mode(val) {
	$.ajax({
	type: "POST",
	url: "p_list.php",
	data:'mode='+val,
	success: function(data){
		$("#list").html(data);
	}
	});
}
</script>
  <?php 
$vali = substr(str_shuffle("123456789abcdefghjklmnpqrstvwxyz"), 1, 6);
$validate = strtoupper($vali);?>
<?php
//$auth = $_SESSION['user_id'];
?>
<form action="" method="post" name="form1" id="form1">
<table width="811" height="463" border="0" align="center">
  <tr>
    <td colspan="4" align="center"><strong>Patient Details</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="145">First Name</td>
    <td width="234"><input type="text" class="tb1" name="f_name" placeholder="FIRST NAME" required/></td>
    <td width="169">Last Name</td>
    <td width="245"><input type="text" class="tb1" name="l_name" placeholder="LAST NAME"/></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><select name="gender" class="tb3" required>
                      <option selected>Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Others">Others</option>
                    </select></td>
    <td>Date of Birth</td>
    <td><input type="date" id="birthdaytime" name="dob" value="dd-mm-yyyy" class="tb3" required></td>
  </tr>
  <tr>
    <td>IC/Passport No</td>
    <td><input type="text" class="tb1" id="icno" placeholder="IC / Passport No" name="icno" required>
          <input type="hidden" name="validation" value="<?php echo $validate; ?>"></td>
    <td>Phone Number</td>
    <td><input type="text" class="tb1" id="phno" placeholder="Phone Number" name="phno" required></td>
  </tr>
  <tr>
    <td>Eamil ID</td>
    <td><input type="email" class="tb1" id="email" placeholder="Email ID" name="email"></td>
    <td>Post Code</td>
    <td><input type="text" class="tb1" id="postcode" placeholder="Post Code" name="pincode"></td>
  </tr>
  <tr>
    <td>Address Line-I</td>
    <td colspan="3"><textarea class="tb2" rows="1" placeholder="Address Line 1" id="comment" name="address" ></textarea></td>
  </tr>
  <tr>
    <td>Address Line-II</td>
    <td colspan="3"><textarea class="tb2" rows="1" placeholder="Address Line 2" id="comment" name="street" ></textarea></td>
  </tr>
  <tr>
    <td>State</td>
    <td><select name="state" class="tb3" required>
                      <option value="" selected>Select State</option>
                      <option value="Johor">Johor</option>
                      <option value="Kedah">Kedah</option>
                      <option value="Kelantan">Kelantan</option>
                      <option value="Kuala Lumpur">Kuala Lumpur</option>
                      <option value="Labuan">Labuan</option>
                      <option value="Malacca">Malacca</option>
                      <option value="Negeri Sembilan">Negeri Sembilan</option>
                      <option value="Pahang">Pahang</option>
            <option value="Penang">Penang</option>
            <option value="Perak">Perak</option>
            <option value="Perlis">Perlis</option>
            <option value="Putrajaya">Putrajaya</option>
            <option value="Sabah">Sabah</option>
            <option value="Sarawak">Sarawak</option>
            <option value="Selangor">Selangor</option>
            <option value="Terengganu">Terengganu</option>
                    </select></td>
    <td>Test Type</td>
    <td><select name="t_type" class="tb3" required>
                      <option value="" selected>Type of Test</option>
                      <?php $test =mysqli_query($conn,"SELECT * FROM test_type");
							while($row=mysqli_fetch_array($test))
							{ ?>
      						<option value="<?php echo $row['id'];?>"><?php echo $row['test_type'];?></option>
     						 <?php
							}
						?>
                    </select></td>
  </tr>
  <tr>
    <td>Test Location</td>
    <td><select name="t_location" class="tb3" required>
                      <option value="" selected>Test Location</option>
                      <option value="Walk-Thru">RM Walk-Thru</option>
                      <option value="SC-Walk-Thru">SC-Walk-Thru</option>
                      <option value="KD-Walk-Thru">KD-Walk-Thru</option>
                      <option value="Onsite">Onsite</option>
                      <option value="RT-Walk-Thru">RT-Walk-Thru</option>
                      <option value="AG-Walk-Thru">AG-Walk-Thru</option>
                      <option value="CH-Walk-Thru">CH-Walk-Thru</option>
                      <option value="ADLS-Walk-Thru">ADLS-Walk-Thru</option>
                    </select></td>
    <td>Cash</td>
    <td><input type="text" class="tb1" id="text" placeholder="RM000" name="rm_cash"></td>
  </tr>
  <tr>
    <td>Mode of Payment</td>
    <td><select onChange="mode(this.value);"  name="p_mode" class="tb1" required="">
      <option value="">Select</option>
      <?php $query =mysqli_query($conn,"SELECT * FROM pay_mode");
while($row=mysqli_fetch_array($query))
{ ?>
      <option value="<?php echo $row['id_mode'];?>"><?php echo $row['mode'];?></option>
      <?php
}
?>
    </select></td>
    <td>Select List :</td>
    <td> 	<select name="p_id" id="list" class="tb1" required="">
      		<option value="">Select</option>
    		</select>           </td>
  </tr>
  <tr>
    <td>Reference NO</td>
    <td><input type="text" class="tb1" id="referenceno" placeholder="Reference No" name="p_ref" required /></td>
    <td>RM</td>
    <td><input type="text" class="tb1" id="text2" placeholder="RM000" name="rm_online" required /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <!--<td>Date</td>
    <td><input type="date" id="birthdaytime" name="reg_date" class="tb3" required>!-->
           <input type="hidden" name="author" value="<?php echo $auth; ?>">
 <?php
//echo  date("Y-m-d");
$sys_date = date("Y-m-d");

?>
           <input type="hidden" name="reg_date" value=""></td>
           <input type="hidden" name="sys_date" value="<?php echo $sys_date; ?>"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"><input type="submit" name="submit" value="Register" class="tb4"></td>
  </tr>
</table>

<?php

if(isset($_POST["submit"])){
   if(!empty($_POST['f_name']))
 {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $icno = $_POST['icno'];
    $validation = $_POST['validation'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $street = $_POST['street'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $t_type = $_POST['t_type'];
    $t_location = $_POST['t_location'];
    $rm_online = $_POST['rm_online'];
    $rm_cash = $_POST['rm_cash'];
    $p_mode = $_POST['p_mode'];
	$p_id = $_POST['p_id'];
    $p_ref = $_POST['p_ref'];
   $reg_date = $_POST['reg_date'];
   //if($_POST['reg_date']=="") {$reg_date= 0; }else{$reg_date = $_POST['reg_date'];}
    $author = $_POST['author'];
	 $sys_date = $_POST['sys_date'];
    
      $query = mysqli_query($conn, "SELECT * FROM patient WHERE icno='".$icno."' AND sys_date = '".$sys_date."'");
      $numrows = mysqli_num_rows($query);
    if($numrows == 0)
      { 
     //Insert to Mysqli Query
    // $sql = "INSERT INTO ptn_registration(f_name, l_name, gender, dob, icno, phno, email, address, street, pincode, state, t_type, c_amount, p_ref, reg_date) VALUES('$f_name', '$l_name', '$gender', '$dob', '$icno', '$phno', '$email', '$address', '$street', '$pincode', '$state', '$t_type', '$c_amount', '$p_ref', '$reg_date')";
    //   $result = mysqli_query($conn, $sql);
       $sql = "INSERT INTO patient(f_name, l_name, gender, dob, icno, validation, phno, email, address, street, pincode, state, t_type, t_location, rm_online, rm_cash, p_mode, p_id, p_ref, reg_date, author, sys_date) VALUES('$f_name', '$l_name', '$gender', '$dob', '$icno', '$validation', '$phno', '$email', '$address', '$street', '$pincode', '$state', '$t_type', '$t_location', '$rm_online', '$rm_cash', '$p_mode', '$p_id', '$p_ref', '$reg_date', '$author', '$sys_date')";
       $result = mysqli_query($conn, $sql);
       
       if($result){
      // echo "Created Successfully";
      // echo "<font color = 'green' align='center'><b>".strtoupper($f_name).":: - Created Successfully</b></font>";
      echo "<script type='text/javascript'>alert('Registered successfully!')</script>";
     }
       else
       {
       echo "Failure!";
       }
     }
       else
       {
		   ?>
           <center>
           <?php
       //echo "That Reg.NO already exists!";
      echo "<font color = 'red' align='center'><b> IC/Passport No : ".strtoupper($icno)." - has been registered ".strtoupper($auth)."</b></font>";
      //echo "<b><br>".$name." - Already Exists</b>";
   
       }
       }
       else
       {
     }
      }  
    ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>