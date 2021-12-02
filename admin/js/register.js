const inputs = [
    "inputAdminFirstName",
    "inputAdminLastName",
    "inputAdminEmail",
    "inputAdminContact",
    "inputAdminUserName",
    "inputAdminPassword",
    "inputAdminPasswordConfirm",
];

$(document).ready(function() {
    $('#btnAdminRegister').click(function() {
        // $('#loader').addClass("spinner-border");
        if (!testInputsIfNull()) {
            // if (true) {
            if (!testValidInputs()) {
                registerAdmin();
            }
        }
        // $('#btnAdminRegister').text("Checking");

    });

    inputs.forEach(element => {
        var id = '#' + element;
        $(id).keyup(function() {
            $(this).removeClass("is-invalid");
        });
    });

});

function testInputsIfNull() {
    var flag = false;

    inputs.forEach(element => {
        var id = '#' + element;
        if (!$(id).val()) {
            $(id).addClass("is-invalid");
            flag = true;
        } else {
            $(id).removeClass("is-invalid");

        }
    });
    $('#loader').removeClass("spinner-border");
    return flag;
}

function testValidInputs() {
    var flag = false;
    var inputAdminFirstName = $('#inputAdminFirstName').val();
    var inputAdminLastName = $('#inputAdminLastName').val();
    var inputAdminEmail = $('#inputAdminEmail').val();
    var inputAdminContact = $('#inputAdminContact').val();
    var inputAdminUserName = $('#inputAdminUserName').val();
    var inputAdminPassword = $('#inputAdminPassword').val();
    var inputAdminPasswordConfirm = $('#inputAdminPasswordConfirm').val();

    if (!validateEmail(inputAdminEmail) || !validateEmail2(inputAdminEmail)) {
        $('#inputAdminEmail').focus();
        $('#inputAdminEmail').addClass("is-invalid");
        $('#email-msg').text("Invalid Email");
        flag = true;
    }

    if (inputAdminPassword !== inputAdminPasswordConfirm) {
        $('#inputAdminPasswordConfirm').addClass("is-invalid");
        $('#inputAdminPasswordConfirm').focus();
        $('#pwsd2-invalid').text("Password not match");
        flag = true;

    }

    return flag;

}

function registerAdmin() {
    $('#loader').addClass("spinner-border");

    var inputAdminFirstName = $('#inputAdminFirstName').val();
    var inputAdminLastName = $('#inputAdminLastName').val();
    var inputAdminEmail = $('#inputAdminEmail').val();
    var inputAdminContact = $('#inputAdminContact').val();
    var inputAdminUserName = $('#inputAdminUserName').val();
    var inputAdminPassword = $('#inputAdminPassword').val();
    var inputAdminPasswordConfirm = $('#inputAdminPasswordConfirm').val();
    // console.log(inputAdminFirstName);
    // console.log(inputAdminLastName);
    // console.log(inputAdminEmail);
    // console.log(inputAdminContact);
    // console.log(inputAdminUserName);
    // console.log(inputAdminPasswordConfirm);


    $.ajax({
        url: '../ajaxRequest/admin.ajax.php',
        method: 'POST',
        data: {
            adminRegister: 1,
            admin_firstname: inputAdminFirstName,
            admin_lastname: inputAdminLastName,
            admin_email: inputAdminEmail,
            admin_contact: inputAdminContact,
            admin_username: inputAdminUserName,
            admin_password: inputAdminPasswordConfirm,
        },
        success: function(response) {
            // response = JSON.stringify(response);

            if (response === "Invalid Username") {
                $('#inputAdminUserName').focus();
                $('#inputAdminUserName').addClass("is-invalid");
                $('#username_errormsg').text("This Username is already used. Please try another username");
            } else {

                alert(response);
                window.location.href = "admin";

            }
            $('#loader').removeClass("spinner-border");

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