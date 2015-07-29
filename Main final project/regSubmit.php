<?php
session_start();
	require_once 'dbconnect.php';
//session_destroy();
	$result = false;
	
	if (isset($_POST['register']) ) {
	

		$email = $_POST['email'];
		echo 'hello';
		/*$name = $_POST['name'];
		$pass = crypt($_POST['password1'], $_POST['password1']);*/
		//$print 'hello';
		
		$query = "insert into jvedullapalli1.user values('".addslashes($_POST["email"])."','".addslashes($_POST["name"])."','".addslashes($_POST["password1"])."',null,null,null,null);";
		$result = mysqli_query($con,$query);
		if ($result) {
			$result = true;
			
			$_SESSION['email'] = $email;
			echo 'success';
		}
		else
		{
		echo 'failed';
		}
		
		mysqli_close($con);
	}
	else
	{
	echo 'hi';
	}
	if ($result) header("Location: index.php");
?>