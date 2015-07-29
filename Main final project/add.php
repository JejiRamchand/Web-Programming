<?php
session_start();
require_once 'dbconnect.php';
//session_destroy();
	session_start();

	if (!isset($_SESSION['email']) || !isset($_GET['id'])) header("Location: inventory.php");

	$email = $_SESSION['email'];
	$id = intval(base64_decode($_GET['id']) / 123.456 + .5);

	
	$table = "user where email=\"$email\"";
	$query = mysqli_query($con,"select * from $table");
	while ($field = mysql_fetch_array($query)) {
		$items = $field['cart'];
	}

	if (isset($items)) {
		$stuff = str_getcsv($items);
		for ($i = 0; $i < count($stuff); $i += 2) {
			if ($stuff[$i] == $id) break;
		}
		if ($i >= count($stuff)) {
			$items .= ",$id,1";
		} else {
			$stuff[$i + 1] += 1;
			$items = $stuff[0] . "," . $stuff[1];
			for ($i = 2; $i < count($stuff); $i += 2) {
				$items .= "," . $stuff[$i] . "," . $stuff[$i + 1];
			}
		}
	}
	else $items = "$id,1";

	$query = mysqli_query($con,"update user set cart=\"$items\" where email=\"$email\"");

	mysql_close($con);
	header("Location: cart.php");
?>