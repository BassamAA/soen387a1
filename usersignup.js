
function validateForm() {
    // id, name, last name, email, address, phone, date birth
    let Id = document.forms["form"]["ID"].value;
    let FirstName = document.forms["form"]["FirstName"].value;
    let LastName = document.forms["form"]["LastName"].value;
    let Email = document.forms["form"]["Email"].value;
    let Adress = document.forms["form"]["Adress"].value;
    let PhoneNumber = document.forms["form"]["PhoneNumber"].value;
    let DateOfBirth = document.forms["form"]["DateOfBirth"].value;

    // validating the user ID
    // must be 8 digits long
    // html input type number already validates for numbers and not letters and special characters
    if (Id == "") {
        alert("Student ID must be filled out");
        document.forms["form"]["ID"].focus();
        return false;
    }
    else {
        //this might be unnecessary because input number
        // already checks for nmubers
        // if (!(parseInt(Number(Id)) == Id)){
        //     alert("ID must only contain integers");
        //     return false;
        // };
        if (Id.length != 8){
            alert("ID must be of length 8");
            return false;
        };
    };


    // validating the First Name using regex 
    // only letters allowed
    var regName = /^[a-zA-Z]+$/;
    if (!regName.test(FirstName)){
        alert("First Name must only contain letters");
        document.forms["form"]["FirstName"].focus();
        return false;        
    }

    // validating Last Name
    // only letters allowed
    if (!regName.test(LastName)){
        alert("Last Name must only contain letters");
        document.forms["form"]["LastName"].focus();
        return false;        
    }


    // validating email
    // must contain characters + '@' + characters
    var regEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    if (!regEmail.test(Email)) {
        alert("Invalid email address!");
        document.form1.text1.focus();
        return false;
    }

    // validate phone number
    // no spaces or with spaces between the digits

    var regPhone1 = /^\d{10}$/;
    var regPhone2 = /^\(?([0-9]{3})\)?[ ]?([0-9]{3})[ ]?([0-9]{4})$/;
    if ((!regPhone1.test(PhoneNumber)) && (!regPhone2.test(PhoneNumber))) {
        alert("Invalid Phone Number!");
        document.forms["form"]["PhoneNumber"].focus();
        return false;
    }


    // validating date of birth
    // must have format: DD-MM-YYYY
    // must be 18
    var regDateOfBirth = /^\d{4}-\d{2}-\d{2}$/
    if(!regDateOfBirth.test(DateOfBirth)) {
        alert("Invalid Date of Birth format, !");
        document.forms["form"]["DateOfBirth"].focus();
        return false;
    }

    DateOfBirth = DateOfBirth.split('-');
    let thisYear = new Date().getFullYear();
    let birthYear = parseInt(DateOfBirth[2], 10);
    let birthMonth = parseInt(DateOfBirth[1], 10);
    let birthDay = parseInt(DateOfBirth[0], 10);

    if (birthDay > 31){
        alert("Invalid Birth Day!");
        document.forms["form"]["DateOfBirth"].focus();
        return false;   
    }
    if (birthMonth > 12){
        alert("Invalid Birth Month!");
        document.forms["form"]["DateOfBirth"].focus();
        return false;   
    }

    if (birthYear > (thisYear-18)){
        alert("Invalid Birthday. Must be 18 years old!");
        document.forms["form"]["DateOfBirth"].focus();
        return false;
    }






    return true;

}