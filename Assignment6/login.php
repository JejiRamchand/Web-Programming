

<?php

$nameError = $passwordMatch = $passwordError = $Success = "";
$newCookie="login";

if(isset($_COOKIE[$newCookie])){
	session_start();
	$_SESSION['login']=$_COOKIE[$newCookie];
}

function testBox(){
	global $nameError , $passwordMatch , $passwordError;
	$toggle=true;
	if(empty($_POST['uname'])){
		$toggle=false;
		$nameError="Please enter the user name";
	}
	if(empty($_POST['password'])){
		$toggle=false;
		$passwordError="Please enter the password";
	}
	return $toggle;
}
 
if(!empty($_POST['submit'])) {
	
		if(testBox()){
			$connection=mysqli_connect("localhost","jvedullapalli1","jvedullapalli1","jvedullapalli1");

			if (mysqli_connect_errno()) {
				echo "MYSQL connection failure: " . mysqli_connect_error();
			}

			$username = mysqli_real_escape_string($connection, $_POST['uname']);
			$pswd = mysqli_real_escape_string($connection, $_POST['password']);
		
			$query="Select * FROM logintable WHERE Username='$username'";
			
			$result=mysqli_query($connection,$query);
			$row=mysqli_fetch_array($result);
			if(mysqli_num_rows($result)){
				
				$hash=$row['Password'];
				if($hash==$pswd)
				{
					session_start();
					$_SESSION['login']="huh";
					header ("Location:  http://codd.cs.gsu.edu/~jvedullapalli1/Assignment/album.php");
				}else{
					$Success="Incorrect Password, Please remember it and try again !";
				}
			}else{
				$Success="Existing user name ! Please try to remember your password and login Or create an account with new user name !";
			}
			
			mysqli_close($connection);	
		}
	
}
if(!empty($_POST['newsubmit']))
{
	header ("Location: http://codd.cs.gsu.edu/~jvedullapalli1/Assignment/signup.php");
}


if (!empty($_SESSION['login'])) {

	header ("Location: http://codd.cs.gsu.edu/~jvedullapalli1/Assignment/album.php");

}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

<h1><center> Album Database </center></h1>


<center> Please Log in or Create an Account </center>



<form name="login" action="login.php" method="post">

*Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="uname"></input><?php echo $nameError; ?></br>
*Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" name="password"></input><?php echo $passwordError; ?></br>


<div id="input">
<input type="Submit" name="submit" value="Log In" text="Log In"></input>
<input type="Submit" name="newsubmit" value="Sign Up"></input>
</div>

</form>
* is mandatory
<br>
</div>
<h2><?php echo $Success ?></h2>
</body>
</html>