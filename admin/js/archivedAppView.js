var appID;

$(document).ready(function() {
    appID = $('#appId').text()
    console.log(appID);
    $('#btnDeleteApp').click(function() {
        if (confirm("Delete this archived appointment? \n\nWarning:  this can't be undone")) {
            $('#modalLoader').modal('show')
            $('#msgLoader').text('Deleting...')
            deleteApp()
        }
    });
    $('#btnArchiveApp').click(function() {
        if (confirm("Remove to archive? \n\n Appoinment Id : " + appID)) {
            $('#modalLoader').modal('show')
            $('#msgLoader').text('Unmoving to archives...')
            unarchiveApp()
        }
    });
});

function deleteApp() {
    var theURL = '../ajaxRequest/appointment.ajax.php';

    $.ajax({
        url: theURL,
        type: 'post',
        data: {
            deleteArchivedAppointment: 1,
            appId: appID,
        },
        success: function(response) {
            // response = JSON.stringify(response);
            // $("#serviceDelete").modal("hide");
            // alert(response);
            window.location.href = "archiveAppointments";
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

function unarchiveApp() {
    var theURL = '../ajaxRequest/appointment.ajax.php';

    $.ajax({
        url: theURL,
        type: 'post',
        data: {
            unArchiveAppointment: 1,
            appId: appID,
        },
        success: function(response) {
            // response = JSON.stringify(response);
            // $("#serviceDelete").modal("hide");
            // alert(response);
            window.location.href = "archiveAppointments";
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