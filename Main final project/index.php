<?php
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">



<?php
	/*if (isset($_GET['unset'])) {
	echo 'hello';
		session_unset();
		session_destroy();
		header('Location: index.php');
	}*/
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
        <title>Shop - Home</title>
		<link rel = "stylesheet" type = "text/css" href = "style.css"/>
		<script src = "script.js" type = "text/javascript"></script>
		<link rel = "icon" href = "favicon.ico" type = "image/x-icon"/>
		<link rel = "shortcut icon" href = "favicon.ico" type = "image/x-icon"/>
    </head>
	<body>
		<?php include 'menu.php'; ?>
		<div id = "content">
			<h1>Welcome to Our Online Shop!</h1>
		</div>
	</body>
</html>