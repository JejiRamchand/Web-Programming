<?php
	session_start();
	require_once 'dbconnect.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
        <title>Shop - Inventory</title>
		<link rel = "stylesheet" type = "text/css" href = "style.css"/>
		<script src = "script.js" type = "text/javascript"></script>
		<link rel = "icon" href = "favicon.ico" type = "image/ico"/>
		<link rel = "shortcut icon" href = "favicon.ico" type = "image/ico"/>
    </head>
	<body>
		<?php include 'menu.php' ?>
		<div id = "content">
			<h1>Our Inventory!</h1>
			<!--
			<?php
				
				if (isset($_POST['submit']) && isset($_POST['checked'])) {
					

					$name = $_POST['name'];
					$price = $_POST['price'];
					$description = $_POST['description'];
					$img = $_POST['img'];
					$table = "inventory values(null,\"$name\",$price,\"$description\",\"$img\")";
					$query = mysqli_query($con,"insert into $table");
					if ($query) {
						$query = true;
					}
					mysqli_close($con);
					if ($query) header("Location: " . $_SERVER['PHP_SELF']);
				}
			?>
			<form action = "" method = "post" onsubmit = "return checkAdd(this);">
				Name: <input type = "text" placeholder = "name of item" name = "name" value = "<?php
				if (isset($_POST['submit']) && isset($_POST['checked']) && !$query) {
					echo $_POST['name'];
				}
			?>"/><br/>
				Price: <input type = "number" placeholder = "price" name = "price" value = "<?php
				if (isset($_POST['submit']) && isset($_POST['checked']) && !$query) {
					echo $_POST['price'];
				}
			?>"/><br/>
				Description <textarea name = "description" cols = "30" rows = "10"><?php
				if (isset($_POST['submit']) && isset($_POST['checked']) && !$query) {
					echo $_POST['description'];
				}
			?></textarea><br/>
				Filename: <input type = "text" placeholder = "img.png" name = "filename" value = "<?php
				if (isset($_POST['submit']) && isset($_POST['checked']) && !$query) {
					echo $_POST['img'];
				}
			?>"/><br/>
				<input type="submit" name="submit" value="Submit"/>
			<?php
				if (isset($_POST['submit']) && isset($_POST['checked']) && !$query) {
					echo 'Image name already taken.';
				}
			?>
				<input type = "text" name = "checked" style = "display: none;" value = ""/>
			</form>
			<hr/>
			-->
			<form action = "" method = "post">
				Sort by:
				<input type = 'submit' value = 'Date Added' name = "id"/>
				<input type = 'submit' value = 'Name' name = "name"/>
				<input type = 'submit' value = 'Price' name = "price"/>
				(All items are loyal as hell ! Once added never leaving you again !)
			</form>
			<br/>
			<table border = "1" style = "background-color: #CCFF33; width: 100%;">
				<tr>
					<th>Picture</th>
					<th>Name</th>
					<th>Price</th>
					<th>Description</th>
					<th>Add to cart</th>
				</tr>
				<?php
					
					if (isset($_POST['price'])) $which = "price";
					else if (isset($_POST['id'])) $which = "id";
					else $which = "name";
					$table = "inventory";
					$hasStuff = false;
					$query = mysqli_query($con,"select * from $table order by $which");
					while ($field = mysqli_fetch_array($query)) {
						$hasStuff = true;
						$id = $field['id'];
						$name = $field['name'];
						$price = $field['price'];
						$img = $field['img'];
						$description = $field['description'];
						?>
						<tr><td style = "background-color: #CCFF33; text-align: center;"><img src = "images/<?php echo $img ?>" style = "max-width: 100px; max-height: 100px;" alt = ""/></td>
							<?php
							echo "<td>" . $name . "</td>";
							echo "<td style = \"text-align: center;\">$" . number_format($price, 2, '.', ',') . "</td>";
							echo "<td>" . $description . "</td>";
							echo "<td width = \"80px\"><a href = \"add.php?id=" . base64_encode($id * 123.456) . "\">Add to Cart</a></td>";
							echo "</tr>\n";
						}
						if (!$hasStuff) echo "Empty set";
						mysqli_close($con);
					?>
			</table>
		</div>
    </body>
</html>
