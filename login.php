 <?php
include "dbconfig.php";

$ip = $_SERVER['REMOTE_ADDR'];

if (Isset($_POST['username']))
	$user = $_POST['username'];
else
	die ("<br>Must have username");



If (isset($_POST['password']))
	$pass = $_POST['password'];
else
	die ("<br>must enter password");


$IPv4= explode(".",$ip); 
	if ($IPv4[0] == "10") 
		{$test = "<br> You are from Kean University.\n";}
		else
			{$test = "<br> You are not from Kean University.\n";}

$con = mysqli_connect($host, $username, $password, $dbname) 
      or die("<br>Cannot connect to DB:$dbname on $host ".
      	mysqli_connect_error());


$sql = "select * from TECH3740.Admin where login = '$user'";
$result = mysqli_query($con, $sql);



if ($result){
	if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_array($result)){
	$mypassword = $row['password'];
	$aid = $row['aid'];
	$name = $row["name"];
      $dob = $row["dob"];
      $join_date = $row["join_date"];
      $gender = $row["gender"];
      $Address = $row["Address"];
	$Age = (date('Y') - date('Y',strtotime($dob)));


		if ($pass == $mypassword){
			if ($dob==Null){
				($dob ="Null");
				($Age = "Null");
				$color = "red";
			}
			else $color="";

			setcookie("userid", $aid, time() + 3600 );
			echo "<br>Your IP: $ip
			$test
			<br><a href = 'http://obi.kean.edu/~narcissn/TECH3740/index.html'> logout </a>
			<br>Login Successful 
			<br>Welcome user: $name
			<br>dob:<font color = $color> $dob</font color>
			<br>Address: $Address
			<br>Gender: $gender 
			<br>Age:<font color = $color> $Age</font color>
			<br>join date: $join_date
			<br>
			<br><a href = 'add_course.php'>Add a course</a>


			<form action = 'search_course.php' method = 'post'>
			Search course (id or name):
			<br><input type ='text' name ='CourseSearch' required = 'required'>
			<input type= 'submit'>";


		}

			else 
				echo "<br>User $user is in the system but wrong password was entered\n";
			

		/*dont try to access cookie in same php file as where its set*/


		
	}

		

	

 	}

 	else {
 		echo "<br>Login $user is not in the system\n"; 
 	}
}


else {
	echo "<br> Something is wrong with SQL:". mysqli_error($con);
}
?>

