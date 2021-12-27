var appID;
var appEmail;
var appPtName;
var appDate;
var appTime;
var appAmount;
var appPayment;

$(document).ready(function() {
    appID = $('#appId').text().replace(/ /g, '')
    appEmail = $('#appEmail').text().replace(/ /g, '')
    appPtName = $('#appPtName').text()
    appDate = $('#appDate').text().replace(/ /g, '')
    appTime = $('#appTime').text().replace(/ /g, '')
    appAmount = $('#appAmount').text().replace(/ /g, '')
    appPayment = $('#appPayment').text().replace(/ /g, '')

    sendEmailApproved(appEmail, 'Hi!')

    console.log(appDate +
        appTime +
        appAmount +
        appPayment)
    $('#btnDeleteApp').click(function() {
        if (confirm("Delete this appointment? \n\nWarning:  This can't be undone")) {
            $('#modalLoader').modal('show')
            $('#msgLoader').text('Deleting...')
            deleteApp()
        }
    });
    $('#btnArchiveApp').click(function() {
        if (confirm("Move to archive? \n\n Appoinment Id : " + appID)) {
            $('#modalLoader').modal('show')
            $('#msgLoader').text('Moving to archives...')
            archiveApp()
        }
    });

    $('#btnConfirmApprove').click(function() {
        $('#approvedBtns').hide();
        $('#approveLoader').removeClass("unShow")
        approveApp()
    });

    $('input[type=radio][name=options-IsPaid]').change(function() {

        if (this.value == 1) {
            $('#paid-wrapper').removeClass('unShow')
        } else if (this.value == 0) {
            $('#paid-wrapper').addClass('unShow')
        }

    });

    $("#inputAdminPassword").keypress(function() {
        $(this).removeClass("is-invalid")
    });

    $('#btnCheckAdminPassword').click(function() {
        if ($('#inputAdminPassword').val()) {
            var inputAdminPassword = $('#inputAdminPassword').val()
            checkIfPasswordCorrect(inputAdminPassword)
        }
    });

    $('#btnConfirmChanges').click(function() {
        $('#btnConfirmChanges').addClass('unShow')
        $('#changeLoader').removeClass('unShow')

        var IsPaidVal = $('input[name="options-IsPaid"]:checked').val()
        var IsDoneVal = $('input[name="options-IsDone"]:checked').val()
        var AmountPaidVal = $('#inpt-amountPaid').val()
        saveChangesApp(IsPaidVal, IsDoneVal, AmountPaidVal)

    });

    // var currentdate = new Date();
    // var datetime = currentdate.getDate() + "/" +
    //     (currentdate.getMonth() + 1) + "/" +
    //     currentdate.getFullYear() + " @ " +
    //     currentdate.getHours() + ":" +
    //     currentdate.getMinutes() + ":" +
    //     currentdate.getSeconds();

    // // document.write(datetime);
    // console.log(currentdate);
    // console.log(datetime);

    // var d = new Date();
    // d + ''; // "Sun Dec 08 2013 18:55:38 GMT+0100"
    // console.log(d.toUTCString());

});

