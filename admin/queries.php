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
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td,
		th {
			border: 1px solid black;
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>
</head>

<body>
	<?php

    $InputCourseCode_or_ID = $_POST['input'];
    $Select = $_POST['select'];


	// input is ID of student
	if($Select == 'List of courses taken by a student'){
		// $query = "SELECT *  FROM COURSE c INNER JOIN EnrolledIn e on c.CourseCode = e.CourseCode
		// WHERE e.ID = $InputCourseCode_or_ID";

		$query = "SELECT c.CourseCode, c.title, c.semester, c.days, c.times, c.Instructor, c.room,
		c.Start_date, c.end_date FROM COURSE c INNER JOIN EnrolledIn e on c.CourseCode = e.CourseCode
		WHERE e.ID = $InputCourseCode_or_ID";

		$query2 = "SELECT FirstName,LastName,ID FROM STUDENT s WHERE s.ID = $InputCourseCode_or_ID";

	}else
	
		// input is coursecode
		if($Select == 'List of students in a course'){
			$query = "SELECT * FROM Student s INNER JOIN EnrolledIn e on s.ID = e.ID WHERE e.CourseCode = '$InputCourseCode_or_ID'";

			$query2 = "SELECT * FROM COURSE c WHERE c.CourseCode = $InputCourseCode_or_ID";

	}

	

	// Connect to MySQL
	if (!($database = mysqli_connect(
		"localhost",
		"root",
		"wrgWM3K52n8fk3mC"
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

		if (mysqli_num_rows($result) == 0) {
			echo "there are no students in this course.";
		} else {


			// query University database
			if (!($result_col_names = mysqli_query($database, $query))) {
				print("Could not execute query! <br />");
				die(mysqli_error() . "</body></html>");
			}


			
			if (!($result = mysqli_query($database, $query))) {
				print("Could not execute query! <br />");
				die(mysqli_error() . "</body></html>");
			}


			if (!($result_title = mysqli_query($database, $query2))) {
				print("Could not execute query! <br />");
				die(mysqli_error() . "</body></html>");
			}


			// Checking if there are courses in the database
			if (mysqli_num_rows($result) == 0) {
				echo "there are no courses available.";
			} else {

				// print("<br />");

				print("<table>");

				$row = mysqli_fetch_assoc($result_col_names);
				foreach ($row as $key => $value) {
					print("<th>$key</th>");
				}

				for (
					$counter = 0;
					$row = mysqli_fetch_row($result);
					$counter++
				) {
					// build table to display results
					print("<tr>");
					foreach ($row as $key => $value)
						print("<td>$value</td>");

					print("</tr>");
				}

				print("</table>");

		print("</table>");
		}
    }
}






	mysqli_close($database);
	?>
	<!-- end PHP script -->

</body>

</html>