<?php
include_once("header_super_admin.php");
include_once("conn.php");
?> 

<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
}
?>
<html>
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
$auth = $_SESSION['user_id'];
?>
<br />        
      <?php
			   $i=1;
			  // $icno = $_POST['icno'];
            $sqlSelect = mysqli_query($conn, "SELECT * FROM authenticate where value='1' order by id desc");
			
               ?>
               
            <table align='center' border="1" width="800">
            <thead>
                <tr>
                  <th colspan="6"><strong>Employee Permissions</strong></th>
                </tr>
                <tr>
                	<th width='50'>Sl.No</th>
                    <th width='100'>User ID</th>
                    <th width='350'>Employee Name</th>
                    <th width='150'>Rol of Activity</th>
                    <th width='40'>Status</th>
                    <th width='40'>Up</th>
                    
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
						case 0: echo "<font color='red'>PENDING</font>";
								break;
						case 1: echo "<font color='green'>ACTIVATED</font>";
								break;
					}
					
					?></td>
                   <td><a href="employee_enable.php?id=<?php echo $row["id"]; ?>"><button><img src="img/correct.gif" width="20" height="20"></button></td>
                </tr>
                    <?php
					$i++;
                }
                ?>
                </tbody>
        </table>
        <?php //} ?>