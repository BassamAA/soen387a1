<!-- PHP file used to create new student -->

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

    $InputCourseCode_or_ID = $_POST['input'];
    $Select = $_POST['select'];
	
	print($InputCourseCode_or_ID);

	if($Select == 'List of courses taken by a student'){
		$query = "SELECT *  FROM COURSE c INNER JOIN EnrolledIn e on c.CourseCode = e.CourseCode
		WHERE e.ID = $InputCourseCode_or_ID";
	}else

	if($Select == 'List of students in a course'){
		$query = "SELECT * FROM Student s INNER JOIN EnrolledIn e on s.ID = e.ID
		WHERE e.CourseCode = '$InputCourseCode_or_ID'";
	}

	

// Student.FirstName, Student.LastName, Student.ID

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
        die(mysqli_error($database) . "</body></html>");
    }
    else{
        print("<table>");
                $row = mysqli_fetch_assoc($result);
                foreach ($row as $key => $value){
					print("<th>$key</th>");
				}

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