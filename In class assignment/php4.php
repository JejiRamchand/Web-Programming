<html> 
<head><title>PHP Table</title></head> 
<style> 
    table{border-collapse: collapse;margin-left:auto;margin-right:auto;width:85%} 
    td{border: 1px solid black;text-align:center;font-weight:bold;} 
</style> 
<body> 
<h1> PHP Script to display Strings of value within a table: </h1>

    <table> 
    <?php
        makeRow("Mr. Fresh","$1,000.00"); 
        makeRow("Ms. Soft","$1,500.00"); 
        makeRow("Mrs. Senior","$2,500.00"); 
        function makeRow($name, $salary) 
        { 
            echo("<tr>"); 
            echo("<td>Salary of " . $name . " is</td>"); 
            echo("<td>" . $salary . "</td>"); 
            echo("</tr>"); 
        } 
    ?> 
    </table> 
	<br/><br/>
  <h4> <a href="php1.php">PHP Validations</a> | <a href="php2.php">PHP Array</a> | <a href="php4.php">String in Table</a> | <a href="php5.php">Prime Number</a> |  <a HREF="/~vjavvaji1/index.html">Home</a>| </h4>
</body> 
</html>