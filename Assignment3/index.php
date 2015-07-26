<html>
    <head>
        <title>
            Assignment 3
        </title> 
<?php 
$phptextcolor= $_POST["textcolor"];
$phptextfont = $_POST["textfont"]; 
$phptextsize = $_POST["textsize"];
$phpbgcolor = $_POST["bgcolor"];
$phpenteredtext = $_POST["enteredtext"]; 
if (preg_match("/$phptextcolor/i","orange" )) {
    $phptextcolor="orange";
   
}
if (preg_match("/$phptextcolor/i","blue")) {
    $phptextcolor="blue";
  
}
if (preg_match("/$phptextcolor/i","green" )) {
    $phptextcolor="green";
   
}
if (preg_match("/$phptextcolor/i","lightgrey" )) {
    $phpbgcolor="lightgrey";
   
}
if (preg_match("/$phptextcolor/i","lightpink")) {
    $phpbgcolor="lightpink";
  
}
if (preg_match("/$phptextcolor/i","lightcyan" )) {
    $phpbgcolor="lightcyan";
   
}
if (preg_match("/$phptextfont/i","Times New Roman")) {
    $phptextfont="Times New Roman";
   
}
if (preg_match("/$phptextfont/i","Georgia" )) {
    $phptextfont="Georgia";
  
}
if (preg_match("/$phptextfont/i","Serif" )) {
    $phptextfont="Serif";
  
}
?>
<style>
body {
    color: <?php echo $phptextcolor ?>;
    font-size: <?php echo $phptextsize ?>;
    font-family: <?php echo $phptextfont ?>;
    background-color: <?php echo $phpbgcolor ?>;   
} 
</style>
   </head>
    <body>
        <?php echo $phpenteredtext; ?>
   </body>
</html>