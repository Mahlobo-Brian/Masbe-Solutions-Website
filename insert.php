<?php
session_start();
ini_set('mysql.connect_timeout',500);
ini_set('default_socket_timeout',500);
?>
<!DOCTYPE HTML>
<html lang = "en"> 
<head>
	<meta charset = "UTF-8"/>
	<title>Masbe Solutions</title>
	<!-- icon-Logo image in the title bar -->
	<link href="img/Logo.png" rel="icon">
	
	<meta name= "description" content= "This is Masbe solutions website"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/style.css" rel="stylesheet">
	
	<!-- Logo -->
	<center><div id="registration-logo" class="registration-logo">
		<img src="img/Art-Liberaton(NoBackRound).png" alt="" />
	</div></center>
</head>
<body>
	<br/><br/><br/>
	<center>
	<div id = "wrapper">
		<?php
			/* Attempt MySQL server connection. Assuming you are running MySQL
			server with default setting (user 'root' with no password) */
			$link = mysqli_connect("localhost", "root", "", "masbe_solutions");
			// Check connection
			if($link === false){
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
			
			// Escape user inputs for security
			$person_name = mysqli_real_escape_string($link, $_REQUEST['person_name']);
			$email = mysqli_real_escape_string($link, $_REQUEST['email']);
			$subject = mysqli_real_escape_string($link, $_REQUEST['subject']);
			$message = mysqli_real_escape_string($link, $_REQUEST['message']);

			// attempt insert query execution
			$sql = "INSERT INTO quote (person_name, email, subject, message) 
			VALUES ('$person_name','$email','$subject','$message')";
			
			if(mysqli_query($link, $sql)){
				echo "Your quote is submitted";
				echo "<form action=\"index.php\" method= \"post\">";
				echo '<button  class="okButtons" name= "ok" id= "ok" type="submit" onclick ="location.href=';
				echo '\'index.php\'"> Go Back </button>';//not working
					
			} 
			else {
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
			// close connection
			mysqli_close($link);
		?>
	</div></center>
</body>
</html>