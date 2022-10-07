<!-- php file to create new administrator -->

<!-- PHP file used to create new student -->

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Search Results</title>
	<style type="text/css">
		body {
			font-family: arial, sans-serif;
			background-color: #F0E68C
		}

		table {
			background-color: #ADD8E6
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
	$FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];
	$Address = $_POST["Address"];
	$PhoneNumber = $_POST["PhoneNumber"];
	$DateOfBirth = $_POST["DateOfBirth"];
	$Email = $_POST["Email"];
	$PW = $_POST["PW"];

	// build INSERT query

	$query = "INSERT INTO Administrator (EmploymentID, FirstName, LastName, Address, Email, PhoneNumber, DateOfBirth, PW)
				VALUES ('$EmploymentID','$FirstName','$LastName','$Address','$Email','$PhoneNumber','$DateOfBirth', '$PW')";


	// Connect to MySQL
	if (!($database = mysqli_connect(
		"localhost",
		"root",
		""
	)))
		die("Could not connect to database </body></html>");

	// open University database
	if (!mysqli_select_db($database, "University"))
		die("Could not open products database </body></html>");


	// query University database
	if (!($result = mysqli_query($database, $query))) {
		print("Could not execute query! <br />");
		die(mysqli_error() . "</body></html>");
	} // end if
	else {
		print("Admin was succesfully registered");
	}
	mysqli_close($database);
	?>
	<!-- end PHP script -->

</body>

</html>