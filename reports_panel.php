<?php
include_once("header_super_admin.php");
include_once("conn.php");
?>

<?php  
 //$connect = mysqli_connect("localhost", "covid", "covid", "covidreports");  
 $query = "SELECT * FROM patient ORDER BY id desc";  
 $result = mysqli_query($conn, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title></title>  
        
      </head>  
      <body>  
      <style type="text/css">
 
.tb1 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
	font-family: "Cambria";
    outline:0; 
    height:30px; 
	width: 180px; 
    
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
                  <form action="panel_action_report.php" method="POST">
                 <table width="900" align="center">
                <tr>
                    <td><select name="p_id" class="tb1" required=""/>
                 <option value="#">Select Panel</option>
                 <?php
					   $type = mysqli_query($conn, "SELECT * FROM panel where process_id='4'");
					    while ($row = mysqli_fetch_array($type)) 
						{
						
					  ?>
                 <option value="<?php echo $row['p_id'];?>"><?php echo $row['mode'];}?>             
				 </option></select>	
                    </td>
                    <td> <input type="date" name="from_date" id="from_date" class="tb1" placeholder="From Date" required/> 
                    </td>
                    <td> <input type="date" name="to_date" id="to_date" class="tb1" placeholder="To Date" required/> 
                    </td>
                    <td><input type="submit" class="tb1" name="submit" value="Generate Invoice">  
                    </td>
                   <td>  
                    </td>
                </tr>
                
                </table>
                
                 
                </form> 
                <div style="clear:both"></div>                 
                <br />  
                  
           </div>  
      </body>  
 </html>  
 