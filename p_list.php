<?php
require_once("conn.php");
if(!empty($_POST["mode"])) 
{
$query =mysqli_query($conn,"SELECT * FROM panel WHERE process_id = '" . $_POST["mode"] . "'");
?>
<option value="">Select Type</option>
<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["p_id"]; ?>"><?php echo $row["mode"]; ?></option>
<?php
}
}
?>
