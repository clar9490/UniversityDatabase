<?php
	include_once 'C:\wamp64\www\datafinal\dbh.inc.php';

	$query1="SELECT * 
				FROM universityschema.staffinfo 
				WHERE StaffID = '5';
				";

	$query2="Select course
	.Name , section.Semester
				FROM 
				section Join course on section.CourseID = course.CourseID 
				Join
				staff On section.Instructor = staff.Name 
				Where staff.StaffID ='5';
				";

	$query3="Select grade.StudentNumber, grade.Grade, course.Name
				FROM 
				section Join course on section.CourseID = course.CourseID 
				Join
				staff On section.Instructor = staff.Name 
				Join grade on grade.SectionID = section.SectionID
				Where staff.StaffID ='5';
				;
				";

	$result1=mysqli_query($conn,$query1);
	$result2=mysqli_query($conn,$query2);
	$result3=mysqli_query($conn,$query3);
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Staff webpage 
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<font size="8" color="white" text-align="center">Ontario Tech University </font>
	<form method="POST" action="Index.php">
		<input type="submit" name="" value="Log out">
	</form>
	<div class="loginbox3">
		<h1>Your information</h1>
		<table align="center" border="1px" stype="width:600px"; line-height:30px>
		<tr>
			<th> StaffID </th>
			<th> Firstname </th>
			<th> Lastname </th>
			<th> phoneNumber </th>
			<th> email </th>
			<th> address </th>
			<th> emergancynumber </th>
			<th> sex </th>
		</tr>
		

        <?php
			while($row = mysqli_fetch_array($result1)){
				echo "<tr>";

				echo "<td>".$row['StaffID']. "</td>";
				echo "<td>".$row['Firstname']. "</td>";
				echo "<td>".$row['Lastname']. "</td>";
				echo "<td>".$row['phoneNumber']. "</td>";
				echo "<td>".$row['email']. "</td>";
				echo "<td>".$row['address']. "</td>";
				echo "<td>".$row['emergancynumber']. "</td>";
				echo "<td>".$row['sex']. "</td>";
				
			echo "<br>";
		}
			
			?>
		</table>
			
			
		     
	
			
        <br>

		<h1>Course information</h1>
			<table align="center" border="1px" stype="width:600px"; line-height:30px>
		<t>
			<th> Name </th>
			<th> Semester </th>
			<th> LastName </th>
			
		</t>
		</table>
		<?php
			while($row= mysqli_fetch_array($result2))
			{
				echo"<t>";
			echo "<td>" . $row['Name'] . "</td>";
			echo "<td>" . $row['Semester'] . "</td>";
			echo "<td>" . $row['LastName'] . "</td>";
				echo "<br>";
			}
		
		?>

        <br>

		<h1>Student Records </h1>
			<table align="center" border="1px" stype="width:600px"; line-height:30px>
		<t>
			<th> StudentNumber </th>
			<th> Grade </th>
			<th> Name </th>
		</t>
		</table>

		<?php
			while($row=mysqli_fetch_array($result3)){
			echo"<t>";
			echo "<td>" . $row['StudentNumber'] . "</td>";
			echo "<td>" . $row['Grade'] . "</td>";
			echo "<td>" . $row['Name'] . "</td>";
				echo "<br>";
			}
		mysqli_close($conn);
				
?>
</body>
</html>