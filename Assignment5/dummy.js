function calcSalary() {

	
	var hours = document.getElementById("hours").value;
	var regtime = 0;
	var overtime = 0;
	var salary = 0;

	if (hours > 40)
	{
		regtime = (15 * 40);
		overtime = ((15 * 1.5) * (hours - 40));
		salary = (regtime + overtime);
		var node = document.createTextNode("Total Salary of the Employees = " + salary);
		var para = document.getElementById("demo1");
		para.appendChild(node);
	}
	else
	{
		regtime = 15 * hours ;
		overtime = 0.00 ; 
		salary = regtime ;
		var node = document.createTextNode("Total Salary of the Employees = " + salary);
		var para = document.getElementById("demo1");
		para.appendChild(node);
	}

}