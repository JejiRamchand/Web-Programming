<!doctype html>
<HTML>
<HEAD>
<TITLE>Your IQ !</TITLE>
<link rel="stylesheet" type="text/css" href="IQresult.css" title="style" />
</HEAD>
<BODY>
<?php
echo "<h1>Your IQ test Result</h1>"; 
//Initialize variables
  $T1 = $_POST["T1"];
  $T2 = $_POST["T2"];
  $T3 = $_POST["T3"];
  $T4 = $_POST["T4"];
  $T5 = $_POST["T5"];
  $T6 = $_POST["T6"];
  $T7 = $_POST["T7"];
  $T8 = $_POST["T8"];
  $T9 = $_POST["T9"];
  $T10 = $_POST["T10"];
  $age = $_POST["age"];
   $empty=strlen($_POST["age"]);
     if ($empty==0)
{
  die("Do you even read bro!!!?? The age is mandatory..! come on !! Press back. <br>Thanks.");
}
  elseif($age == 0)
  {
	die ("Come Back When you stop wearing a Damn Diper !");  
  }
  elseif($age > 100)
  {
	die ("Damn ! You are too old to live ! Die in peace already !!");  
  }
  else
{
  $chronologicalage = $_POST["age"];
}

//1
   if($T1 == "round")
{
  $TS1 = 3;
}
   else
{
  $TS1 = 0;
}
//2
   if($T2 ==345)
{
  $TS2 = 3;
}
   else
{
  $TS2 = 0;
}
//3
   if($T3 == 35)
{
  $TS3 = 3;
}
   else
{
  $TS3 = 0;
}
//4
   if($T4 == 32)
{
  $TS4 = 3;
}
   else
{
  $TS4 = 0;
}
//5
   if($T5 == 1)
{
  $TS5 = 3;
}
   else
{
  $TS5 = 0;
}
//6
   if($T6 == 5)
{
  $TS6 = 3;
}
   else
{
  $TS6 = 0;
}
//7
   if($T7 =="cnn")
{
  $TS7 = 4;
}
   else
{
  $TS7 = 0;
}
//8
   if($T8 == 1980)
{
  $TS8 = 4;
}
   else
{
  $TS8 = 0;
}
//9
   if($T9 ==25)
{
  $TS9 = 4;
}
   else
{
  $TS9 = 0;
}
//10
   if($T10 == 50)
{
  $TS10 = 30;
}
   else
{
  $TS10 = 0;
}
//Total mental age scores
$mentalage= $TS1 + $TS2+ $TS3+ $TS4+ $TS5+ $TS6+ $TS7+ $TS8+ $TS9+ $TS10;
  $IQ= ($mentalage/$chronologicalage)*100;
echo ("<br> Hi, Your IQ is: " . round($IQ,0) );
echo ("<br />");
if($IQ == 0)
{
	echo("Seriously ?? Zero ?? If only I had a Time machine.. would have kicked you to stone age !!");	
}
else
{
echo ("<br />Thank you for taking this test!<br />");
}
?>
</BODY>
</HTML>