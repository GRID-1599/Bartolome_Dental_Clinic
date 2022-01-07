var AdminEmail;
var AdminUsername;
var AdminName;
var theCode;
var AdminNewPassword;

$(document).ready(function() {
    $('#btnSubmit').click(function() {
        if ($('#inputEmail').val()) {
            $(this).prop("disabled", true);
            $('.loader').removeClass("unShow")
            var email = $('#inputEmail').val()
            checkEmailValidity(email)
        } else {
            $('#inputEmail').focus()
        }

    });

    $('#btnSubmitCode').click(function() {
        if ($('#digitCode').val()) {
            if ($('#digitCode').val() === theCode.toString()) {
                $('#enter').addClass('unShow')
                $('#reset').removeClass('unShow')
            } else {
                $('#digitCode').addClass("is-invalid")

            }
        }
    });

    $("#digitCode").keypress(function() {
        $(this).removeClass("is-invalid")
    });


    $('#btnReset').click(function() {
        var pswd1 = $('#inputAdminPassword').val()
        var pswd2 = $('#inputAdminPasswordConfirm').val()
        if (!$('#inputAdminPasswordConfirm').val() & !$('#inputAdminPassword').val()) {
            $('#inputAdminPasswordConfirm').addClass('is-invalid')
            console.log(1);
            $('#inputAdminPassword').addClass('is-invalid')

        } else if (!$('#inputAdminPassword').val()) {
            console.log(2);
            $('#inputAdminPassword').addClass('is-invalid')

        } else if (!$('#inputAdminPasswordConfirm').val()) {
            $('#inputAdminPasswordConfirm').addClass('is-invalid')
            console.log(3);
        } else if (pswd1 != pswd2) {
            $('#inputAdminPasswordConfirm').addClass('is-invalid')
            $('#pwsd2-invalid').text("Password didnt match!")
            console.log(4);

        } else if (pswd1 === pswd2) {
            AdminNewPassword = pswd2;
            console.log(AdminNewPassword);
            resetPassword()
            console.log(5);

        }

        // if ($('#inputAdminPassword').val()) {
        //     $('#inputAdminPassword').removeClass('is-invalid')

        // } else if ($('#inputAdminPasswordConfirm').val()) {
        //     $('#inputAdminPasswordConfirm').removeClass('is-invalid')

        // }


    });

    $("#inputAdminPassword").keypress(function() {
        $(this).removeClass("is-invalid")
    });

    $("#inputAdminPasswordConfirm").keypress(function() {
        $(this).removeClass("is-invalid")
    });



});

function generateCode() {
    theCode = Math.floor(100000 + Math.random() * 900000)
}

function onlyNumberKey(evt) {

    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}


function checkEmailValidity(theEmail) {
    $.ajax({
        url: '../ajaxRequest/admin.ajax.php',
        method: 'POST',
        data: {
            adminGetEmail: 1,
            adminEmail: theEmail
        },
        success: function(response) {
            if (response === "null") {
                $('#warningTxt').text("Email not found")
            } else {
                var admin_data = JSON.parse(response);
                AdminEmail = admin_data["Email"];
                AdminUsername = admin_data["Username"];
                AdminName = admin_data["First_Name"] + " " + admin_data["Last_Name"];
                console.log(AdminEmail);

                generateCode()
                sendEmail(AdminEmail, theMessage())

                $('#forgot').addClass('unShow')
                $('#enter').removeClass('unShow')
                $('#adminName').text(AdminName)
                $('#adminUsername').text(AdminUsername)
                $('#adminEmail').text(AdminEmail)

            }
            $('.loader').addClass("unShow")
            $('#btnSubmit').prop("disabled", false);



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

function theMessage() {
    message = "<p><strong>Hi! Admin " + AdminName + "</strong><br>" +
        "Your six digit code is: <br><br>" +
        "<b style='color:#bf2441; font-size: 1.5rem;'> " + theCode + "</b><br><br>" +
        "Bartolome Dental Clinic<br>" +
        "0975-123-8396";

    return message
}

function resetPassword() {
    $.ajax({
        url: '../ajaxRequest/admin.ajax.php',
        method: 'POST',
        data: {
            adminResetPassword: 1,
            adminUsername: AdminUsername,
            adminNewPassword: AdminNewPassword
        },
        success: function(response) {
            alert(response)
            window.location.href = ""

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



function sendEmail(email, message) {
    Email.send({
        Host: "smtp.gmail.com",
        Username: "bartolome.dentalclinic001@gmail.com",
        Password: "jehsdwbvqkarndck",
        To: email,
        From: "bartolome.dentalclinic001@gmail.com",
        Subject: 'Forgot Password | Bartolome Dental Clinic',
        Body: message,
    });
}