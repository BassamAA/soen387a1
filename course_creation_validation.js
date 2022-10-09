function validateForm() {
    // courseCode, courseTitle, semester, instructor, room, days, times, startDate,endDate
    let courseCode = document.forms["form"]["CourseCode"].value;
    let courseTitle = document.forms["form"]["Title"].value;
    let semester = document.forms["form"]["Semester"].value;
    let instructor = document.forms["form"]["Instructor"].value;
    let room = document.forms["form"]["Room"].value;
    let days = document.forms["form"]["Days"].value;
    let times = document.forms["form"]["Times"].value;
    let startDate = document.forms["form"]["Start_date"].value;
    let endDate = document.forms["form"]["End_date"].value;

    // Course Code
    if (courseCode == "") {
        alert("Course Code must be filled out!");
        document.forms["form"]["CourseCode"].focus();
        return false;
    }
    else if (courseCode.length != 7) {
        alert("Course Code must be of length 7");
        document.forms["form"]["CourseCode"].focus();
        return false;
    };

    // Course Title
    if (courseTitle == "") {
        alert("Course Title must be filled out!");
        document.forms["form"]["Title"].focus();
        return false;
    }

    // Semester
    if (semester == "") {
        alert("Semester must be filled out!");
        document.forms["form"]["Semester"].focus();
        return false;
    }

    // Instructor 
    if (instructor == "") {
        alert("Instructor must be filled out!");
        document.forms["form"]["Instructor"].focus();
        return false;
    }

    // Room
    if (room == "") {
        alert("Room must be filled out!");
        document.forms["form"]["Room"].focus();
        return false;
    }

    // days
    if (days == "") {
        alert("Days must be filled out!");
        document.forms["form"]["Days"].focus();
        return false;
    }

    // times
    if (times == "") {
        alert("times must be filled out!");
        document.forms["form"]["Times"].focus();
        return false;
    }

    // startDate : YYYY-MM-DD
    start = startDate.split('-');
    currdate = new Date().getFullYear();
    if (startDate == "") {
        alert("startDate must be filled out!");
        document.forms["form"]["Start_date"].focus();
        return false;
    }
    else if(start[0] < currdate){
        alert("Year is invalid, must be current year or upcoming year");
        document.forms["form"]["Start_date"].focus();
        return false;
    }

    // endDate
    if (endDate == "") {
        alert("endDate must be filled out!");
        document.forms["form"]["End_date"].focus();
        return false;
    }

}