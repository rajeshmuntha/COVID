<?php
include_once("header_doctor.php");
include_once("conn.php");
?> 
<?php
session_start();
if (isset($_REQUEST['id'])) {
$id =  $_REQUEST['id'];
$sql = mysqli_query($conn, "SELECT * FROM patient where id = '".$id."'");
while ($row = mysqli_fetch_array($sql)) {
	$validation = $row['validation'];
	$icno = $row['icno'];
	$type = $row['t_type'];
	$validation = $row['validation'];
	$f_name = $row['f_name'];
}
}
?>
<?php

$auth = $_SESSION['user_id'];
?>
<?php
if($type==1)
{
?>


    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!--<script src="drop.js"></script>!-->
<script type="text/javascript">
    $(document).ready(function () {

        $('#slct').change(function () {
            var value = $(this).val(); var toAppend = '';
            if (value == 1) {
                toAppend = "E-GENE : <input type='textbox' class='tb1' name='e_gene' placeholder='E-GENE' required=''>&nbsp;RDRP : <input type='textbox' class='tb1' name='rdrp' placeholder='RDRP' required=''>&nbsp;N-GENE : <input type='textbox' class='tb1' name='ngene' placeholder='N-GENE' required=''>&nbsp;<input type='hidden' class='tb1' name='ct_value' value='0'>";; $("#container").html(toAppend); return;
            }
            if (value == 2) {
                toAppend = "<input type='hidden' name='e_gene' value='0'>&nbsp;<input type='hidden' name='rdrp' value='0'>&nbsp;<input type='hidden' name='ngene' value='0'>&nbsp;<input type='hidden' name='ct_value' value='0'>"; $("#container").html(toAppend); return;
            }
            if (value = 3) {
                toAppend = "<input type='hidden' name='e_gene' value='0'><input type='hidden' name='rdrp' value='0'><input type='hidden' name='ngene' value='0'>CT-VALUE : <input type='text' class='tb1' name='ct_value' placeholder='CT-VALUE' required=''>"; $("#container").html(toAppend); return;

            }

        });

    });
     </script>
     <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
  </head>
 <body>

 <header>
            <nav class="navbar navbar-expand-md fixed-top bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="doctor.php? = Doctor Home Page">
                    <img src="./img/Logo.png" alt="Logo" width="45" height="auto" class="d-inline-block">
                    <span class="fw-bold fs-4 text-danger">COV-19</span><span class="fw-bold fs-4 text-primary"> SYS</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="doctor.php? = Doctor Home Page">Home</a>
                            </li>
                            <li class="nav-item dropdown animate__animated animate__bounceInDown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Test Results
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item active" href="patient_data_level_doctor.php? = Patient Details">Validate</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="report_doc_day_wise.php">Print Report</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <?php
                                session_start();
                                if(isset($_SESSION["user_id"]))
                                {
                                    if((time() - $_SESSION['last_time']) > 180000)
                                    {
                                      header("location:logout.php");
                                    }
                                    else
                                    {
                                      $_SESSION['last_time'] = time();
                                    }
                                  }
                                
                                  {
                                    echo "Hi..".$_SESSION['user_id']."";
                                  }
                              ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end animate__animated animate__flipInX">
                                <li><a class="dropdown-item " href="#">Update Profile</a></li>
                                <li><a class="dropdown-item" href="reset_doc.php?=Passwor Reset">Change Password</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>    
                </div>
            </nav>
  </header>

 <section class="pt-4  animate__animated animate__fadeInRight">
  <div class="container p-4 table-responsive shadow-lg rounded rounded-4">
<form id="form1" method="post" action='' runat="server">
<input type="hidden" name="r_id" value="<?php echo $id;?>"/>
<input type="hidden" name="icno" value="<?php echo $icno;?>"/>
<input type="hidden" name="t_type" value="<?php echo $type;?>"/>
<!--<input type="text" name="r_case" value="2"/>!-->
<input type="hidden" name="validation" value="<?php echo $validation;?>"/>
<input type="hidden" name="uid" value="<?php echo $auth;?>"/>

    <table id="des" class=" table table-hover table-bordered rounded rounded-2">
    <tr>
          <th colspan="2" class="bg-light text-primary fs-4 text-center">VALIDATE  PATIENT RECORD &nbsp; <i class="bi bi-patch-check"></i></th>        
        <tr>
<tr><th>Patient IC NO : </th><td><?php echo $icno;?></td></tr>
<tr><th>Patient Validation : </th><td><?php echo $validation;?></td></tr>
<tr><th>Patient Name : </th><td><?php echo $f_name;?></td></tr>
<tr><th>Patient Test Type : </th><td><?php //echo $type;
$query = mysqli_query($conn, "SELECT * FROM test_type where id = '".$type."'");
while ($row1 = mysqli_fetch_array($query))
	{
		echo $row1['test_type'];
	}

?></td></tr>
<tr><th>
<div><label>Results Type : </label></th><td>
     <select id="slct" name="r_case" class="form-control" required=""/>
	 <option selected value="">Select Validation</option>
	<option value="1">Possitive </option>
     <option value="2">Negative</option>
   <option value="3">Inconclusive</option>
    </select>
<tr><th>Result Value : </th><td>
   <div id="container"></div></td></tr>
</div>
</td></tr>
<tr><td></td><td><input type="submit" name="submit" class='btn btn-outline-primary' value="Submit Patient Record"/></tr></td>

</form>
  </body>
   </html>
 
   <?php
ob_start();
if(isset($_POST["submit"])){
   if(!empty($_POST['r_case']))
 {
	 	$r_id = $_POST['r_id'];
		$icno = $_POST['icno'];
		$t_type = $_POST['t_type'];
		$r_case = $_POST['r_case'];
		$validation = $_POST['validation'];
		$e_gene = $_POST['e_gene'];
		$rdrp = $_POST['rdrp'];
		$ngene = $_POST['ngene'];
		$ct_value = $_POST['ct_value'];
		$uid = $_POST['uid'];
    $query = mysqli_query($conn, "SELECT * FROM results WHERE validation='".$validation."'");
      $numrows = mysqli_num_rows($query);
    if($numrows == 0)
      {
    
	$sql = "INSERT INTO results(r_id, icno,  r_case, t_type, validation, e_gene, rdrp, ngene, ct_value, uid) VALUES('$r_id', '$icno', '$r_case', '$t_type', '$validation', '$e_gene', '$rdrp', '$ngene', '$ct_value', '$uid')";
			 $result = mysqli_query($conn, $sql);
			 
			 if($result){
			?><center>
            <tr><td colspan="2"?
            <?php
			echo "<font color = 'green' align='center'><b>".strtoupper($icno).":: - Results Submitted</b></font>";
			?>
            </td></tr>
            </table>  
			<script>
setTimeout("location.href = 'patient_data_level_doctor.php';",200);
</script>
            </center>
            <?php
		 }
			 else
			 {
			 echo "Failure!";
			 }
		 }
			 
			 }
			 else
			 {
		
			}  
}
else
{
	//echo "Already Exist";
}
}
elseif($type==7)
{

?>
<style>
#des {
  font-family: "cambria";
  border-collapse: collapse;
  width: 800px;
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
  text-align: left;
  background-color: #3db2e1;
  color: white;
  font-size: 16px;
}
</style>
<style type="text/css">
 
