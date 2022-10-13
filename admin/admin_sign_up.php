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
	$birthday_day = $_POST["BirthdayDay"];
    $birthday_month = $_POST["BirthdayMonth"];
    $birthday_year = $_POST["BirthdayYear"];
	$Email = $_POST["Email"];
	$PW = $_POST["PW"];

	// $DateOfBirth = (int)$birthday_year.'-'.(int)$birthday_month.'-'.(int)$birthday_day;
	$DateOfBirth = $birthday_year.'-'.$birthday_month.'-'.$birthday_day;
	

	// build INSERT query

	$query = "INSERT INTO `Administrator` (`EmploymentID`, `FirstName`, `LastName`, `Address`, `Email`, `PhoneNumber`, `DateOfBirth`, `PW`)
				VALUES ($EmploymentID,'$FirstName','$LastName','$Address','$Email',$PhoneNumber,'$DateOfBirth', $PW)";

	print($query);
	//Connect to MySQL
	// if (!($database = mysqli_connect(
	// 	"127.0.0.1",
	// 	"root",
	// 	""
	// )))
	// 	die("Could not connect to database </body></html>");

	$host = '127.0.0.1';
	$port = 3306;
	$dbname = 'University';
	$user = 'root';
	$pass = '';
	$charset = 'utf8mb4';

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	try {
		$db = new mysqli($host, $user, $pass, $dbname, $port);
		$db->set_charset($charset);
		$db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
	} catch (\mysqli_sql_exception $e) {
		throw new \mysqli_sql_exception($e->getMessage(), $e->getCode());
	}
	unset($host, $dbname, $user, $pass, $charset, $port); // we don't need them anymore

	// // open University database
	// if (!mysqli_select_db($database, "University"))
	// 	die("Could not open products database </body></html>");


	// query University database
	if (!($result = mysqli_query($db, $query))) {
		print("Could not execute query! <br />");
		die(mysqli_error($myConnection) . "</body></html>");
	} // end if
	else {
		print("Admin was succesfully registered");
	}
	mysqli_close($db);
	?>
	<!-- end PHP script -->

</body>

</html>