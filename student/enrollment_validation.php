<!-- PHP file used to check if student can enroll in/drop a course -->

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

			if ($CourseCode_selected == "*") {
				print("Please select a course from the dropdown menu");
				exit();
			}
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






			// get current date ,date object
			$curr_date = date('Y-m-d');
			$curr_date = datetime::createfromformat('Y-m-d', $curr_date);


			// get current semester string
			$curr_month = (int)date('m');
			$curr_semester = null;

			if ((1 <= $curr_month) && ($curr_month <= 4)) {
				$curr_semester = 'winter';
			} else if ((5 <= $curr_month) && ($curr_month <= 8)) {
				$curr_semester = 'summer';
			} else if ((9 <= $curr_month) && ($curr_month <= 12)) {
				$curr_semester = 'fall';
			}


			// get course semester string
			// returns the semester from the course selected
			$semester_query = "select semester from course where coursecode = '$CourseCode_selected'";
			$result_semester = mysqli_query($database, $semester_query);
			while ($row = mysqli_fetch_array($result_semester)) {
				$semester = $row['semester'];
			}
			$semester = strtolower($semester);


			// query to get course start date, date obj
			$startdate_query = "SELECT c.Start_date FROM COURSE c WHERE c.CourseCode= '$CourseCode_selected'";
			if (!($result = mysqli_query($database, $startdate_query))) {
				print("Could not execute query! <br />");
				die(mysqli_error() . "</body></html>");
			}
			$result = mysqli_fetch_assoc($result);
			foreach ($result as $value)
				$start_date = $value;

			$start_date = datetime::createfromformat('Y-m-d', $start_date);



			// query to get course end date
			$enddate_query = "SELECT c.End_date FROM COURSE c WHERE c.CourseCode= '$CourseCode_selected'";
			if (!($result = mysqli_query($database, $enddate_query))) {
				print("Could not execute query! <br />");
				die(mysqli_error() . "</body></html>");
			}
			$result = mysqli_fetch_assoc($result);
			foreach ($result as $value)
				$end_date = $value;

			$end_date = datetime::createfromformat('Y-m-d', $end_date);



			// query the number of courses that a student is already enrolled in for the semester of the selected course
			$query = "select count(course.coursecode) from enrolledin join course on enrolledin.coursecode = course.coursecode 
			where semester = (select semester from course where coursecode='$CourseCode_selected')
			and id = $ID";
			if (!($result = mysqli_query($database, $query))) {
				print("Could not execute query! <br />");
				die(mysqli_error() . "</body></html>");
			}
			$result = mysqli_fetch_assoc($result);
			foreach ($result as $value)
				$count = (int)$value;



			// in all cases, cannot enroll/drop a course after end date
			if ($curr_date > $end_date) {
				print("You cannot enroll/drop a course after the end date");
				exit();
			}


			if (isset($_POST["btnSubmit"])) {

				if ($count >= 5) {
					print("Sorry, you already have enrolled in 5 courses for the $semester semester");
					exit();
				}


				if ($curr_semester == $semester) {


					// check the 10 day condition
					$interval = $curr_date->diff($start_date)->days;
					// print("interval:");
					// print($interval);
					if ($interval >= 10 && $start_date < $curr_date) {
						print("Sorry. Can't enroll for a class 10 days after start date");
						exit();
					} else {
						// enroll
						$enroll_query = "insert into EnrolledIn values ('$CourseCode_selected', $ID);";
						if (!($result = mysqli_query($database, $enroll_query))) {
							print("Could not execute query! <br />");
							die(mysqli_error() . "</body></html>");
						} else {
							$count += 1;
							print("Successfully enrolled in $CourseCode_selected! <br/>");
							print("You have $count course(s) for the $semester semester.");
						}
					}
				} else {
					// enroll
					$enroll_query = "insert into EnrolledIn values ('$CourseCode_selected', $ID);";
					if (!($result = mysqli_query($database, $enroll_query))) {
						print("Could not execute query! <br />");
						die(mysqli_error() . "</body></html>");
					} else {
						$count += 1;
						print("Successfully enrolled in $CourseCode_selected! <br/>");
						print("You have $count course(s) for the $semester semester.");
					}
				}
			} else
			if (isset($_POST["btnDelete"])) {

				// query to delete course
				$delete_query = "DELETE FROM EnrolledIn WHERE CourseCode = '$CourseCode_selected'";
				if (!($result = mysqli_query($database, $delete_query))) {
					print("Could not drop the course! <br />");
					die(mysqli_error() . "</body></html>");
				} else {
					print("Succesfully dropped $CourseCode_selected!");
				}
			}





			?>
		</div>
</body>

</html>