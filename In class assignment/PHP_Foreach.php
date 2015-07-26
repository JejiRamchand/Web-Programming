<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
$colors = array("red", "green", "blue", "yellow"); 

echo "<ul>";
foreach ($colors as $value) {
    echo "<li>$value</li> <br>";
}
?>
</body>
</html>