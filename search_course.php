<?php
include "dbconfig.php";
if(!isset($_COOKIE["userid"]))
	die("<br>Please login first\n");

if(Isset($_POST['CourseSearch']))
	$C_Search = $_POST['CourseSearch'];


$con = mysqli_connect($host, $username, $password, $dbname)
	or die("<br> Cannot connect to DB: $dbname on $host\n");


if($C_Search == '*')
	$C_Run = "select  n.cid, n.name, T.name as Faculty, n.term, n.enrollment, concat(S.Building, S.Number) 

				as Building_Room, S.Size, A.name as AddedByAdmin 

				from TECH3740_2022F.Courses_narcissn n INNER JOIN TECH3740.Faculty T, TECH3740.Rooms S, TECH3740.Admin A  

				where n.aid = A.aid AND (n.Fid=T.Fid AND n.Rid=S.Rid);";

else
	($C_Run = "select  n.cid, n.name, T.name as Faculty, n.term, n.enrollment, concat(S.Building, S.Number)

				as Building_Room, S.Size, A.name as AddedByAdmin 

				from TECH3740_2022F.Courses_narcissn n INNER JOIN TECH3740.Admin A, TECH3740.Faculty T, TECH3740.Rooms S   

				where n.aid = A.aid AND (n.Fid=T.Fid AND n.Rid=S.Rid) AND (n.name  LIKE  '%$C_Search%' OR n.cid LIKE '%$C_Search%');");


$sql = $C_Run;
$result = mysqli_query($con, $sql);



if($result)
	if(mysqli_num_rows($result)>0){
		echo "The following course ID and name were matched the search keyword: <b>$C_Search</b>\n";
		echo "<TABLE border=1>\n";
		echo "<TR><TH>Course ID<TH>Course Name<TH>Faculty Name<TH>Term<TH>Enrollment<TH>Building Room<TH>Size<TH>Added by Admin\n";

		while($row = mysqli_fetch_array($result)){
			$cid = $row['cid'];
			$name = $row['name'];
			$Faculty = $row['Faculty'];
			$term = $row['term'];
			$Enrollment = $row['enrollment'];
			$Number = $row['Building_Room'];
			$Size = $row['Size'];
			$Admin=$row ['AddedByAdmin'];
			$Total = $Enrollment + $Enrollment;

			if($Size - $Enrollment < 3)
				$color = "red";
			else
				$color = '';


	      			
	      		
	        echo "<TR><TD>$cid<TD>$name<TD>$Faculty<TD>$term<TD><font color=$color>$Enrollment</font color><TD>$Number<TD>$Size<TD>$Admin\n";
	        	
		}
		echo "</TABLE>\n";
		echo "Total enrollment: $Total";

		
	


		mysqli_free_result($result);
}
	


?>

