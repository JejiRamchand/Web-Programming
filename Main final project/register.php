<?php
	session_start();
	require_once 'dbconnect.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
        <title>Shop - New User</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script src = "script.js" type="text/javascript"></script>
		<link rel = "icon" href="favicon.ico" type = "image/ico"/>
		<link rel = "shortcut icon" href = "favicon.ico" type = "image/ico"/>
    </head>
	<body>
		<?php include 'menu.php'; ?>
		<div <?php if (!isset($_SESSION['email'])) { ?>id = "register">
					<form id = "register"
						  action = "regSubmit.php"
						  method = "post"
						  onreset = "return resetRegister(this);"
						  onsubmit = "return checkRegister(this);">
						<h1>Sign Up</h1>
						<p>
							<label id = "email_label" for = "email">*Email:</label>
							<input id = "email" name = "email" type = "text"
								   placeholder = "email" value = "<?php
								   if (isset($_POST['register']) && isset($_POST['checked']) && !$query) {
									   echo $_POST['email'];
								   }
								   ?>"/>
						</p>
						<p>
							<label id = "name_label" for = "name">*Name:</label>
							<input id = "name" name = "name" type = "text"
								   placeholder = "name" value = "<?php
								   if (isset($_POST['register']) && isset($_POST['checked']) && !$query) {
									   echo $_POST['name'];
								   }
								   ?>"/>
						</p>
						<p>
							<label id = "pass1_label" for = "password1">*Password:</label>
							<input id = "password1" name = "password1" type = "password" placeholder = "password"/>
						</p>
						<p>
							<label id = "pass2_label" for = "password2">*ReEnter:</label>
							<input id = "password2" name = "password2" type = "password" placeholder = "password"/>
						</p>
						<p>
							<input type = "submit" name = "register" value = "Sign Up" />
							<input type = "reset"/><?php
							if (isset($_POST['register']) && isset($_POST['checked']) && !$query) {
								echo ' Email taken.';
							}
							?>
						</p>
						<input type = "text" name = "checked" style = "display: none;" value = ""/>
					</form>
				<?php } else { ?>id = "content"/>
					<h1>Already Logged In</h1>
					<p>Already logged in as: <?php echo $_SESSION['email'] ?></p>
					<p><a href = "index.php?unset=true">Log out</a></p>
				<?php } ?>
		</div>
	</body>
</html>
