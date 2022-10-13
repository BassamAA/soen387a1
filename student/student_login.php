<!-- PHP file used to check login password -->

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
	$ID = $_POST["ID"];
	$PW_user_input = $_POST["PW"];


	// build SELECT query
	$query = "SELECT PW from Student where ID=$ID";

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
	
	$result = mysqli_query($database, $query);
	$result = mysqli_fetch_assoc($result);
	foreach ($result as $value)
		$pw_in_db = (int)$value;
		

	if ($pw_in_db == $PW_user_input) {
		// password matches
		// redirect to course enrollment page
		// header("location:./student_course_enrollment.php");exit;
		echo "<script type='text/javascript'>window.top.location='student_course_enrollment.php';</script>"; exit;
		// echo "<script type='text/javascript'>window.top.location='welcome.htm';</script>"; exit;
	} else {
		print("Invalid password, go back and try again!");
	};

	?>
</body>

</html>