<?php
include "conn.php";
include_once "header_level-I.php";
// include_once "left_menu_emp1.php";

?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
}
?>
<?php
$auth = $_SESSION["user_id"];
if($auth =='')
{
echo '<script type="text/javascript">
location.replace("logout.php? = Invalid Login");
 </script>';
}
?>

<?php
//session_start();
$auth = $_SESSION['user_id'];
$res=mysqli_query($conn,"select * from authenticate where user_id='".$auth."'");
						while($row=mysqli_fetch_array($res))
                        {
						$emp_id = $row["user_id"];
						$emp_name = $row["name"];
						$emp_des = $row["dgn"];
						$emp_type = $row["role"];
						
						}
?>
    <!-- Google Fonts cdn -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5.3 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
body 
* {box-sizing: border-box;}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 50;
  right: 50px;
  border: 1px solid white;
  border-radius: 20px !important;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  /* margin-bottom: 100px; */
  max-width: 250px;
  padding: 10px;
  background-color: #ddd;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #fff;
  resize: none;
  min-height: 150px;
  border-radius: 10px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ffece7;
  border: 1px solid maroon;
  outline: none;
}


</style>
<section class="pt-5 animate__animated animate__backInRight">
  <div class="container p-4 shadow-lg rounded rounded-4">
    <table class="table-responsive table table-hover table-bordered">
      <thead>
        <tr class="fs-5">
          <th scope="col" colspan="4" class="bg-light text-primary">
            <?php
            include_once "time.php"; ?>
          </th>
        </tr>
      </thead>
      <thead>
        <tr class="text-center fs-3">
          <th scope="col" colspan="3" class="bg-light text-primary">Welcome to SP CARE GROUP <span class="text-danger"> COV-19 SYS</span></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row" rowspan="5" class="text-center">
            <?php
            echo "<img src='img/staff_pics/".$emp_id.".avif' width='100' height='auto'>"."";
            ?>
          </th>
        </tr>
        <tr>
          <th scope="row">User ID :</th>
          <td><?php echo $emp_id;?></td>
        </tr>
        <tr>
          <th scope="row">Employee Name :</th>
          <td ><?php echo $emp_name;?></td>
        </tr>
        <tr>
          <th scope="row">Designation :</th>
          <td ><?php echo $emp_des;?></td>
        </tr>
        <tr>
          <th scope="row">User Type :</th>
          <td >
            <?php //echo $emp_type;
            switch($emp_type)
            {
              case 1: echo"Super Admin";
              break;
              case 2: echo"Admin";
              break;
              case 3: echo"Doctor";
              break;
              case 4: echo"Employee-I";
              break;
              case 5: echo"Employee-II";
              break;
            }?>
          </td>
        </tr>
        <tr>
          <th scope="row" colspan="3"><span class=" float-end">Click to Register your Queries :- <button class="btn btn-danger btn-sm " onclick="openForm()">Click Here</button></span></th>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<div class="row mt-2 fixed-bottom">
  <div class="col-lg-12 text-center">
    <p style="font-size: 12px;" class=" test-muted">Copyright &#169; 2019-2023.
    <a class="text-decoration-none" href="https://sptechhub.com/" target="_blank"> SPTECHHUB</a></p>
  </div>
</div>


<!-- <button class="open-button" onClick="openForm()">Queries</button> -->

<div class="chat-popup  animate__animated animate__backInRight" id="myForm">
  <form action="" method="post" class="form-container">
   <!-- <h1>Chat</h1>

    <label for="msg"><b>Message</b></label>!-->
    <textarea placeholder="Describe Queries..." name="msg" required></textarea>
	  <input type="hidden" name="author" value="<?php echo $auth;?>">
    <div class="row">
      <div class="col-lg-6 col-6 d-grid">
        <button type="submit" name="submit" class="btn btn-success ">Send</button>
      </div>
      <div class="col-lg-6 col-6 d-grid">
        <button type="button"  class="btn btn-danger" onClick="closeForm()">Close</button>
      </div>
    </div>
    
    
 
</div>
<?php

if(isset($_POST["submit"])){
		$author = $_POST['author'];
      	$msg = $_POST['msg'];
       $sql = "INSERT INTO messages(author,msg) VALUES('$author','$msg')";
       $result = mysqli_query($conn, $sql);
       
       if($result){
       echo "";
       }
       else
       {
       echo "Failure!";
       }
     }
       else
       {
	   }
		   ?>
           <center>
           
     </form>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>		

<!-- Bootstrap js cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
