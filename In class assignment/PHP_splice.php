<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$original=array('1','2','3','4','5');


echo "original array <br>";

foreach($original as $x)
{
	echo "$x";
}

$instead ='$';

array_splice ($original, 3,0,$instead);

echo "<br> After Insert '$' the array is: <br>";

foreach($original as $x)
{
	echo "$x";
}
?>
</body>
</html>