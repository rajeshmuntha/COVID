<?php
include_once("header_admin.php");
include_once("conn.php");
include_once "left_menu_admin.php";
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
}
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
  <?php 
$vali = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 10);
$validate = strtoupper($vali);
?>
<?php
$auth = $_SESSION['user_id'];
?>
<form action="" method="post" name="form1" id="form1">
<table width="480" height="350" border="0" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>New Staff</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="142">Staff ID</td>
    <td width="328"><input type="text" class="tb1" name="user_id" placeholder="Enter Staff Uniq ID" required/></td>
  </tr>
  <tr>
    <td>Login Password</td>
    <td><input type="password" class="tb1" placeholder="Login Password" name="pass" required>
					</td>
  </tr>
  <tr>
    <td>Staff Name</td>
    <td><input type="text" class="tb1" placeholder="Staff Name" name="name" required></td>
  </tr>
  <tr>
    <td>Designation</td>
    <td><input type="text" class="tb1" placeholder="Designation" name="dgn" required></td></td>
  </tr>
  <tr>
    <td>Role of Staff</td>
    <td><select name="role" class="tb3" required="required">
      <option value="">Select Role</option>
      <option value="2">Admin</option>
      <option value="3">Doctor</option>
      <option value="4">Employee-I</option>
      <option value="5">Employee-II</option>
    </select></td>
    <input type="hidden" name="status" value="0">
	<input type="hidden" name="value" value="1">
  </tr>                                           
  <tr>
    <td height="48" colspan="2" align="center"><input type="submit" name="submit" value="Register" class="tb4" /></td>
  </tr>
</table>
<style>
#des {
  font-family: "cambria";
  border-collapse: collapse;
  width: 900px;
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
<?php
if(isset($_POST["submit"])){
   if(!empty($_POST['user_id']))
 {
	 	$user_id = $_POST['user_id'];
 		$pass = md5($_POST['pass']);
		$name = $_POST['name'];
		$dgn = $_POST['dgn'];
		$role = $_POST['role'];
		$status = $_POST['status'];
		$value = $_POST['value'];
		$query = mysqli_query($conn, "SELECT * FROM authenticate WHERE user_id='".$user_id."'");
		$numrows = mysqli_num_rows($query);
		if($numrows == 0)
			{ 
		 	 $sql = "INSERT INTO authenticate(user_id, pass, name, dgn, role, status, value) VALUES('$user_id', '$pass', '$name', '$dgn', '$role', '$status', '$value')";
			 $result = mysqli_query($conn, $sql);
			 
			 if($result){
			?><center>
            <?php
			echo "<font color = 'green' align='center'><b>".strtoupper($name).":: - Created Successfully</b></font>";
			?>
            </center>
            <?php
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
			echo "<font color = 'red' align='center'><b> ID : ".strtoupper($name)." - Already Exists</b></font>";
				 
			 }
			 }
			 else
			 {
		 }
			}  
		?>
		</center>
      <?php
			   $i=1;
			  // $icno = $_POST['icno'];
            $sqlSelect = mysqli_query($conn, "SELECT * FROM authenticate where value='1' order by id desc");
			
               ?>
               
            <table align='center' id ='des' border="1" width="800">
            <thead>
                <tr>
                	<th width='50'>Sl.No</th>
                    <th width='100'>User ID</th>
                    <th width='350'>Employee Name</th>
                    <th width='150'>Rol of Activity</th>
                    <th width='40'>Status</th>
                    
                </tr>
            </thead>
<?php
                
                while ($row = mysqli_fetch_array($sqlSelect)) {
                    ?>
                    
                <tbody>
                <tr>
                <td><?php  echo $i; ?></td>
                <td><?php  echo strtoupper($row['user_id']); ?></td>
                <td><?php  echo $row['name'];?></td>
				<td><?php  //echo $row['role']; 
				
				switch($row['role'])
					{
						case 1: echo "Super Admin";
								break;
						case 2: echo "Admin";
								break;
						case 3: echo "Doctor";
								break;
						case 4: echo "Employee-I";
								break;
						case 5: echo "Employee-II";
								break;
					}
				
				?></td>
                    <td><?php  //echo $row['status'];                    
					switch($row['status'])
					{
						case 0: echo "<font color='red'>INACTIVE</font>";
								break;
						case 1: echo "<font color='green'>ACTIVE</font>";
								break;
					}
					
					?></td>
                  <!-- <td><a href="patient_view.php?id=<?php //echo $row["id"]; ?>" target="_blank"><button><img src="img/correct.gif" width="20" height="20"></button></td>!-->
                </tr>
                    <?php
					$i++;
                }
                ?>
                </tbody>
        </table>
        <?php //} ?>