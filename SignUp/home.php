<!DOCTYPE html>
<?php
	require 'conn.php';
	session_start();
	
	if(!ISSET($_SESSION['user'])){
		header('location:login.php');
	}
?>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
	<div class="col-md-6 well">
		
		<div class="col-md-8">
			<h3>Welcome!</h3>
			<br />
			<?php
				$id = $_SESSION['user'];
				$sql = $conn->prepare("SELECT * FROM `member` WHERE `mem_id`='$id'");
				$sql->execute();
				$fetch = $sql->fetch();
			?>
			<center><h4><?php echo $fetch['firstname']." ". $fetch['lastname']?></h4></center>
			<a href = "logout.php">Logout</a>
		</div>
	</div>
</body>
</html>