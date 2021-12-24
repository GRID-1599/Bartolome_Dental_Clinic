var ptName
var ptGender
var ptBirthday

$(document).ready(function() {
    $('#btnSubmit').click(function() {
        if (inputValidity()) {
            ptName = $('#ptName').val();
            ptGender = $('#ptGender').val();
            ptBirthday = $('#ptBirthday').val();
            $('#result').removeClass('unShow')
            checkPAtientDetails()
        }
    });

    $("#ptName").keypress(function() {
        $(this).removeClass("is-invalid")
    });
    $("#ptGender").click(function() {
        $(this).removeClass("is-invalid")
    });
    $("#ptBirthday").click(function() {
        $(this).removeClass("is-invalid")
    });
});


function inputValidity() {
    var flag = true;

    if (!$('#ptName').val()) {
        flag = false;
        $('#ptName').addClass('is-invalid')
    }
    if (!$('#ptGender').val()) {
        flag = false;
        $('#ptGender').addClass('is-invalid')

    }
    if (!$('#ptBirthday').val()) {
        $('#ptBirthday').addClass('is-invalid')
        flag = false;

    }
    return flag;
}

// Christian Jude Catudio

function checkPAtientDetails() {
    $.ajax({
        url: 'ajaxRequest/patient.ajax.php',
        method: 'POST',
        data: {
            checkPatient: 1,
            pt_Name: ptName,
            pt_Gender: ptGender,
            pt_Birthday: ptBirthday

        },
        success: function(response) {
            $('#notFound').addClass('unShow')
            $('#found').addClass('unShow')


            if (response === 'null') {
                $('#notFound').removeClass('unShow')

            } else {
                var patient_data = JSON.parse(response);
                $('#found').removeClass('unShow')
                $('#ptNameOutput').text(patient_data["Name"]);
                $('#ptemailOutput').text(patient_data["Email"]);

                theEmail(patient_data["Patient_ID"], patient_data["Email"], patient_data["Name"])
            }




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

function theEmail(patientID2, email2, name2) {
    message2 = "<p><strong>Hi!  " + name2 + "</strong><br>" +
        "Here's your patient number/ID <br> <b style='color:#bf2441; font-size: 1.5rem;'> " + patientID2 + "</b>.<br>" +
        "Please make sure to remember your patient ID for your setting of your futures appointment. Thank you!<br><br>" +
        "Bartolome Dental Clinic<br>" +
        "0975-123-8396";

    sendEmail(email2, message2)
}


function sendEmail(email, message) {
    Email.send({
        Host: "smtp.gmail.com",
        Username: "bartolome.dentalclinic@gmail.com",
        Password: "qnbrlagqmkzchcuf",
        To: email,
        From: "bartolome.dentalclinic@gmail.com",
        Subject: 'Forgot Patient ID | Bartolome Dental Clinic',
        Body: message,
    });
}