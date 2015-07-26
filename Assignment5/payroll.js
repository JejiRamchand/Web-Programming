
var perhour=15;
var total_salary = 0.0;
var noOfEmployees=1;
var overtimepay=15*1.5;
var hours=0;
var emp_flag=true;
var reg_time, extra_time, emp_salary;
var arrayValues=[];
var str;
var demo;
var flag=true;

function calculateSalary()
{
while(flag)
	{
	hours=window.prompt("Enter hours for employee " + noOfEmployees);

	if((emp_flag) && (hours<0))	
		{
		window.prompt("Please enter atleast 1 Employee");
		}
		else if (!(emp_flag) && (hours==-1))
		{
		flag=false;
		}
		else
		{
			if(hours=="")
			{}
			else{
			arrayValues.push(hours);
			noOfEmployees++;
			emp_flag = false;
			}
		}
	}


 demo="<center><table><th> Index </th> <th>  Hours worked  </th><th> Employee Salary  </th>";
	
for(var i=0; i<arrayValues.length; i++)
	{
	if(hours>40)
		{
		extra_time=hours-40;
		emp_salary=((extra_time*overtimepay)+(40*perhour));
		demo+="<tr><td style='text-align:center;vertical-align:middle'>" +(i+1)+"</td><td style='text-align:center;vertical-align:middle'>"+arrayValues[i]+"</td><td style='text-align:center;vertical-align:middle'>"+emp_salary+"</td></tr>";
		}
	else
		{
		emp_salary=(arrayValues[i]*perhour);
		demo+="<tr><td style='text-align:center;vertical-align:middle'>" +(i+1)+"</td><td style='text-align:center;vertical-align:middle'>"+arrayValues[i]+"</td><td style='text-align:center;vertical-align:middle'>"+emp_salary+"</td></tr>";
		}
	total_salary += emp_salary;

	}
demo+="</table></center></br></br>";

demo +="<b>Total Salary = " + total_salary+"</b>";
 
document.getElementById("demo").innerHTML=demo;

}
