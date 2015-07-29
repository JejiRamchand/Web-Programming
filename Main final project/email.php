<?php



	session_start();
	require_once 'dbconnect.php';
	
	
	
if (!isset($_POST["submit"])) {
  if (isset($_SESSION['email'])) {
					$email = $_SESSION['email'];
					
	$query = mysqli_query($con,"select * from  jvedullapalli1.user where email = '".addslashes($email)."'");
					
	while ($field = mysqli_fetch_array($query)) {
						
						$items = $field['past'];
					}
				
     
	$stuff = str_getcsv($items);
			//echo " ".$stuff.length;
			$total = 0;
			for ($i = 0; $i < count($stuff); $i+= 2) {
			
			
			//$str = "select * from inventory";
			$str = "select * from jvedullapalli1.inventory where id=". $stuff[$i];
			//echo $str;	
				$query = mysqli_query($con,$str);
				 
				while ($field = mysqli_fetch_array($query)) {
					$name = $field['name'];
					$price = $field['price'];
					$total += $price * $stuff[$i + 1];
					}
 
     // sender
    $subject = "Your Order";
    $message = 'Thank you for Ordering. Your Total Price:'.$total;
    
    
}
mail($email,$subject,$message,"");
    
	header("Location: index.php");
	
  
}
}
?>