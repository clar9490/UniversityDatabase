<?php
	include_once 'C:\wamp64\www\datafinal\dbh.inc.php';

	$query="SELECT * FROM student WHERE StudentNumber='100716458';";
	$query2="SELECT * FROM grade WHERE SectionID='5';";

	$result=mysqli_query($conn,$query);
	$result2=mysqli_query($conn,$query2);
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Student webpage 
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<font size="8" color="white" text-align="center">Ontario Tech University</font>
	<form form method="post" action="index.html">
		<input type="submit" name="" value="Log out">
	</form>
	<div class="loginbox3">
		<h1>Your information</h1>
		<table align="center" border="1px" stype="width:600px"; line-height:30px>
		<tr>
			<th> Student Number </th>
			<th> Name </th>
			<th> Class </th>
			<th> Major </th>
			<th> Minor </th>
		</tr>
		
		<?php
			while($row=mysqli_fetch_array($result)){
				echo "<t>";
  echo "<td>" . $row['StudentNumber'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['Class'] . "</td>";
  echo "<td>" . $row['Major'] . "</td>";
  echo "<td>" . $row['Minor'] . "</td>";
         echo "<br>";
			}
			
		?>
		</table>	
        <br>
		<h1>Current grades</h1>
		<table align="center" border="1px" stype="width:600px"; line-height:30px>
		<tr></tr>>
			<th> StudentNumber</th>
			<th> SectionID </th>
			<th> Grade </th>
		</tr>
		
		<?php
			while($row=mysqli_fetch_array($result2)){
				echo "<t>";
  echo "<td>" . $row['StudentNumber'] . "</td>";
  echo "<td>" . $row['SectionID'] . "</td>";
  echo "<td>" . $row['Grade'] . "</td>";

  
         echo "<br>";
     }
    mysqli_close($conn);
			

		?>
		</table>
	</div>
</body>
</html>