function deleteApp() {
    var theURL = '../ajaxRequest/appointment.ajax.php';

    $.ajax({
        url: theURL,
        type: 'post',
        data: {
            deleteAppointment: 1,
            appId: appID,
        },
        success: function(response) {
            // response = JSON.stringify(response);
            // $("#serviceDelete").modal("hide");
            // alert(response);
            window.location.href = "appointment";
            console.log(response);
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

function archiveApp() {
    var theURL = '../ajaxRequest/appointment.ajax.php';

    $.ajax({
        url: theURL,
        type: 'post',
        data: {
            archiveAppointment: 1,
            appId: appID,
        },
        success: function(response) {
            // response = JSON.stringify(response);
            // $("#serviceDelete").modal("hide");
            // alert(response);
            window.location.href = "appointment";
            // console.log(response);
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

function saveChangesApp(IsPaidVal, IsDoneVal, AmountPaidVal) {
    var theURL = '../ajaxRequest/appointment.ajax.php';

    $.ajax({
        url: theURL,
        type: 'post',
        data: {
            saveChanges: 1,
            appId: appID,
            isPaid: IsPaidVal,
            isDone: IsDoneVal,
            amount: AmountPaidVal
        },
        success: function(response) {
            // response = JSON.stringify(response);
            // $("#serviceDelete").modal("hide");
            // alert(response);
            console.log(appPtName);
            if (IsPaidVal == 1) {
                var applnk = 'http://localhost/Dental%20Clinic/appointment/' + appID

                var message = `
                    <p><strong style='color:#bf2441; padding:2px; '>Hi! ` + appPtName + `</strong><br>
                            Your appointment has been changed to PAID.
                            <br><br>
                            <strong>Details</strong> <br>
                            Appointment ID : ` + appID + ` <br>
                            Appointment Date : ` + appDate + ` <br>
                            Appointment Time : ` + appTime + `<br>
                            Amount : ` + appAmount + `<br>
                            Payment Method : ` + appPayment + ` <br>
                            <p>See more Appointment details <a href="${applnk}" target="_blank">Click here</a></p>
                            <br><br>
                            <strong>Bartolome Dental Clinic</strong><br>
                            0975-123-8396
                    `
                    // console.log('email to send');
                sendEmailPaid(appEmail, message);
            }
            if (IsDoneVal == 1) {
                var applnk = 'http://localhost/Dental%20Clinic/appointment/' + appID

                var message = `
                    <p><strong style='color:#bf2441; padding:2px; '>Hi! ` + appPtName + `</strong><br>
                            Your appointment has been changed to DONE.
                            <br><br>
                            <strong>Details</strong> <br>
                            Appointment ID : ` + appID + ` <br>
                            Appointment Date : ` + appDate + ` <br>
                            Appointment Time : ` + appTime + `<br>
                            Amount : ` + appAmount + `<br>
                            Payment Method : ` + appPayment + ` <br>
                            <p>See more Appointment details <a href="${applnk}" target="_blank">Click here</a></p>
                            <br><br>
                            <strong>Bartolome Dental Clinic</strong><br>
                            0975-123-8396
                    `
                sendEmailDone(appEmail, message);

            }
            window.location.reload();
            console.log(response);
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


function approveApp() {
    var theURL = '../ajaxRequest/appointment.ajax.php';

    $.ajax({
        url: theURL,
        type: 'post',
        data: {
            approvedAppointment: 1,
            appId: appID,
        },
        success: function(response) {
            // response = JSON.stringify(response);
            // $("#serviceDelete").modal("hide");
            // alert(response);

            console.log(response);

            var applnk = 'http://localhost/Dental%20Clinic/appointment/' + appID

            var message = `
                    <p><strong style='color:#bf2441; padding:2px; '>Hi! ` + appPtName + `</strong><br>
                            Your appointment has been approved.
                            <br><br>
                            <strong>Details</strong> <br>
                            Appointment ID : ` + appID + ` <br>
                            Appointment Date : ` + appDate + ` <br>
                            Appointment Time : ` + appTime + `<br>
                            Amount : ` + appAmount + `<br>
                            Payment Method : ` + appPayment + ` <br>
                            <p>See more Appointment details <a href="${applnk}" target="_blank">Click here</a></p>
                            <br><br>
                            <strong>Bartolome Dental Clinic</strong><br>
                            0975-123-8396
                    `
            console.log('email to send');
            window.location.reload();
            sendEmailApproved(appEmail, message);
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


function checkIfPasswordCorrect(adminPassword) {
    $.ajax({
        url: '../ajaxRequest/admin.ajax.php',
        method: 'POST',
        data: {
            changesCheckPassword: 1,
            admin_password: adminPassword

        },
        success: function(response) {

            if (response != 1) {
                $('#inputAdminPassword').addClass('is-invalid')

            } else {
                $('#btnConfirmChanges').removeClass('unShow')
                $('#changes-wrapper').removeClass('unShow')
                $('#adminPassword-wrapper').addClass('unShow')

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


function onlyNumberKey(evt) {

    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}


function sendEmailPaid(email, message) {
    Email.send({
        Host: "smtp.gmail.com",
        Username: "bartolome.dentalclinic@gmail.com",
        Password: "qnbrlagqmkzchcuf",
        To: email,
        From: "bartolome.dentalclinic@gmail.com",
        Subject: 'Paid Appointment | Bartolome Dental Clinic',
        Body: message,
    });
    console.log(email + ' | \n' + message);
}

function sendEmailDone(email, message) {
    Email.send({
        Host: "smtp.gmail.com",
        Username: "bartolome.dentalclinic@gmail.com",
        Password: "qnbrlagqmkzchcuf",
        To: email,
        From: "bartolome.dentalclinic@gmail.com",
        Subject: 'Appointment Done | Bartolome Dental Clinic',
        Body: message,
    });
    console.log(email + ' | \n' + message);

}

function sendEmailApproved(email, message) {
    Email.send({
        Host: "smtp.gmail.com",
        Username: "bartolome.dentalclinic@gmail.com",
        Password: "qnbrlagqmkzchcuf",
        To: email,
        From: "bartolome.dentalclinic@gmail.com",
        Subject: 'Approved Appointment | Bartolome Dental Clinic',
        Body: message,
    });
    console.log(email + ' | \n' + message);

}