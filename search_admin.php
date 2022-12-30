<?php


include "dbconfig.php";





if(Isset($_POST['keyword']))
	$key = $_POST['keyword'];
else 
	die("<br> please entire a keyword\n");



$con = mysqli_connect($host, $username, $password, $dbname)
	or die("<br> Cannot connect to DB: $dbname on $host\n");


if($key == '*')
	$run = "select * from TECH3740.Admin";
else
	($run = "select * from TECH3740.Admin where address like '%$key%'");


$sql = $run;
$result = mysqli_query($con, $sql);


if ($result){
	if(mysqli_num_rows($result)>0){
		$rowcount = mysqli_num_rows($result);

		echo "<br>There are $rowcount admin(s) are in the database that the address contains the search keyword: $key\n<br>";
		echo "<TABLE border=1>\n";
		echo "<TR><TH>ID<TH>Login<TH>Password<TH>Name<TH>DOB<TH>Join date<TH>Gender<TH>Address";
		while($row = mysqli_fetch_array($result)){

			$aid = $row["aid"];
	        $login = $row["login"];
	        $password = $row["password"];
	        $name = $row["name"];
	        $dob = $row["dob"];
	        $join_date = $row["join_date"];
	        $gender = $row["gender"];
	        $Address = $row["Address"];
		
	 		if ($dob == NULL)
	 			($dob = "NULL" );

	 		if ($join_date < $dob )      
	        	$color="red"; 

	        else
	        	$color="blue";
	 			

	        
	 		
	 			
	 		
	      



	        echo "<TR><TD>$aid<TD>$login<TD>$password<TD>$name<TD><font color='$color'>$dob<TD><font color='$color'>$join_date<TD>$gender<TD>$Address\n";
		}
		echo "</TABLE>\n";
		mysqli_free_result($result);
}
	else
		echo "<br>No records in the database for the keyword: $key";

}

?>