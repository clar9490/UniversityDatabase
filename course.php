<?php
	include_once 'C:\wamp64\www\datafinal\dbh.inc.php';
	
	$query1=	"SELECT * 
				FROM department;
			  	";

	$query2=	"SELECT *
				FROM course;
				";

	$query3="SELECT Name, PrerequisiteName, CreditHours
				FROM course JOIN prerequisite on course.CourseID = prerequisite.CourseID;
				";

	$query4 = "SELECT Name, Semester, Instructor, Year 
					FROM section JOIN course on section.CourseID = course.CourseID;";


	$result1=mysqli_query($conn,$query1);
	$result2=mysqli_query($conn,$query2);
	$result3=mysqli_query($conn,$query3);
	$result4=mysqli_query($conn,$query4);
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Courses Webpage 
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<font size="8" color="white" text-align="center">Ontario Tech University </font>
	<form form method="post" action="index.html">
		<input type="submit" name="" value="Log out">
	</form>
	<div class="loginbox4">
		<br>
		<h1>Courses Offered</h1>
		<br>
		<br>
		<center><label for="Departments">Departments Of Study</label></center>
		
			<table align="center" border="1px" stype="width:600px"; line-height:30px>
		<tr>
			<th> DepartmentID </th>
			<th> Name </th>
			
		</tr>
		

		<?php
		while($row=mysqli_fetch_array($result1)){
			echo "<tr>";
			echo "<td>" . $row['DepartmentID'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
				
				
       }
       ?>
       </table>

       <br>
       <br>
		<center><label for="Courses">Courses Avaialble</label></center>
			<table align="center" border="1px" stype="width:600px"; line-height:30px>
		<tr>
			<th> CourseID </th>
			<th> Name </th>
			<th> CreditHours </th>
			<th> Department </th>
		</tr>
		

			<?php
			while($row=mysqli_fetch_array($result2)){
			echo "<tr>";
			echo "<td>" . $row['CourseID'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['CreditHours'] . "</td>";
            echo "<td>" . $row['Department'] . "</td>";
				
				
       }
       ?>
		</table>
			
		<br>
		<br>	

		<center> <label for="Prerequisite">Course Prerequisites</label> </center>
			<table align="center" border="1px" stype="width:600px"; line-height:30px>
		<tr>
			<th> Name </th>
			<th> PrerequisteName </th>
			<th> CreditHours </th>

		</tr>
		<?php
			while($row=mysqli_fetch_array($result3)){
			echo "<tr>";
			echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['PrerequisiteName'] . "</td>";
            echo "<td>" . $row['CreditHours'] . "</td>";
				
				
       }
       ?>
		</table>

		<br>
		<br>
			<center> <label for="Section">Class Sections </label> </center>
				<table align="center" border="1px" stype="width:600px"; line-height:30px>
		<tr>
			<th> Name </th>
			<th> Semester </th>
			<th> Instructor </th>
			<th> Year </th>

		</tr>
			<?php
			while($row=mysqli_fetch_array($result4)){
			echo "<tr>";
			echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Semester'] . "</td>";
            echo "<td>" . $row['Instructor'] . "</td>";
            echo "<td>" . $row['Year'] . "</td>";
            
			
       }
       mysqli_close($conn);
       ?>
		</table>
	</div>
</body>
</html>