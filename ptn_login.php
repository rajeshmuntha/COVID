<?php
include_once 'conn.php';
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<body id="login-page">-->
<script language="javascript" type="text/javascript">
window.history.forward();
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/icon" href="img/favicon.png"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SP CARE | COVID REPORTS</title>
<link rel= "stylesheet" href="style.css" />
<style type="text/css">
#backimg {
	width: 100%;
	position: fixed;
	z-index: -100;
	left: 0px;
	top: 0px;
	min-height: 100%;
	min-width: 100%;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
<style type="text/css">
.tb1 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 5px; 
    border: 1.5px solid #3db2e1; 
    outline:0; 
    height:40px; 
    width: 290px;
	font-family: courier;
}

  </style>
</head>
<body>
<img src="img/back.png" name="backimg" width="auto" height="auto" id="backimg" />
	<div class="loginbox">
    	
      <h2 style="color: #332b92;"><img src="img/login.png" class ="" style="width: 30%; margin-bottom: 9px;"><br />SP GROUP</h2>
        <form method="POST" style="margin-bottom: 0px;">
        	<p style="color: #332b92;">IC/Passport No</p>
            <div class="inputbox">
            <input type="text" name="icno" placeholder="IC/Passport No." required=""/>
            <span><i class="fa fa-user" aria-hidden="true"></i></span>
            </div>
            <p style="color: #332b92;">Reg. No.</p>
            <div class="inputbox">
          
              <p><input type="password" name="validation" placeholder="Reg No" required=""/></p>
               
                
                <span><i class="fa fa-lock" aria-hidden="true"></i></span></p>
            </div>
            <center>
              <p>
<?php

session_start();
if(isset($_POST["submit"]))
	{
		$_SESSION["icno"] = $_POST["icno"];
		$_SESSION["validation"] = $_POST["validation"];
		$_SESSION['last_time'] = time();
		if(!empty($_POST['icno']) && !empty($_POST['validation']))
		{
			$icno = $_POST['icno'];
			$validation = $_POST['validation'];
			$query = mysqli_query($conn, "SELECT * FROM patient WHERE icno='".$icno."' AND validation='".$validation."'");
			$numrows= mysqli_num_rows($query);
			if($numrows!=0)
			{
				$_SESSION['islogin'] = 'Y';
				while($row = mysqli_fetch_assoc($query))
				{
					$username=$row['icno'];
					$password=$row['validation'];
					//$role=$row['role'];
					//$status=$row['status'];
					//$date = $row['time'];
					//$end = date("Y-m-d",strtotime(date("Y-m-d", strtotime($date)). " + 20 day"));
				}
				if($icno == $username && $validation == $password)
				
				{
					//if(date("Y-m-d") < $end)
					//{
					header('Location:ptn_dashboard.php? = Patient Dashboard?');				
					//}
				//	else{
				//		echo"<center>Lisence Expire</center>";
						
				//	}
				}

				else
				{
					echo "invalid user_id name password";
				}
			}
			else
		{
				echo "<br><div style='text-align:center'><div style ='font:12px/21px Arial,Helvetica;color:#ff0000'>Invalid User ID & Password";
			}
		}
	}
?>
<input type="submit" name="submit"/>
        </form>
    </p>
</center>      
     </div>

</body>
</html>