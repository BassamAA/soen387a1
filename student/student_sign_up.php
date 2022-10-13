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
	$ID = $_POST["ID"];
	$FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];
	$Address = $_POST["Address"];
	$PhoneNumber = $_POST["PhoneNumber"];
	$birthday_day = $_POST["BirthdayDay"];
    $birthday_month = $_POST["BirthdayMonth"];
    $birthday_year = $_POST["BirthdayYear"];
	$Email = $_POST["Email"];
	$PW = $_POST["PW"];

	$DateOfBirth = $birthday_year.'-'.$birthday_month.'-'.$birthday_day;
	// build INSERT query

	// (`ID`,`FirstName`,`LastName`,`Address`,`Email`,`PhoneNumber`,`DateOfBirth`,`PW`)
	$query = "INSERT INTO `Student` VALUES ($ID,'$FirstName','$LastName','$Address','$Email',$PhoneNumber,'$DateOfBirth',$PW)";

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

	// print($query);
	$result = mysqli_query($database, $query);
	if ( false===$result ) {
		printf("error: %s\n", mysqli_error($database));
	}
	else {
		echo 'done.';
	}
	// query University database
	if (!($result = mysqli_query($database, $query))) {
		print("Could not execute query! <br />");
		die(mysqli_error($myConnection) . "</body></html>");
	} 
	else {
		print("You were succesfully registered");
	};
	mysqli_close($database);
	?>
	<!-- end PHP script -->

</body>

</html>