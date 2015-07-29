<?php

	session_start();
	require_once 'dbconnect.php';
//session_destroy();
	if (!isset($_SESSION['email'])) header("Location: index.php");

	$email = $_SESSION['email'];

	

	$query = mysqli_query($con,"select * from user where email=\"$email\"");
	while ($field = mysqli_fetch_array($query)) {
		$items = $field['cart'];
		$past = $field['past'];
	}

	if (isset($items)) {
		if (isset($past)) {
			$adding = str_getcsv($items);
			$already = str_getcsv($past);
			$past = "";
			for ($i = 0; $i < count($adding); $i += 2) {
				for ($j = 0; $j < count($already); $j += 2) {
					if ($adding[$i] == $already[$j]) {
						$already[$j + 1] += 1;
						break;
					}
				}
				if ($j >= count($already)) {
					$past .= ($past === ""
									? ""
									: ",") . $adding[$i] . "," . $adding[$i + 1];
				}
			}
			for ($i = 0; $i < count($already); $i += 2) {
				$past .= ($past === ""
								? ""
								: ",") . $already[$i] . "," . $already[$i + 1];
			}
		} else {
			$past = $items;
		}
	}

	$query = mysqli_query($con,"update user set cart=null, past=\"$past\" where email=\"$email\"");

	mysqli_close($con);
	header("Location: profile.php");
?>