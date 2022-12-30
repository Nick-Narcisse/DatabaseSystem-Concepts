<?php

	include "dbconfig.php";
	if(!isset($_COOKIE["userid"]))
		die("<br>Please login first\n");



	$con = mysqli_connect($host, $username, $password, $dbname) 
	      or die("<br>Cannot connect to DB:$dbname on $host\n");


	 $sql_faculty = "select Fid, Name from TECH3740.Faculty";
	 $faculty_result = mysqli_query($con, $sql_faculty);

	 $sql_Room = "select * from TECH3740.Rooms";
	 $Room_result = mysqli_query($con, $sql_Room);



?>

<!doctype html>
<html>
<head>
	
</head>

<body>

	<a href = "http://obi.kean.edu/~narcissn/TECH3740/index.html"> logout </a>
	<br>
	<B>Add a course</B>
	<form action ="insert_course.php" name= 'AddCourse' method = 'post'>
	<label>Course ID </label>
	<input type ="text" name ="CourseID" required = "required">
	(ex: CPS1231)
		<br>

	<label>Course Name</label>
	<input type ="text" name ="CourseName" required = "required">
		<br>


	<input type="checkbox" name="Term" value="Spring" >
	  	<label for="Term1"> Spring</label>

	<input type="checkbox" name="Term" value="Summer" >
	  	<label for="Term2"> Summer</label>

	<input type="checkbox"  name="Term" value="Fall">
	  	<label for="Term3"> Fall</label>
	  	<br>


	 <label>Enrollment</label>
	<input type ="text" name = "Enrollment" required = "required">
	(# of registered students)
		<br>


	<label> Select a faculty</label>
	<select name = "faculty" required = "required" >
	<option value = "0"></option>

	<?php
	if ($faculty_result){
		if(mysqli_num_rows($faculty_result)>0){
			while($row = mysqli_fetch_array($faculty_result)){
				$Fid = $row['Fid'];
				$Name = $row['Name'];
				echo "<option><br>$Name</option>";
			}
		}
	}

	?>
	</select>
	<br>


	<label>Room</label>
	<select name = "Room" required = "required">
	<option value = "0"></option>

	<?php
		if($Room_result){
			if(mysqli_num_rows($Room_result)>0){
				while($row2 = mysqli_fetch_array($Room_result)){
					$Rid = $row2['Rid'];
					$Building = $row2['Building'];
					$Number = $row2['Number'];
					$Size =	$row2['Size'];
					echo "<option>$Building$Number has $Size seats</option>";

				}
			}
		}

	?>	
	</select>
	<input type="submit" name="Submit">
	<br>
</form>
</body>

</html>