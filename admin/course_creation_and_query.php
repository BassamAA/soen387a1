<?php
session_start();
if(!isset($_SESSION['EmploymentID'])) {
    header('Location: admin_login.htm');
    exit();
}

?>
<!DOCTYPE html">

<html>

<head>
    <title>Create users</title>
    <style>
        .box {
            background-color: gainsboro;
            position: relative;
            top: 4%;
            /* top: 10%; */
            transform: translate(0, 1%);
            margin: auto;
            align-items: center;
            width: 700px;
            height: 500px;
            padding: 10px;
            border: 4px solid gray;
            border-radius: 15px;
            box-shadow: 5px 5px;
        }

        .welcome {
            padding-left: 2%;
            line-height: 30px;
            font-family: Verdana;
            font-size: 12px;
            top: 15%;

        }

        .div_form {
            padding-left: 2%;
            line-height: 20px;
            font-family: Verdana;
            font-size: 15px;
            padding-bottom: 3%;
        }

        .div_form2 {
            padding-left: 4%;
            line-height: 20px;
            font-family: Verdana;
            font-size: 15px;
        }

        .button {
            padding-left: 2%;
            font-family: Verdana;
            font-size: 15px;
        }

        .button:hover {
            background-color: rgb(241, 241, 241);
        }

        .sign_in {
            padding-left: 2%;
            display: inline-block;
            margin-top: 10px;
            line-height: 30px;
            font-family: Verdana;
            font-size: 12px;
        }

        .table td {
            padding: 0 10px;
        }
    </style>
</head>

<div class="dropdown">
    <link href="../navigate.css" rel="stylesheet">
    <button class="dropbtn">Navigate</button>
    <div class="dropdown-content">
        <a href="../welcome.htm">Welcome</a>
        <a href="../student/student_sign_up.htm">Create Student Account</a>
        <a href="admin_sign_up.htm">Create Admin Account</a>
        <a href="../student/student_login.htm">Student Log In</a>
        <a href="admin_login.htm">Admin Log In</a>
    </div>
</div>

<body>
    <div class="box">
        <div class="welcome">
            <h2>Admin Course Creation:</h2>
        </div>

        <div class="div_form">
            <!-- onsubmit="return validateForm()" -->
            <form name='form' action="course_creation.php" method="post" onsubmit="return validateForm()">
                <table class="table">
                    <tr>
                        <td>Course Code:</td>
                        <td><input name="CourseCode" type="text" max="10" placeholder="COMP 335"/></td>
                        <td>Title:</td>
                        <td><input name="Title" type="text" max="8" placeholder="Intro Theoretical Comp"></td>
                    </tr>
                    <tr>
                        <td>Semester:</td>
                        <td><input name="Semester" type="text" placeholder="Fall"/></td>
                        <td>Instructor:</td>
                        <td><input name="Instructor" type="text" placeholder="John Doe"/></td>
                    </tr>
                    <tr>
                        <td>Room:</td>
                        <td><input name="Room" type="text" placeholder="H561"/></td>
                        <td>Days:</td>
                        <td><input name="Days" type="text" placeholder="MO, TU, WED, TH, FR"/></td>
                    </tr>
                    <tr>
                        <td>Times:</td>
                        <td><input name="Times" type="text" placeholder="HH:MM:SS" /></td>
                        <td>Start Date:</td>
                        <td><input name="Start_date" type="text" placeholder="YYYY-MM-DD" /></td>
                    </tr>
                    <tr>
                        <td>End Date:</td>
                        <td><input name="End_date" type="text" placeholder="YYYY-MM-DD" /></td>                    </tr>
                    <tr>
                        <td><br /></td>
                    </tr>
                    <tr>
                        <td><input class="button" type="submit" placeholder="Create Course"/></td>
                    </tr>
                </table>
                <script type="text/javascript" src="../course_creation_validation.js"></script>
            </form>
        </div>
        <div class="welcome">
            <h2 class>Admin Query Forms:</h2>
        </div>
        <div class="div_form2">
            <form method="post" action="queries.php">
                <p>Select a field to display:
                    <select name="select">
                        <option selected="selected">*</option>
                        <option>List of students in a course</option>
                        <option>List of courses taken by a student</option>
                    </select>
                </p>
                <p>Enter Course Code or Student ID here:
                    <input name="input" type="text" max="8" />
                </p>
                <input class="button" type="submit" value="Send Query" />
            </form>
        </div>

    
        </div>
    </div>
</body>

</html>