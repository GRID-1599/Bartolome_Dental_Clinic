var inputs_info = [
    "inputAdminFirstName",
    "inputAdminLastName",
    "inputAdminEmail",
    "inputAdminContact",
];

var inputs_username = [
    "inputNewAdminUserName",
    "inputAdminPassword",
];

var inputs_password = [
    "inputCurrentAdminPassword",
    "inputNewAdminPassword",
    "inputNewAdminPasswordConfirm",
];


$(document).ready(function() {
    $('#btnAdminSaveChanges').click(function() {
        if (!checkInputsIfNull()) {
            if (!checkInputsValidity()) {
                saveChanges($('#btnAdminSaveChanges').val());
            }
        }
    });

    $('#btnSaveNewUsername').click(function() {

    });

    $('#btnSavenewPassword').click(function() {
        if (!checkPasswrordInputsIfNull()) {
            if (checkPasswrordisMatch()) {
                checkIfPasswordCorrect($('#btnSavenewPassword').val());
            }
        }
    });


    inputs_info.forEach(element => {
        var id = '#' + element;
        $(id).keyup(function() {
            $(this).removeClass("is-invalid");
        });
    });

    inputs_username.forEach(element => {
        var id = '#' + element;
        $(id).keyup(function() {
            $(this).removeClass("is-invalid");
        });
    });

    inputs_password.forEach(element => {
        var id = '#' + element;
        $(id).keyup(function() {
            $(this).removeClass("is-invalid");
        });
    });


});

function checkInputsIfNull() {
    var flag = false;
    var inputAdminFirstName = $('#inputAdminFirstName').val();
    var inputAdminLastName = $('#inputAdminLastName').val();
    var inputAdminEmail = $('#inputAdminEmail').val();
    var inputAdminContact = $('#inputAdminContact').val();

    inputs_info.forEach(element => {
        var id = '#' + element;
        if (!$(id).val()) {
            $(id).addClass("is-invalid");
            flag = true;
        } else {
            $(id).removeClass("is-invalid");

        }
    });

    return flag;
}

function checkInputsValidity() {
    var flag = false;
    var inputAdminEmail = $('#inputAdminEmail').val();

    if (!validateEmail(inputAdminEmail) || !validateEmail2(inputAdminEmail)) {
        $('#inputAdminEmail').focus();
        $('#inputAdminEmail').addClass("is-invalid");
        $('#email-msg').text("Invalid Email");
        flag = true;
    }
    return flag;
}


// username chages 
function checkUsernameInputsIfNull() {
    var flag = false;

    inputs_info.forEach(element => {
        var id = '#' + element;
        if (!$(id).val()) {
            $(id).addClass("is-invalid");
            flag = true;
        } else {
            $(id).removeClass("is-invalid");

        }
    });

    return flag;
}

// password chages 
function checkPasswrordInputsIfNull() {
    var flag = false;

    inputs_password.forEach(element => {
        var id = '#' + element;
        if (!$(id).val()) {
            $(id).addClass("is-invalid");
            flag = true;
        } else {
            $(id).removeClass("is-invalid");

        }
    });

    return flag;
}



function checkPasswrordisMatch() {

    var inputNewAdminPassword = $('#inputNewAdminPassword').val();
    var inputNewAdminPasswordConfirm = $('#inputNewAdminPasswordConfirm').val();

    // console.log(inputNewAdminPassword);
    // console.log(inputNewAdminPasswordConfirm);
    if (inputNewAdminPassword !== inputNewAdminPasswordConfirm) {
        $('#inputNewAdminPasswordConfirm').focus();
        $('#inputNewAdminPasswordConfirm').addClass("is-invalid");
        return false;
    }
    return true;
}


function saveChanges(username) {

    var inputAdminFirstName = $('#inputAdminFirstName').val();
    var inputAdminLastName = $('#inputAdminLastName').val();
    var inputAdminEmail = $('#inputAdminEmail').val();
    var inputAdminContact = $('#inputAdminContact').val();

    $.ajax({
        url: '../ajaxRequest/admin.ajax.php',
        method: 'POST',
        data: {
            adminEdit: 1,
            admin_firstname: inputAdminFirstName,
            admin_lastname: inputAdminLastName,
            admin_email: inputAdminEmail,
            admin_contact: inputAdminContact,
            admin_username: username,
        },
        success: function(response) {
            // response = JSON.stringify(response);
            alert(response);
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


function checkIfPasswordCorrect(username) {
    var currentPassword = $('#inputCurrentAdminPassword').val();
    $('#loader').removeClass("visually-hidden");
    $.ajax({
        url: '../ajaxRequest/admin.ajax.php',
        method: 'POST',
        data: {
            checkPassword: 1,
            admin_username: username,
            admin_password: currentPassword,
        },
        success: function(response) {
            // response = JSON.stringify(response);

            if (response != 1) {
                $('#inputCurrentAdminPassword').focus();
                $('#inputCurrentAdminPassword').addClass("is-invalid");
                $('#loader').addClass("visually-hidden");

            } else {
                savePasswordChanges(username);
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

function savePasswordChanges(username) {
    var newPassword = $('#inputNewAdminPasswordConfirm').val();

    $.ajax({
        url: '../ajaxRequest/admin.ajax.php',
        method: 'POST',
        data: {
            savePassword: 1,
            admin_username: username,
            admin_password: newPassword,
        },
        success: function(response) {
            // response = JSON.stringify(response);
            alert(response)
            $('#inputCurrentAdminPassword').val(null);
            $('#inputNewAdminPassword').val(null);
            $('#inputNewAdminPasswordConfirm').val(null);
            $('#loader').addClass("visually-hidden");

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