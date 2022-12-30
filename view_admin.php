<?php /* needs to be fixed. professors says its about 60% right but needs some modificiation to work with code*/
 

include "dbconfig.php";
 
$con = mysqli_connect($host, $username, $password, $dbname)  /* variables defined here */
      or die("<br>Cannot connect to DB:$dbname on $host\n");/* "or die" means that if one of the variables is wrong then you cant connect */
 


$sql = " select * from TECH3740.Admin";
$result = mysqli_query($con, $sql); /* this function will have the sql statement get sent to the server '$con'. Also instead of 'dreamhome.Staff' you may have to change to database name. table name*/
$count = "select count(*) from TECH3740.Admin";
 
if ($result) {
	if (mysqli_num_rows($result)>0) {
		$rowcount = mysqli_num_rows($result);

		echo "There are <b>$rowcount</b> admins";
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

	       

	        if ($join_date > $dob)      
	        	$color= "blue";
	        else
	        	$color = "red";
	      

	         


	        echo "<TR><TD>$aid<TD>$login<TD>$password<TD>$name<TD><font color='$color'>$dob</font color><TD><font color='$color'>$join_date</font color><TD>$gender<TD>$Address\n";
	    }
	    echo "</TABLE>\n";
	    mysqli_free_result($result);

	}
	else
		echo "<br>No record found\n";

}
else {
  echo "<br>Something is wrong with SQL:" . mysqli_error($con);	
}

mysqli_close($con);
?>
