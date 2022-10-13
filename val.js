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
    let corsecode_array = courseCode.split(" ")
    let course_name = corsecode_array[0]
    let course_num = corsecode_array[1]

    // if (courseCode == "") {
    //     alert("Course Code must be filled out!");
    //     document.forms["form"]["CourseCode"].focus();
    //     return false;
    // }
    // else if (length(course_name) != 4) {
    //     alert("Course Code must be 4 characters.");
    //     document.forms["form"]["CourseCode"].focus();
    //     return false;
    // }
    // else if (length(course_num) != 3) {
    //     alert("Course Number must be 3 digits.");
    //     document.forms["form"]["CourseCode"].focus();
    //     return false;
    // }


    // // Course Title
    // if (courseTitle == "") {
    //     alert("Course Title must be filled out!");
    //     document.forms["form"]["Title"].focus();
    //     return false;
    // }


    // // Semester
    // let semester_arr = ['fall','winter','summer']

    // if (semester == "") {
    //     alert("Semester must be filled out!");
    //     document.forms["form"]["Semester"].focus();
    //     return false;
    // }
    // else if(!semester_arr.includes(semester.toLowerCase())){
    //     alert("Semester must be either fall winter or summer!");
    //     document.forms["form"]["Semester"].focus();
    //     return false;
    // }


    // // Instructor 
    // if (instructor == "") {
    //     alert("Instructor must be filled out!");
    //     document.forms["form"]["Instructor"].focus();
    //     return false;
    // }


    // // Room
    // if (room == "") {
    //     alert("Room must be filled out!");
    //     document.forms["form"]["Room"].focus();
    //     return false;
    // }


    // // days
    // if (days == "") {
    //     alert("Days must be filled out!");
    //     document.forms["form"]["Days"].focus();
    //     return false;
    // }


    // // times
    // if (times == "") {
    //     alert("times must be filled out!");
    //     document.forms["form"]["Times"].focus();
    //     return false;
    // }


    // startDate : YYYY-MM-DD
    let start = startDate.split('-');
    let currdate = new Date().getFullYear();
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
    let end = endDate.split('-');
    if (endDate == "") {
        alert("endDate must be filled out!");
        document.forms["form"]["End_date"].focus();
        return false;
    }
    else if(end[0] < currdate){
        alert("Year is invalid, must be current year or upcoming year");
        document.forms["form"]["Start_date"].focus();
        return false;
    }
    else if(end[0] < start[0]){
        alert("Year is invalid, must be past start year");
        document.forms["form"]["Start_date"].focus();
        return false;
    }

}