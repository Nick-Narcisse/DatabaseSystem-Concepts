<?php

include "dbconfig.php";


if(!isset($_COOKIE["userid"]))
	die("<br>Please login first\n");

if (Isset($_POST['AddCoursee']))
	$Course = $_POST['AddCourse'];



$con = mysqli_connect($host, $username, $password, $dbname) 
      or die("<br>Cannot connect to DB:$dbname on $host\n");



if(isset($_POST["submit"])){
        $Fid=$_POST['Fid'];
        $Name=$_POST['Name'];
        $Term=$_POST['Term'];
        $Enrollment=$_POST['enrollment'];
        $Cid=$_POST['CourseID'];
        $Rid=$_POST['Rid'];
        

}

if ($Enrollment < 0)
	die("Please enter the appropriate size");


$sql= "insert into TECH3740_2022F.Courses_narcissn (cid, name, term, enrollment, fid, rid) 
			values( '%$Cid%', '%$Name%', '%$Term%', '$Enrollment', '%$Fid%', '%$Rid%');" ;

$result= mysqli_query($con,$sql);


if($result)
	if(mysqli_num_rows($result)>0){
		echo "The Course you have chosen has been added to your table";
	}
	else{
		echo "something went wrong while adding the course!";
	}




?>