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
	$ID = $_POST["ID"];
	$FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];
	$Address = $_POST["Address"];
	$PhoneNumber = $_POST["PhoneNumber"];
	// $DateOfBirth = $_POST["DateOfBirth"];
	$birthday_day = $_POST["BirthdayDay"];
	$birthday_month = $_POST["BirthdayMonth"];
	$birthday_year = $_POST["BirthdayYear"];
	$Email = $_POST["Email"];
	$PW = $_POST["PW"];
	$DateOfBirth = $birthday_year . '-' . $birthday_month . '-' . $birthday_day;
	$state ="FALSE";

	// build SELECT query
	$query = "SELECT ID from Student";

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

	$result = mysqli_query($database, $query);
	
	if(mysqli_num_rows($result) != 0){
	$result = mysqli_fetch_assoc($result);
	foreach ($result as $value)
		if ($ID == (int)$value) {
			$state = "TRUE";
		};
	}

	if ($state == "FALSE") {

		// build INSERT query
		$query2 = "INSERT INTO Student (ID,FirstName,LastName,Address,Email,PhoneNumber,DateOfBirth,PW)
				VALUES ('$ID','$FirstName','$LastName','$Address','$Email','$PhoneNumber','$DateOfBirth','$PW')";


		// query University database
		if (!($result = mysqli_query($database, $query2))) {
			print("Could not execute query! <br />");
			die(mysqli_error() . "</body></html>");
		} else {
			print("You were succesfully registered");
		};
	} else {
		print("This student ID already has an associated account, go back and try again!");
	};
	mysqli_close($database);
	?>
	<!-- end PHP script -->

</body>

</html>