<?php 
    $num = isset($_POST['num']) ? $_POST['num'] : ''; 
	$prime = "";
?> 

<html> 
<head> 
</head> 
<body> 

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
        <h1>Please input a number to determine if it is prime:</h1> 
        <input type="text" name="num" value="<?php echo $num;?>" /> 
        <br/> 
        <?php 
            if(isset($_POST['num'])){ 
                $num = $_POST['num']; 
                
                for($i=2;$i<($num/2);$i++){ 
                    if($num % $i == 0){ 
                        $prime = false; 
                    } 
                } 
               
                               echo '<h2>'.$num.' is '.($prime === false ? 'NOT' : '').' prime!</h2>'; 
                
            } 
        ?> 
        <br/> 
        <input type="submit" value="Submit Form" /> 
    </form> 
 <br/><br/>
  <h4> <a href="php1.php">PHP Validations</a> | <a href="php2.php">PHP Array</a> | <a href="php4.php">String in Table</a> | <a href="php5.php">Prime Number</a> |  <a HREF="/~vjavvaji1/index.html">Home</a>| </h4>
</body> 
</html>