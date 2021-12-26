var appID;

$(document).ready(function() {
    appID = $('#appId').text()
        // console.log(appID);
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
            window.location.reload();
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


function checkIfPasswordCorrect(adminPassword) {
    $.ajax({
        url: '../ajaxRequest/admin.ajax.php',
        method: 'POST',
        data: {
            changesCheckPassword: 1,
            admin_password: adminPassword

        },
        success: function(response) {
            console.log(response);

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