var numberOfTrials = 3;
var time = 5;
$(document).ready(function() {
    $('#btnLogin').click(function() {
        // user = $('#adminUserName').val();
        // window.location.href = "index.php?adminUser=" + user;
        // $.post("index.php", { adminUser: user });

        if (!checkInputsIfNull()) {
            checkIsCorrect($('#adminUserName').val())
        }

        if (numberOfTrials === 0) {
            disable(true);
            startTimer();

        }
    });

    $("#adminUserName").keyup(function() {
        $(this).removeClass("is-invalid");
    });
    $("#adminPassword").keyup(function() {
        $(this).removeClass("is-invalid");
    });

});


function startTimer() {
    setInterval(function() {
        $("#timer").html(time);
        time -= 1;
        if (time === 0) {
            disable(false);
            location.reload();

            return
        }

    }, 1000);
}



function checkInputsIfNull() {
    var flag = false;
    if (!$('#adminUserName').val()) {
        $('#adminUserName').addClass("is-invalid");
        flag = true;
    }
    if (!$('#adminPassword').val()) {
        $('#adminPassword').addClass("is-invalid");
        flag = true;
    }
    return flag;
}

function checkIsCorrect(username) {
    $.ajax({
        url: '../ajaxRequest/admin.ajax.php',
        method: 'POST',
        data: {
            checkUsername: 1,
            admin_username: username
        },
        success: function(response) {
            // response = JSON.stringify(response);
            if (response == "Not found") {
                $('#adminUserName').focus();
                $('#adminUserName').addClass("is-invalid");
                $('#username_invalid').text("Username not found");
                $('#loader').addClass("visually-hidden");

                trial()


            } else {
                checkIfPasswordCorrect(username);
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

function checkIfPasswordCorrect(username) {
    $('#loader').removeClass("visually-hidden");
    $.ajax({
        url: '../ajaxRequest/admin.ajax.php',
        method: 'POST',
        data: {
            checkPassword: 1,
            admin_username: username,
            admin_password: $('#adminPassword').val()

        },
        success: function(response) {
            if (response != 1) {
                $('#adminPassword').focus();
                $('#adminPassword').addClass("is-invalid");
                $('#password_invalid').text("Incorrect Password");
                $('#loader').addClass("visually-hidden");

                trial()

            } else {
                user = $('#adminUserName').val();
                window.location.href = "index.php?adminUser=" + user;

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

function trial() {
    $('#trial_wrapper').removeClass("visually-hidden");
    $('#trial').text(numberOfTrials);
    numberOfTrials--;
}

function disable(flag) {
    $('#waitTimer').toggleClass("visually-hidden");

    $('#adminUserName').removeClass("is-invalid");
    $('#adminPassword').removeClass("is-invalid");

    $('#adminUserName').val("");
    $('#adminPassword').val("");

    $('#btnLogin').prop('disabled', flag);
    $('#adminUserName').prop('disabled', flag);
    $('#adminPassword').prop('disabled', flag);
    $('#inputRememberPassword').prop('disabled', flag);
}

function waiting(param) {

}