<!DOCTYPE html">
<html>

<head>
	<title>Administrator Page</title>
	<style type="text/css">
		.box {
			background-color: gainsboro;
			position: relative;
			transform: translate(0, -3%);
			margin: auto;
			align-items: center;
			width: 950px;
			height: 600px;
			padding: 10px;
			border: 4px solid gray;
			border-radius: 15px;
			box-shadow: 5px 5px;
		}

		.heading {
			font-family: Verdana;
			font-size: 15px;
			text-align: center;
		}

		.subheading {
			padding-top: 2%;
			padding-left: 2%;
			font-family: Verdana;
			font-size: 20px;
		}

		.div_form {
			padding-left: 2%;
			font-family: Verdana;
		}

		.button {
			padding-left: 2%;
			font-family: Verdana;
			font-size: 15px;
		}

		.button:hover {
			background-color: rgb(241, 241, 241);
		}

		table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
		}

		td, th {
		border: 1px solid black;
		text-align: left;
		padding: 8px;
		}

		tr:nth-child(even) {
		background-color: #dddddd;
		}
	</style>
</head>
<div class="dropdown">
	<link href="../navigate.css" rel="stylesheet">
	<button class="dropbtn">Navigate</button>
	<div class="dropdown-content">
		<a href="../welcome.htm">Welcome</a>
		<a href="student_sign_up.htm">Create Student Account</a>
		<a href="../admin/admin_sign_up.htm">Create Admin Account</a>
		<a href="student_login.htm">Student Log In</a>
		<a href="../admin/admin_login.htm">Admin Log In</a>

	</div>
</div>

<body>

	<div class="box">
		<div class="heading">
			<h2>Student Enrollment Form</h2>
		</div>
		<h2 class="subheading">Courses available:</h2>
		<div class="div_form">

			<?php
			$query_col_names = "SELECT COLUMNS from Course";
			$query = "SELECT * from Course";

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
			if (!($query_col_names = mysqli_query($database, $query))) {
				print("Could not execute query! <br />");
				die(mysqli_error() . "</body></html>");
			}
			if (!($result = mysqli_query($database, $query))) {
				print("Could not execute query! <br />");
				die(mysqli_error() . "</body></html>");
			}

			// print("<br />");
			print("<table>");

			$row = mysqli_fetch_assoc($query_col_names);
			foreach ($row as $key => $value){
					print("<th>$key</th>");}

					for ( $counter = 0; $row = mysqli_fetch_row( $result );
					$counter++ )
					{
					// build table to display results
					print( "<tr>" );
					foreach ( $row as $key => $value ) 
						print( "<td>$value</td>" );
		
					print( "</tr>" );
					}

			print("</table>");

			$query = "SELECT CourseCode from Course";
			if (!($result = mysqli_query($database, $query))) {
				print("Could not execute query! <br />");
				die(mysqli_error() . "</body></html>");
			}

			print("<br />");

			print("<p>select a course to enroll in:</p>");

			print("<select name='select'>");

			print("<option selected='selected'>*</option>");
			for ( $counter = 0; $row = mysqli_fetch_row( $result );
					$counter++ ){
			foreach($row as $key => $value);
				print("<option>$value</option>");
		}
			print("</select>")


			?>		

		</div>

</body>

</html>