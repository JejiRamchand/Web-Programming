

<?php

$NameError = $PasswordMatch = $PasswordError = $Success = "";


function testBox(){
	global $NameError , $PasswordMatch , $PasswordError;
	$toggle=true;
	if(empty($_POST['uname'])){
		$toggle=false;
		$NameError="User Name is Mandatory";
	}
	if(empty($_POST['password'])){
		$toggle=false;
		$PasswordError="Password is Mandatory";
	}
	if(empty($_POST['retype'])||!($_POST['password']===$_POST['retype'])){
		$toggle=false;
		$PasswordMatch="Passwords not matched";
	}
	return $toggle;
}
 
if(!empty($_POST['create'])){
	
	
		if(testBox()){
			$connection=mysqli_connect("localhost","jvedullapalli1","jvedullapalli1","jvedullapalli1");
			if (mysqli_connect_errno()) {
				echo "MySQL connection failure: " . mysqli_connect_error();
			}
			
			$username = mysqli_real_escape_string($connection, $_POST['uname']);	
			$pswd = mysqli_real_escape_string($connection, $_POST['password']);

			$query="Select * FROM logintable WHERE Username='$username'";
			
			$result=mysqli_query($connection,$query);
			$row=mysqli_fetch_array($result);
			if(!mysqli_num_rows($result)){
				
				$sql="INSERT INTO logintable (Username, Password)
					VALUES ('$username', '$pswd')";

					if (!mysqli_query($connection,$sql)) {
						die('Error: ' . mysqli_error($connection));
					}
				$Success= " '$username' successfully Created, please proceed to login";

				mysqli_close($connection);		
				
				header ("Location: http://codd.cs.gsu.edu/~jvedullapalli1/Assignment/login.php");
			
			
			}else{
				$Success="Existing user name ! Please try to remember your password and login Or create an account with new user name !";
			}
		}
		
	}



?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

<h2><center> New account </center></h2></br>


Please enter all the fields:
<form name="signup" action="signup.php" method="post">
*Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="uname"></input><?php echo $NameError; ?></br>
*Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password"></input><?php echo $PasswordError; ?></br>
*Retype Password: &nbsp;&nbsp;&nbsp; &nbsp;<input type="password" name="retype"></input><?php echo $PasswordMatch; ?></br>
<div id="man">* is mandatory</div>
<div id="crt">
<input type="Submit" name="create" value="Create Account"></input>
</div>

</form>
<h2><?php echo $Success ?></h2>
</body>
</html>