<?php
	include_once 'C:\wamp64\www\datafinal\dbh.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 
	
	if(isset($_POST['signup'])){

		$name=$_POST['name'];
		$department=$_POST['department'];
		$id=$_POST['id'];	
			//}
		if($name==''){
			echo "Alert('Please enter the name')";
			exit();
		}
		if($department==''){
			echo "Alert('Please enter the department')";
			exit();
		}
		if($id==''){
			echo "Alert('Please enter the id')";
			exit();
		}

		$query="INSERT into staff('StaffID','Name','Department') values ($id,$name,$department)";
		$result=mysqli_query($conn,$query);
		if($result){
			echo "<h3>Registration sucessful<h3>";
		}
		else{
			echo "<h3>Errors with Registration<h3>";
		}
	}

	if(isset($_LOGIN['login'])){
		$loginID=$_LOGIN['id'];

		if($loginID==''){
			echo "Alert('Please enter the id')";
			exit();
		}

		
        $query1="SELECT student.StudentNumber From student ";
        $query2="SELECT staff.StaffID FROM staff";

        $result1=mysql_query($conn, $query1);
        $result2=mysql_query($conn, $query2);

		while($row=mysql_fetch_array($result1)){
			if($row==$loginID){
				echo "Location: C:\wamp64\www\datafinal\student.php" ;
			}
		}

		while($row=mysql_fetch_array($result2)){
				if($row==$loginID){
					echo "Location: C:\wamp64\www\datafinal\staff.php"  ;
				}
			}
	}

	if(isset($_STUDENT['submit'])){
		$nameS=$_STUDENT['name'];
		$major=$_STUDENT['major'];
		$minor=$_STUDENT['minor'];
		$idS=$_STUDENT['StudentNumber'];
		$class=$_STUDENT['class'];
	
	if($nameS==''){
		echo "Alert('Please enter a name')";
		exit();
	}
	if($major==''){
		echo "Alert('Please enter a major')";
		exit();
	}
	if($minor==''){
		echo "Alert('Please enter a minor')";
		exit();
	}
	if($idS==''){
		echo "Alert('Please enter a StudentNumber')";
		exit();
	}
	if($class==''){
		echo "Alert('Please enter a class')";
		exit();
	}

	$query="INSERT into Student(StudentNumber,Name,Class,Minor,Major) values (?,?,?,?,?)";
		$stmtinsert=$db->prepare($query);
		$result=$stmtinsert->execute([$idS,$nameS,$class,$minor,$major]);
		if($result){
			echo "<h3>Registration sucessful<h3>";
		}
		else{
			echo "<h3>Errors with Registration<h3>";
		}
	}

	mysqli_close($conn);
?>
</body>
</html>