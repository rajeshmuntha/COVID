<button class="open-button" onClick="openForm()">Queries</button>

<div class="chat-popup" id="myForm">
  <form action="" method="post" class="form-container">
   <!-- <h1>Chat</h1>

    <label for="msg"><b>Message</b></label>!-->
    <textarea placeholder="Type message../ Queries..." name="msg" required></textarea>
	<input type="hidden" name="author" value="<?php echo $auth;?>">
    <button type="submit" name="submit" class="btn">Send</button>
    <button type="button"  class="btn cancel" onClick="closeForm()">Close</button>
 
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
