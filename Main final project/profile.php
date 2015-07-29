<?php
	
	session_start();
	require_once 'dbconnect.php';

?>


<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
        <title>Shop - Profile</title>
		<link rel = "stylesheet" type = "text/css" href = "style.css"/>
		<script src = "script.js" type = "text/javascript"></script>
		<link rel = "icon" href = "favicon.ico" type = "image/ico"/>
		<link rel = "shortcut icon" href = "favicon.ico" type = "image/ico"/>
    </head>
	<body>
		<?php include 'menu.php'; ?>
		<div id = "content">
			<h1>Your Profile!</h1>
			<?php
				
				if (isset($_SESSION['email'])) {
					$email = $_SESSION['email'];

					if (isset($_POST['submit'])) {
						$name = $_POST['name'];
						$bio = $_POST['bio'];
						
						$birth = $_POST['birth'];

						$table = "name=\"$name\", bio=\"$bio\", birth=\"$birth\" where email=\"$email\"";
						$query = mysqli_query($con,"update user set $table");
						if (!$query) echo "error";
						else header("Location: " . $_SERVER['PHP_SELF']);
					}

					//$table = "user where email=\"$email\"";
					$query = mysqli_query($con,"select * from  jvedullapalli1.user where email = '".addslashes($email)."'");
					while ($field = mysqli_fetch_array($query)) {
						$name = $field['name'];
						$bio = $field['bio'];
						//$photo = $field['photo'];
						$birth = $field['birth'];
						$items = $field['past'];
					}
			

					mysqli_close($con);
					if (isset($_POST['update'])) {
						?>
						<form action = "" method = "post">
							<table border = "0">
								<tr>
									<th>Name</th>
									<td><input type = "text" placeholder = "name" name = "name" value = "<?php echo $name ?>"/></td>
								</tr>
								<tr>
									<th>Info</th>
									<td><textarea name = "bio" cols = "30" rows = "10"><?php echo $bio ?></textarea></td>
								</tr>
								
								<tr>
									<th>Date of Birth</th>
									<td><input type = "date" placeholder = "YYYY-MM-DD" name = "birth" value = "<?php echo $birth ?>"/></td>
								</tr>
							</table>
							<input type = "submit" name = "submit" value = "Submit Edit"/>
						</form>
						<?php
					} else {
						?>
						<table border = "0">
							<tr>
								<th class = "profile">Name</th>
								<td><?php echo $name ?></td>
							</tr>
							<tr>
								<th class = "profile">Info</th>
								<td><?php echo $bio ?></td>
							</tr>
							
							<tr>
								<th class = "profile">Date of Birth</th>
								<td><?php echo $birth ?></td>
							</tr>
							<tr>
								<th class = "profile">Previous purchases</th>
								<td><?php include 'displayItems.php'; ?></td>
							</tr>
						</table>
						<form action = "" method = "post">
							<input type = "submit" name = "update" value = "Edit Profile"/>
						</form>
						
						<form action = "email.php" method = "post">
							<input type = "submit" name = "Email" value = "Email"/>
						</form>
						<?php
					}
				} else {
					echo "Please Log-in !!";
				}
			?>
		</div>
    </body>
</html>
