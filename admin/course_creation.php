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
	//  extract( $_POST );
	$CourseCode = $_POST["CourseCode"];
	$Title = $_POST["Title"];
	$Semester = $_POST["Semester"];
	$Instructor = $_POST["Instructor"];
	$Room = $_POST["Room"];
	$Days = $_POST["Days"];
	$Times = $_POST["Times"];
	$Start_date = $_POST["Start_date"];
	$End_date = $_POST["End_date"];


	// build INSERT query

	$query = "INSERT INTO Course (CourseCode,Title,Semester,Days,Times,Instructor,Room,Start_date, End_date)
				VALUES ('$CourseCode','$Title','$Semester','$Days','$Times','$Instructor','$Room','$Start_date', '$End_date')";

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
		die(mysqli_error() . "</body></html>");
	} else {
		print("Course successfully created!");
	};
	mysqli_close($database);
	?>
	<!-- end PHP script -->

</body>

</html>