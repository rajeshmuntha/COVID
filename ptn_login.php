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
<link rel= "stylesheet" href="./css/style-login.css" />
<!-- Google Fonts cdn -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- Bootstrap 5.3 cdn -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<!-- Bootstrap icons cdn -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


</head>
<body>
<section class="container-fluid pt-5 bg-img">
		<div class="container-xxl container-xl container-lg container pad animate__animated animate__zoomIn">
			<div class="row p-4 inner-bg bg-light shadow-lg">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 text-center">
					<img width="60%" height="auto" src="./img/cov-19-logo.png" class="img-fluid" alt="">
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="display-6 text-center">
							<span class=""><span class="text-danger">SP Care Group</span></span> <br>
							<span class="text-primary fs-3 mt-5">*** Patient Login <i class="bi bi-unlock"></i> ***</span>
						</div>
					<div class="mt-4">
						<form method="POST">
						<div class="form-floating mb-3">
							<input type="text" class="form-control bg-light" id="floatingInput" name="icno" placeholder="Enter IC / Passport No." required/>
							<label for="floatingInput">IC / Passport No</label>
						</div>
						<div class="form-floating">
							<input type="password" class="form-control bg-light" id="floatingPassword" name="validation" placeholder="Enter Registration No." required/>
							<label for="floatingPassword">Registration No.</label>
						</div>
						<div class="pt-3 mt-0 ">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="Switch" onclick="SwitchMyFunction()">
                    <p class="text">If not a Robot <i class="text-danger bi bi-robot"></i>, <span class="text-primary">enable switch to Login. </span> </p>
                  </div>                  
                </div>
						
						<div  class="row ">
							<div class="col-xl-6 col-lg-6 col-12 pb-3 d-grid">
								<input type="reset" class="btn btn-secondary" name="submit" value="Click to reset"/>
							</div>	
							<div class="col-xl-6 col-lg-6 col-12 d-grid">
								<input style="display: none;" id="SwitchEnableBtn" type="submit" class="btn btn-primary animate__animated animate__bounceInLeft mb-3" name="submit" value="Click to Login"/>
							</div>					
						</div>


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
        </form> 
				<div  class="row p-2 m-1 rounded rounded-4 bg-white shadow text-center">
						<div class="col-lg-8 col-12">
							<h6 class=" text-danger pt-1">For Queries Please Contact <i class="bi bi-arrow-bar-right"></i></h6>
						</div>
						<div class="col-lg-4 col-12 float-start">
							<a href="tel:0360917725"  onclick="ga('send', 'event', { eventCategory: 'Contact', eventAction: 'Call', eventLabel: 'Mobile Button'});" class=""><i class="fs-6 bi bi-telephone"></i></a>
							<a href="https://wa.link/gp7cqn" target="_blank" class="px-4"><i class="fs-6 bi bi-whatsapp"></i></a>
							<a href="mailto:support@sptechhub.com" class="text-decoration-none"><i class="fs-6 bi bi-envelope-at"></i></a>
						</div>      		    
					</div>
					</div>				
				</div>
			</div>
		</div>
	</section>
  


<!-- Bootstrap js cdn -->
		 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
		 <script>
			// to enable Login button
      function SwitchMyFunction() {
        let checkBox = document.getElementById("Switch");
        let text = document.getElementById("SwitchEnableBtn");
        if (checkBox.checked == true){
          text.style.display = "block";
        } else {
          text.style.display = "none";
        }
      }
		 </script>

</body>
</html>