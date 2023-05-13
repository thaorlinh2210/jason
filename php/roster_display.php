<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	require_once("settings.php");
	
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db); 
	
	if (!$conn) {
		echo "<p>database connection failure</p>";
	} else {
		$sql_table="employees";
		$query = "select first_name, last_name, emp_no FROM employees";
		$result = mysqli_query($conn, $query);
	if (!$result) {
		echo "<p> Something is wrong with ", $query, "</p>";
	} else {
		echo "<table border=\"1\">\n";
		echo "<tr>\n"
			."<th scope=\"col\">First name</th>\n "
			."<th scope=\"col\">Last name</th>\n "
			."<th scope=\"col\">employee number</th>\n "
			."</tr>\n ";
			
		while ($row = mysqli_fetch_assoc($result)){
			echo "<tr>\n";
			echo "<td>",$row["first_name"],"</td>\n ";
			echo "<td>",$row["last_name"],"</td>\n ";
			echo "<td>",$row["emp_no"],"</td>\n ";
			echo "</tr>\n ";
	}
	echo "</table>\n "; 
	mysqli_free_result($result); 
	}
	mysqli_close($conn);
	}
	
?>
	
</body>
</html>