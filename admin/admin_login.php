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
	$EmploymentID = $_POST["EmploymentID"];
	$PW_admin_input = $_POST["PW"];

	session_unset();
	session_start();
	$_SESSION["EmploymentID"] = $EmploymentID;


	// build SELECT query
	$query = "SELECT PW from Administrator where EmploymentID='$EmploymentID'";

	// Connect to MySQL
	if (!($database = mysqli_connect(
		"localhost",
		"root",
		""
	)))
		die("Could not connect to database </body></html>");


	// open University database
	if (!mysqli_select_db($database, "University"))
		die("Could not open University database </body></html>");
	
	
	if (!($result = mysqli_query($database, $query))) {
		print("Invalid EmploymentID<br />");
		die(mysqli_error() . "</body></html>");
	}

	$pw_in_db = null;
	if(mysqli_num_rows($result) != 0){
		$result = mysqli_fetch_assoc($result);
		foreach ($result as $value)
			$pw_in_db = (int)$value;
	}



	if ($pw_in_db == $PW_admin_input) {
		// password matches
		// redirect to course creation and query page
		// header("location:course_creation_and_query.php");exit;
		echo "<script type='text/javascript'>window.top.location='course_creation_and_query.php';</script>"; exit;
	} else {
		print("Invalid password, go back and try again!");
	};
	mysqli_close($database);

	?>
</body>

</html>