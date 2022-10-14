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
		<!-- <h2 class="subheading">Courses available:</h2> -->
		<div class="div_form">

			<?php
			session_start();
			$ID = $_SESSION["ID"];
			$CourseCode_selected = $_POST['select'];
			date_default_timezone_set('US/Pacific');

			$curr_day = date('Y-m-d');

			$curr_day = datetime::createfromformat('Y-m-d',$curr_day);


			$startdate_query = "SELECT c.Start_date FROM COURSE c WHERE c.CourseCode= '$CourseCode_selected'";


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




			if (!($result = mysqli_query($database, $startdate_query))) {
				print("Could not execute query! <br />");
				die(mysqli_error() . "</body></html>");
			}
			$result = mysqli_fetch_assoc($result);
			foreach ($result as $value)
				$start_date = $value;

	
			$start_date = datetime::createfromformat('Y-m-d',$start_date);


			$interval = $curr_day->diff($start_date)->days;

			

			if ($interval > 10) {

				print("Sorry. Can't enroll for a class 10 days after start date");
				exit();
			} else {

			// returns the number of courses that a student is already enrolled in for the semester of the selected course
			$query = "select count(course.coursecode) from enrolledin join course on enrolledin.coursecode = course.coursecode 
			where semester = (select semester from course where coursecode='$CourseCode_selected')
			and id = $ID";


				// query University database
				if (!($result = mysqli_query($database, $query))) {
					print("Could not execute query! <br />");
					die(mysqli_error() . "</body></html>");
				}
				$result = mysqli_fetch_assoc($result);
				foreach ($result as $value)
					$count = (int)$value;


				// returns the semester from the course selected
				$semester_query = "select semester from course where coursecode = '$CourseCode_selected'";
				$result = mysqli_query($database, $semester_query);
				while ($row = mysqli_fetch_array($result)) {
					$semester = $row['semester'];
				}

				// check if enrolled in more than 5
				// 4 since starts at 0
				if ($count > 4) {
					print("Sorry, you already have enrolled in 5 courses for the $semester semester");
					exit();
				} else {
					$query2 = "insert into EnrolledIn values ('$CourseCode_selected', $ID);";

					if (!($result = mysqli_query($database, $query2))) {
						print("Could not execute query! <br />");
						die(mysqli_error() . "</body></html>");
					} else {
						$count += 1;
						print("Successfully enrolled in $CourseCode_selected! <br/>");
						print("You have $count course(s) for the $semester semester.");
					}
				}
			}

			?>
		</div>
</body>

</html>