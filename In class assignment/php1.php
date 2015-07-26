<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $fname = $lname = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["fname"])) {
     $nameErr = "Name is required";
   } else {
     $fname = test_input($_POST["fname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
 }
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["lname"])) {
     $nameErr = "Name is required";
   } else {
     $lname = test_input($_POST["lname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
 }




function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
 
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   First Name: <input type="text" name="fname" value="<?php echo $fname;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br>
   Last Name: <input type="text" name="lname" value="<?php echo $lname;?>"">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   <h2> Hobbies </h2>
   <input type="checkbox" name="Hobbies" value="Hockey">Hockey<br>
   <input type="checkbox" name="Hobbies" value="Travel">Travel<br>
   <input type="checkbox" name="Hobbies" value="Chess">Chess<br>
   <input type="checkbox" name="Hobbies" value="Coin Collection">Coin Collection<br>
   <input type="checkbox" name="Hobbies" value="Stamp Collection">Stamp Collection<br>
   <input type="checkbox" name="Hobbies" value="Shopping">Shopping<br>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>



<?php
echo "<h2>Your Input:</h2>";
echo "First Name :&nbsp;" .ucwords($fname);
echo "<br>";
echo "Last Name:&nbsp;" .ucwords($lname);

?>
<br/><br/>
<h4> <a href="php1.php">PHP Validations</a> | <a href="php2.php">PHP Array</a> | <a href="php4.php">String in Table</a> | <a href="php5.php">Prime Number</a> |  <a HREF="/~vjavvaji1/index.html">Home</a>| </h4>

</body>
</html>