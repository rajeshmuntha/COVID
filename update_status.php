<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update'])){
		$id = $_POST['id'];
		$status = $_POST['status'];
		mysqli_query($conn, "UPDATE `messages` SET `status` = '$status' WHERE `id` = '$id'");

			$query = mysqli_query($conn, "SELECT * FROM m_status WHERE m_id='".$id."'");
			$numrows = mysqli_num_rows($query);
   			 if($numrows == 0)
			 {
			$sql = "INSERT INTO m_status(m_id) VALUES('$id')";
       		$result = mysqli_query($conn, $sql);
              if($result){
            echo "<script type='text/javascript'>alert('Registered successfully!')</script>";
     }
	 }
	 else
	 {
	 }
	 	
		header("location: queries_super_admin.php");
	}
?>