.tb1 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
	font-family: "Cambria";
    outline:0; 
    height:30px; 
	 width: 70px; 
    
}
.tb2 {
	-webkit-border-radius: 1px; 
    -moz-border-radius: 1px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
	font-family: "Cambria", Courier, monospace;
    outline:0; 
    height:30px; 
   
}
.tb3 {
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!--<script src="drop.js"></script>!-->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
  </head>
 <body>
<table width="800" border="1" id="des" align="center">
<form name="form1" method="post" action="">
<input type="hidden" name="r_id" value="<?php echo $id;?>"/>
<input type="hidden" name="icno" value="<?php echo $icno;?>"/>
<input type="hidden" name="t_type" value="<?php echo $type;?>"/>
<input type="hidden" name="validation" value="<?php echo $validation;?>"/>
<input type="hidden" name="uid" value="<?php echo $auth;?>"/>

<tr><th colspan="2"><center> Patient Result Board</center></th></tr>
<tr><td width="200">Patient IC NO : </td><td><?php echo $icno;?></td></tr>
<tr><td>Patient Validation : </td><td><?php echo $validation;?></td></tr>
<tr><td>Patient Name : </td><td><?php echo $f_name;?></td></tr>
<tr><td>Patient Test Type : </td><td><?php //echo $type;
$query = mysqli_query($conn, "SELECT * FROM test_type where id = '".$type."'");
while ($row1 = mysqli_fetch_array($query))
	{
		echo $row1['test_type'];
	}
	?></td></tr>

<tr><td>
<div><lable>Influenza A : </lable></td><td>
     <select name="rdrp" class="tb2" required=""/>
	 <option value="">Select</option>
	<option value="1">Possitive </option>
     <option value="2">Negative</option>
      </select>
</div>
</td></tr>
<tr><td>
<div><lable>Influenza B : </lable></td><td>
     <select name="ct_value" class="tb2" required=""/>
	 <option value="">Select</option>
	<option value="1">Possitive </option>
     <option value="2">Negative</option>
      </select>
</div>
</td></tr>
<tr><td></td><td><input type="submit" name="submit" class="tb2" value="submit"/></td></tr>

</form>
  </body>
   </html>
  
<?php
if(isset($_POST["submit"])){
   	 	$id = $_POST['r_id'];
 		$icno = $_POST['icno'];
		$type = $_POST['t_type'];
		$validation = $_POST['validation'];
		//$e_gene = $_POST['e_gene'];
		$rdrp = $_POST['rdrp'];
		//$ngene = $_POST['ngene'];
		$ct_value = $_POST['ct_value'];
		$uid = $_POST['uid'];
			 $sql = "INSERT INTO results(r_id,icno,t_type,r_case,validation,e_gene,rdrp,ngene,ct_value,uid) 
			 VALUES('$id', '$icno', '$type',0,'$validation','1','$rdrp',2,'$ct_value','$uid')";
			 $result = mysqli_query($conn, $sql);
			 if($result)
			 {
				 ?><center>
				<tr><td colspan="2">
				
				 <?php
				 
			 echo "<font color = 'green' align='center'><b>".strtoupper($icno).":: - Results Submitted</b></font>";
			?></center>
				</td></tr>
				<script>
setTimeout("location.href = 'patient_data_level_doctor.php';",1000);
</script>
            </center>
				 <?php
			}
			 else
			 {
			 echo "Failure!";
			 }
		 }
}

	


