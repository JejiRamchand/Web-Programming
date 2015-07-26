
var count = 0;
var x = Math.floor((Math.random() * 100) + 1);
function myFunction() {
    
    var y = document.getElementById("num").value;
    
    /*document.getElementById("demo1").innerHTML = x;
    document.getElementById("demo2").innerHTML = y;
    document.getElementById("coun").innerHTML = count; */
    if( y>100 || y< 1 || isNaN(y))
    {
    	alert("Please Enter Numbers between 1 and 100");
    	document.getElementById("num").value = "";
    	return;
    }
    
    if(x==y)
    {
    	
    	document.getElementById("demo3").innerHTML =  "Bingo !! Your Guess is Right !!";
    	document.getElementById("demo4").innerHTML =  "The Secret number is :" + x;
    	
    }

    if(x>y)
    {
    	count++;
    	
    	document.getElementById("demo4").innerHTML = "The Secret number is greater than your Guessed Number !" ;
    }
    if(x<y)
    {
    	count++;
    	
    	document.getElementById("demo4").innerHTML = "The Secret number is less than your Guessed Number !" ;
    }
    
    if(count ==1)
    {
    	document.getElementById("demo5").innerHTML = "You have two more Chances. Please try again !" ;
    }
    if(count ==2)
    {
    	document.getElementById("demo5").innerHTML = "You have one more Chance. Please try again !" ;
    } 
    if(count ==3)
    {
    	document.getElementById("demo4").innerHTML = "I'm Sorry You are out of Chances !" ;
    	document.getElementById("num").value = "";
    	document.getElementById("demo5").innerHTML =  "The Secret number is :" + x;
    	document.getElementById("demo6").innerHTML = "Please Refresh to Play Again !" ;

    	document.getElementById("btn").disabled = true;
    }
    
}
