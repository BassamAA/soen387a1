PHP file used to create new student

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Search Results</title>
	<style type="text/css">
		body {
			font-family: arial, sans-serif;
			background-color: white
		}

		table {
			background-color: white
		}

		td {
			padding-top: 2px;
			padding-bottom: 2px;
			padding-left: 4px;
			padding-right: 4px;
			border-width: 1px;
			border-style: inset
		}
	</style>
</head>

<body>
	<?php
	//  extract( $_POST );
	$CourseID = $_POST["CourseCode"];
	$Title = $_POST["Title"];
	$Semester = $_POST["Semester"];
	$Instructor = $_POST["Instructor"];
	$Room = $_POST["Room"];
	$Days = $_POST["Days"];
	$Times = $_POST["Times"];
	$Start_date = $_POST["Start_date"];
	$End_date = $_POST["End_date"];



	// build INSERT query

	$query = "INSERT INTO `Course` VALUES ('$CourseID','$Title','$Semester','$Days','$Times','$Instructor','$Room','$Start_date','$End_date')";

	// Connect to MySQL
	if (!($database = mysqli_connect(
		"127.0.0.1",
		"root",
		""
	)))
		die("Could not connect to database </body></html>");


	// open University database
	if (!mysqli_select_db($database, "University"))
		die("Could not open University database </body></html>");


	// query University database
	if (!($result = mysqli_query($database, $query))) {
		print("Could not execute query! <br />");
		die(mysqli_error($myConnection) . "</body></html>");
	} else {
		print("Course successfully created!");
	}

	// List of students in a course
	// List of courses taken by a student
	$query_col_names = "SELECT COLUMNS from Student";

	$Select = $_POST["select"];
	$InputCourseCode_or_ID = $_POST["input"];

		// List of students in a course
	$query2 = "SELECT Student.FirstName, Student.LastName, Student.ID FROM STUDENT s INNER JOIN EnrolledIn e on s.ID = e.ID
	WHERE e.CourseCode = $InputCourseCode_or_ID";

	// List of courses taken by a student
	$query3 = "SELECT *  FROM COURSE c INNER JOIN EnrolledIn e on c.CourseCode = e.CourseCode
	WHERE e.ID = $InputCourseCode_or_ID";

	if (!($result_col_names = mysqli_query($database, $query))) {
		print("Could not execute query! <br />");
		die(mysqli_error($myConnection) . "</body></html>");
	}
	if(!($result = mysqli_query($database,$query2))){
		print("Could not execute query2! <br />");
		die(mysqli_error($myConnection) . "</body></html>");
	}
	if (mysqli_num_rows($result) == 0) {
		print("No courses are currently available! <br />");
		die(mysqli_error($database) . "</body></html>");
	}
	else{
		print("<table>");
				$row = mysqli_fetch_assoc($result_col_names);
				foreach ($row as $key => $value){
						print("<th>$key</th>");}
	
						for ( $counter = 0; $row = mysqli_fetch_row($result); $counter++ )
						{
							// build table to display results
						print( "<tr>" );
							foreach ( $row as $key => $value ) 
								print( "<td>$value</td>" );
				
						print( "</tr>" );
						}
	
					print("</table>");
		
					
	}


	


	mysqli_close($database);
	?>
	<!-- end PHP script -->

</body>

</html>