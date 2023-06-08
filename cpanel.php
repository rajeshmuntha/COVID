<?php
include_once "header_super_admin.php";
include "conn.php";
// include_once "left_menu.php";
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
  
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


<section class="pt-4 animate__animated animate__backInRight">
  <div class="container p-4 table-responsive shadow-lg rounded rounded-4">
    <table class=" table table-hover table-bordered rounded rounded-2">
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
          <th scope="col" colspan="3" class="bg-light text-primary">Welcome to Super Admin Dashboard</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row" rowspan="5" class="text-center">
            <?php
            echo "<img src='img/staff_pics/".$emp_id.".jpg' width='100' height='auto'>"."";
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
      </tbody>
    </table>
  </div>
</section>

<div class="row mt-2 fixed-bottom">
  <div class="col-lg-12 text-center">
    <p style="font-size: 12px;" class=" test-muted">All Rights Received
    <a class="text-decoration-none" href="https://sptechhub.com/">Designed and Developed by SPTECHHUB</a></p>
  </div>
</div>


