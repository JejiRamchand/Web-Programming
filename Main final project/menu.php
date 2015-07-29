<?php
if(!isset ($_SESSION))
{
session_start();
}
	require_once 'dbconnect.php';
	$query = false;
	if (isset($_POST['login']) && isset($_POST['checked'])) {
	
		
	
			
			$query = mysqli_query($con,"select * from jvedullapalli1.user where email = '".addslashes($_POST["email"])."' and pass = '".addslashes($_POST["password"])."'");
			
			while ($field = mysqli_fetch_array($query)) {
				
				$_SESSION['email'] = $_POST["email"];
			}
		
		
		mysqli_close($con);
	}
	if ($query) header('Location: profile.php');
?>

<div class = "topbar">
	<?php if (!isset($_SESSION['email'])) { ?>
			<form action = ""
				  method = "post"
				  id = "signup_form"
				  onsubmit = "return checkLogin(this);">
				<label id = "top_email_label" for = "top_email">Email Address:</label>
				<input id = "top_email" name = "email" type = "text"
					   placeholder = "email address" value = "<?php
					   if (isset($_POST['login']) && isset($_POST['checked']) && !$query) {
						   echo $_POST['email'];
					   }
					   ?>"/>

				<label id = "top_pass_label" for = "top_password">Password:</label>
				<input id = "top_password" name = "password" type = "password" placeholder = "password"/>

				<input type = "submit" name = "login" value = "Log In"/>
				<input type = "text" name = "checked" style = "display: none;" value = ""/>
				<a href = "register.php">Register</a>
				<?php
				if (isset($_POST['login']) && isset($_POST['checked']) && !$query) {
					echo "Incorrect" . (!$hasEmail
							? " email"
							: " password");
				}
				?>
			</form>
		<?php } else { ?>
			<p>Logged in as: <?php echo $_SESSION['email'] ?></p>
			
			<p><a href = "logout.php">Log out</a></p>
			
		<?php } ?>
</div>
<div class = "nav">
	<a href = "profile.php">Home</a>
	<a href = "inventory.php">Inventory</a>
	<a href = "cart.php">View Cart</a>
	<!--<a href = "profile.php">Profile</a> -->
</div>