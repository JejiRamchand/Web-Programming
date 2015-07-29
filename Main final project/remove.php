<?php

session_start();
	require_once 'dbconnect.php';
//session_destroy();

	if (!isset($_SESSION['email']) || !isset($_GET['id'])) header("Location: cart.php");

	$email = $_SESSION['email'];
	

	$id = $_GET['id'];

	$table = "jvedullapalli1.user where email=\"$email\"";
	$query = mysqli_query("select * from $table");
	while ($field = mysqli_fetch_array($query)) {
		$items = $field['cart'];
	}

	if (isset($items)) {
		$stuff = str_getcsv($items);
		for ($i = 0; $i < count($stuff); $i += 2) {
			if ($stuff[$i] == $id) break;
		}
		$stuff[$i + 1] -= 1;
		$items = "";
		for ($i = 0; $i < count($stuff); $i += 2) {
			if ($stuff[$i + 1] > 0) $items .= ($items === ""
								? ""
								: ",") . $stuff[$i] . "," . $stuff[$i + 1];
		}
	}
	if ($items === "") $items = "null";
	else $items = "\"$items\"";
	$query = mysqli_query("update jvedullapalli1.user set cart=$items where email=\"$email\"");

	mysqli_close($con);
	header("Location: cart.php");
?>