// load into table default value
else
{
?>
<style>
#des {
  font-family: "cambria";
  border-collapse: collapse;
  width: 800px;
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
  text-align: left;
  background-color: #3db2e1;
  color: white;
  font-size: 16px;
}
</style>
<style type="text/css">
 
.tb1 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
	font-family: "Cambria";
    outline:0; 
    height:30px; 
	 width: 70px; 
    
}
.tb2 {
	-webkit-border-radius: 1px; 
    -moz-border-radius: 1px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
	font-family: "Cambria", Courier, monospace;
    outline:0; 
    height:30px; 
   
}
.tb3 {
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!--<script src="drop.js"></script>!-->
<script type="text/javascript">
    $(document).ready(function () {

        $('#slct').change(function () {
            var value = $(this).val(); var toAppend = '';
            if (value == 1) {
                toAppend = "<input type='hidden' name='e_gene' value='0'>&nbsp;<input type='hidden' name='rdrp' value='0'>&nbsp;<input type='hidden' name='ngene' value='0'>&nbsp;<input type='hidden' name='ct_value' value='0'>";; $("#container").html(toAppend); return;
            }
            if (value == 2) {
                toAppend = "<input type='hidden' name='e_gene' value='0'>&nbsp;<input type='hidden' name='rdrp' value='0'>&nbsp;<input type='hidden' name='ngene' value='0'>&nbsp;<input type='hidden' name='ct_value' value='0'>"; $("#container").html(toAppend); return;
            }
            if (value = 3) {
                toAppend = "<input type='hidden' name='e_gene' value='0'>&nbsp;<input type='hidden' name='rdrp' value='0'>&nbsp;<input type='hidden' name='ngene' value='0'>&nbsp;<input type='hidden' name='ct_value' value='0'>"; $("#container").html(toAppend); return;

            }

        });

    });
     </script>
     <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
  </head>
 <body>
<form id="form1" method="post" action='' runat="server">
<input type="hidden" name="r_id" value="<?php echo $id;?>"/>
<input type="hidden" name="icno" value="<?php echo $icno;?>"/>
<input type="hidden" name="t_type" value="<?php echo $type;?>"/>
<!--<input type="text" name="r_case" value="2"/>!-->
<input type="hidden" name="validation" value="<?php echo $validation;?>"/>
<input type="hidden" name="uid" value="<?php echo $auth;?>"/>
<table width="800" border="1" id="des" align="center">
<tr><th colspan="2"><center> Patient Result Board</center></th></tr>
<tr><td width="200">Patient IC NO : </td><td><?php echo $icno;?></td></tr>
<tr><td>Patient Validation : </td><td><?php echo $validation;?></td></tr>
<tr><td>Patient Name : </td><td><?php echo $f_name;?></td></tr>
<tr><td>Patient Test Type : </td><td><?php //echo $type;
$query = mysqli_query($conn, "SELECT * FROM test_type where id = '".$type."'");
while ($row1 = mysqli_fetch_array($query))
	{
		echo $row1['test_type'];
	}
	?></td></tr>
<tr><td>
<div><lable>Results Type : </lable></td><td>
     <select id="slct" name="r_case" class="tb2" required=""/>
	 <option value="">Select</option>
	<option value="1">Possitive </option>
     <option value="2">Negative</option>
      </select>
   <div id="container"></div>
</div>
</td></tr>
<tr><td></td><td><input type="submit" name="submit" class="tb2" value="submit"/></td></tr>

</form>
  </body>
   </html>
  
<?php
ob_start();
if(isset($_POST["submit"])){
   if(!empty($_POST['r_case']))
 {
	 	$r_id = $_POST['r_id'];
		$icno = $_POST['icno'];
		$t_type = $_POST['t_type'];
		$r_case = $_POST['r_case'];
		$validation = $_POST['validation'];
		$e_gene = $_POST['e_gene'];
		$rdrp = $_POST['rdrp'];
		$ngene = $_POST['ngene'];
		$ct_value = $_POST['ct_value'];
		$uid = $_POST['uid'];
    $query = mysqli_query($conn, "SELECT * FROM results WHERE validation='".$validation."' AND t_type='".$t_type."'");
    $numrows = mysqli_num_rows($query);
    if($numrows == 0)
      {
    
	$sql = "INSERT INTO results(r_id, icno,  r_case, t_type, validation, e_gene, rdrp, ngene, ct_value, uid) VALUES('$r_id', '$icno', '$r_case', '$t_type', '$validation', '$e_gene', '$rdrp', '$ngene', '$ct_value', '$uid')";
			 $result = mysqli_query($conn, $sql);
			 
			 if($result){
			?><center>
            <tr><td></td><td>
            <?php
			echo "<font color = 'green' align='center'><b>".strtoupper($icno).":: - Results Submitted</b></font>";
			
			?></td></tr>
            </table> 
		<script>
setTimeout("location.href = 'patient_data_level_doctor.php';",200);
</script>
            </center>
            <?php
		 }
			 else
			 {
			 echo "Failure!";
			 }
		 }
		 else{
			 echo 'results already submitted';
		     }
			 
			 }
           }
		 else
			 {
				 
				//echo 'Already Exist';
			}  
			
}

			
		?>
       
		</center>