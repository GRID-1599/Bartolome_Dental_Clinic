const civilbox = document.querySelector("#regPatientCivil");
const civilOptionsContainer = document.querySelector(".civilBox__container");
const civiOptionsList = document.querySelectorAll(".civilBox__options");

civilbox.addEventListener("click", () => {
    civilOptionsContainer.classList.toggle("civilBox__container-active");
});


civiOptionsList.forEach(o => {
    o.addEventListener("click", () => {
        civilbox.value = o.querySelector("label").innerHTML;
        civilOptionsContainer.classList.remove("civilBox__container-active");
    });
});


const genderbox = document.querySelector("#regPatientGender");
const genderOptionsContainer = document.querySelector(".genderBox__container");
const genderOptionsList = document.querySelectorAll(".genderBox__options");

genderbox.addEventListener("click", () => {
    genderOptionsContainer.classList.toggle("genderBox__container-active");
});


genderOptionsList.forEach(i => {
    i.addEventListener("click", () => {
        genderbox.value = i.querySelector("label").innerHTML;
        genderOptionsContainer.classList.remove("genderBox__container-active");
    });
});




// regPatientName = "";
// regPatientNickname = "";
// regPatientBday = "";
// regPatientAge = "";
// regPatientGender = "";
// regPatientCivil = "";
// regPatientAddress = "";
// regPatientEmail = "";
// regPatientContact = "";

function isInputsEmpty() {
    flag = false;
    if ($('#regPatientName').val() == "") {
        $('#regPatientName').focus();
        flag = true;
    } else if ($('#regPatientNickname').val() == "") {
        $('#regPatientNickname').focus();
        flag = true;
    } else if ($('#regPatientBday').val() == "") {
        $('#regPatientBday').focus();
        flag = true;
    } else if ($('#regPatientAge').val() == "") {
        $('#regPatientAge').focus();
        flag = true;
    } else if ($('#regPatientGender').val() == "") {
        $('#regPatientGender').focus();
        flag = true;
    } else if ($('#regPatientCivil').val() == "") {
        $('#regPatientCivil').focus();
        flag = true;
    } else if ($('#regPatientAddress').val() == "") {
        $('#regPatientAddress').focus();
        flag = true;
    } else if (!validateEmail($('#regPatientEmail').val()) || !validateEmail2($('#regPatientEmail').val())) {
        Swal.fire({
            icon: 'error',
            text: 'Invalid Email!'
        })
        $('#regPatientEmail').focus();
        flag = true;
    } else if ($('#regPatientEmail').val() == "") {
        $('#regPatientEmail').focus();
        flag = true;
    } else if ($('#regPatientContact').val() == "") {
        $('#regPatientContact').focus();
        flag = true;
    } else if (!validateContact()) {
        $('#regPatientContact').focus();
        flag = true;
    }
    return flag;

};

function onlyNumberKey(evt) {

    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}

function validateEmail(email) {
    let res = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return res.test(email);

}

function validateEmail2(emailID) {
    atpos = emailID.indexOf("@");
    dotpos = emailID.lastIndexOf(".");
    if (atpos < 1 || (dotpos - atpos < 2)) {
        return false;
    } else {
        return true;
    }
}

function validateContact() {
    var contact_entered = $('#regPatientContact').val()
    var flag = true
    console.log("asdad " + contact_entered.length);

    if (contact_entered.match(/[a-z]/i)) {
        flag = false
    }
    if (contact_entered.length != 10) {
        flag = false
    }

    return flag
}

function capitalizeEachWord(str) {
    return str.replace(/\w\S*/g, function(txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
}

$(document).ready(function() {
    $("#regPatientSubmit").on('click', function() {
        if (!isInputsEmpty()) {
            $('#modalLoader').modal('show')
            ajaxAddNewPatient();
        } else {}
    });

    $('#regPatientBday').change(function() {
        var date = $(this).val();
        if (getAge(date) >= 1 & getAge(date) <= 100) {
            $('#regPatientAge').val(getAge(date))
        }
    });


});

function toUpperCaseFirstLetterofText(str) {
    var splitStr = str.toLowerCase().split(' ');
    for (var i = 0; i < splitStr.length; i++) {
        // You do not need to check if i is larger than splitStr length, as your for does that for you
        // Assign it back to the array
        splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);
    }
    // Directly return the joined string
    return splitStr.join(' ');
}

function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}


