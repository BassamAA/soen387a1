<?php
session_start();
if(!isset($_SESSION['ID'])) {
    header('Location: student_login.htm');
    exit();
}
?>

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
			height: 900px;
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
		<h3 style="color:red; font">REMINDER: Courses cannot be added 10 days past the start date.</h3>
		<h2 class="subheading">Courses available:</h2>
		<div class="div_form">

			<?php
			$ID = $_SESSION["ID"];


			$query = "select * from course where CourseCode not in (select coursecode from enrolledin where id= $ID)";

			$curr_enrolled_in = "SELECT c.coursecode, c.title, c.semester, c.days, c.times, c.instructor, c.room, c.start_date, c.end_date FROM COURSE c INNER JOIN EnrolledIn e on c.CourseCode = e.CourseCode WHERE e.ID= $ID";


			// Connect to MySQL
			if (!($database = mysqli_connect(
				"localhost",
				"root",
				"wrgWM3K52n8fk3mC"
			)))
				die("Could not connect to database </body></html>");

			// open University database
			if (!mysqli_select_db($database, "University"))
				die("Could not open products database </body></html>");

			// query University database
			if (!($result_col_names = mysqli_query($database, $query))) {
				print("Could not execute query! <br />");
				die(mysqli_error() . "</body></html>");
			}
			if (!($result = mysqli_query($database, $query))) {
				print("Could not execute query! <br />");
				die(mysqli_error() . "</body></html>");
			}
			if (!($enrolled_col_names = mysqli_query($database, $curr_enrolled_in))) {
				print("Could not execute query! <br />");
				die(mysqli_error() . "</body></html>");
			}
			if (!($enrolled_result = mysqli_query($database, $curr_enrolled_in))) {
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



				// query to get the coursecodes list for the dropdown select menu
				$query = "select coursecode from course where CourseCode not in (select coursecode from enrolledin where id= $ID)";
				if (!($result = mysqli_query($database, $query))) {
					print("Could not execute query! <br />");
					die(mysqli_error() . "</body></html>");
				}

				print("<br />");
				print("<form method='post' action='enrollment_validation.php'>");

				print("<p>select a course to enroll in:</p>");

				print("<select name='select'>");

				print("<option selected='selected'>*</option>");
				for (
					$counter = 0;
					$row = mysqli_fetch_row($result);
					$counter++
				) {
					foreach ($row as $key => $value);
					print("<option>$value</option>");
				}
				print("</select>");
				print("<input class='button' type='submit' name='btnSubmit' value='Save Changes'/>");
				// print("<input class='button' type='submit' name='btnDelete' value='Enroll'/>");
				print("</form>");
			}




			print("<h2  class='subheading'>Courses Currently Enrolled In</h2>");


			// Checking if there are courses in the database
			if (mysqli_num_rows($enrolled_result) == 0) {
				echo "You are not enrolled in any course.";
			} else {

				// print("<br />");

				print("<table>");

				$row = mysqli_fetch_assoc($enrolled_col_names);
				foreach ($row as $key => $value) {
					print("<th>$key</th>");
				}

				for (
					$counter = 0;
					$row = mysqli_fetch_row($enrolled_result);
					$counter++
				) {
					// build table to display results
					print("<tr>");
					foreach ($row as $key => $value)
						print("<td>$value</td>");

					print("</tr>");
				}

				print("</table>");







			// query to get the coursecodes list for the dropdown select menu
			// $query = "select coursecode from course where CourseCode not in (select coursecode from enrolledin where id= $ID)";
			$query = "SELECT c.coursecode FROM COURSE c INNER JOIN EnrolledIn e on c.CourseCode = e.CourseCode WHERE e.ID= $ID";


			if (!($result = mysqli_query($database, $query))) {
				print("Could not execute query! <br />");
				die(mysqli_error() . "</body></html>");
			}

			print("<br />");
			print("<form method='post' action='enrollment_validation.php'>");

			print("<p>select a course to drop:</p>");

			print("<select name='select'>");

			print("<option selected='selected'>*</option>");
			for (
				$counter = 0;
				$row = mysqli_fetch_row($result);
				$counter++
			) {
				foreach ($row as $key => $value);
				print("<option>$value</option>");
			}
			print("</select>");
			print("<input class='button' type='submit' name='btnDelete' value='Delete'/>");
			// print("<input class='button' type='submit' name='btnDelete' value='Enroll'/>");
			print("</form>");














			}


			?>

		</div>
</body>


<!-- $query_fall = "select count(id) from enrolledin inner join course where enrolledin.CourseCode = 
			course.CourseCode and course.semester='fall'";

			$query_winter = "select count(id) from enrolledin inner join course where enrolledin.CourseCode = 
			course.CourseCode and course.semester='winter'";

			$query_summer = "select count(id) from enrolledin inner join course where enrolledin.CourseCode = 
			course.CourseCode and course.semester='summer'"; -->

</html>