<?php

$nameAlert = "";
$HobErr="";
$firstname = $lastname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["firstname"])) {
     $nameAlert = "First Name is required";
   } else {
     $firstname = test_input($_POST["firstname"]);
    
     if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
       $nameAlert = "Only white spaces and Letters are allowed"; 
     }
   }
   
 }
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["lastname"])) {
     $nameAlert = "Last Name is required";
   } 
   else {
     $lastname = test_input($_POST["lastname"]);
     
     if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
       $nameAlert = "Only white spaces and Letters are allowed"; 
     }
   }
 
 }

   if (isset($_POST['submit']) ){
   $count=count($_POST['Hobbies']);
   if($count>3){
      $HobErr = "**Only maximum of 3 hobbies can be selected";
   }   
 }

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