function ajaxAddNewPatient() {
    var PatientName = toUpperCaseFirstLetterofText($('#regPatientName').val());
    var PatientNickname = toUpperCaseFirstLetterofText($('#regPatientNickname').val());
    var PatientBday = $('#regPatientBday').val();
    var PatientAge = $('#regPatientAge').val();
    var PatientGender = toUpperCaseFirstLetterofText($('#regPatientGender').val());
    var PatientCivil = toUpperCaseFirstLetterofText($('#regPatientCivil').val());
    var PatientAddress = toUpperCaseFirstLetterofText($('#regPatientAddress').val());
    var PatientEmail = $('#regPatientEmail').val();
    var PatientContact = 0 + $('#regPatientContact').val();
    console.log(PatientName);
    console.log(PatientNickname);
    console.log(PatientBday);
    console.log(PatientAge);
    console.log(PatientGender);
    console.log(PatientCivil);
    console.log(PatientAddress);
    console.log(PatientEmail);
    console.log(PatientContact);
    $.ajax({
        url: './registration.php',
        method: 'POST',
        data: {
            registration: 1,
            regPatientName: PatientName,
            regPatientNickname: PatientNickname,
            regPatientBday: PatientBday,
            regPatientAge: PatientAge,
            regPatientGender: PatientGender,
            regPatientCivil: PatientCivil,
            regPatientAddress: PatientAddress,
            regPatientEmail: PatientEmail,
            regPatientContact: PatientContact,
        },
        success: function(responseData) {
            // console.log(1212);
            // console.log(response);
            // console.log(patient_data[0].patient_id);
            // console.log(patient_data[0].name);Patient
            // console.log(patient_data[0].email);
            // $('#modalLoader').modal('show')
            setTimeout(function() {
                $("#modalLoader").modal("hide");
            }, 500);
            var patient_data = JSON.parse(responseData);
            addSuccessful(patient_data[0].patient_id, patient_data[0].name, patient_data[0].email);
            setRegInputEmpty();
        },
        error: function(jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            console.log(msg);
        },

    });
}

function addSuccessful(patient_ID, patient_Name, patient_email) {

    newPatientName = capitalizeEachWord(patient_Name);

    newPatientID = patient_ID;

    message = "<p><strong>Hi!  " + newPatientName + "</strong><br>" +
        "This is a confirmation that you registered as a new patient  of Bartolome Dental Clinic. Here's your patient number/ID <b style='color:#bf2441;'> " + newPatientID + "</b>.<br>" +
        "Please make sure to remember your patient ID for your setting of your futures appointment. Thank you!<br><br>" +
        "Bartolome Dental Clinic<br>" +
        "0975-123-8396";

    newPatientemail = patient_email;

    sendEmail(newPatientemail, message);

    text1 = "<p><strong>Hi!  " + newPatientName + "</strong>" +
        "<br>Don't Forget!" +
        "<br>Here's your patient id<b style='color:#bf2441;'> " + newPatientID + "</b>" +
        "<br><br>Please check your email to see more info and copy of your Patient ID</p>";

    Swal.fire({
        html: text1,
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#F05F79',
        cancelButtonColor: '#faa2b2',
        confirmButtonText: 'Go to my Emails',
        cancelButtonText: 'Ok',
        footer: ""
    }).then((result) => {
        if (result.isConfirmed) {
            window.open('https://mail.google.com/mail', '_blank');
            window.location.href = "index";
        } else {
            window.location.href = "index";
        }
    })
}


function setRegInputEmpty() {

    $('#regPatientName').val(null);
    $('#regPatientNickname').val(null);
    $('#regPatientBday').val(null);
    $('#regPatientAge').val(null);
    $('#regPatientGender').val(null);
    $('#regPatientCivil').val(null);
    $('#regPatientAddress').val(null);
    $('#regPatientEmail').val(null);
    $('#regPatientContact').val(null);

}

function sendEmail(email, message) {
    Email.send({
        Host: "smtp.gmail.com",
        Username: "bartolome.dentalclinic001@gmail.com",
        Password: "jehsdwbvqkarndck",
        To: email,
        From: "bartolome.dentalclinic001@gmail.com",
        Subject: 'New Patient | Bartolome Dental Clinic',
        Body: message,
    });
}