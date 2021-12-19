$(document).ready(function() {

    $('#btnViewPatient').click(function() {
        $('#modalInputs').modal('hide')
        $('#modalPatientInputs').modal('show')

    });

    $('#viewAppId').keyup(function() {
        if ($(this).val().length === 15) {
            $('#loaderApp').removeClass('unShow')
            getAppointments($(this).val())
        } else {
            $('#viewAppId').removeClass("is-invalid")
            $('#viewAppId').removeClass("is-valid")
            $('#btnAppProceed').addClass('unShow')
        }
    });

    $('#btnAppProceed').click(function() {
        window.location.href = "appointment/" + $('#viewAppId').val()
    });

    $('#viewPatientId').keyup(function() {
        if ($(this).val().length === 4) {
            $('#loaderPatient').removeClass('unShow')
            getPatients($(this).val())
        } else {
            $('#viewPatientId').removeClass("is-invalid")
            $('#viewPatientId').removeClass("is-valid")
            $('#btnIdSubmit').addClass('unShow')
        }
    });

    $('#btnIdSubmit').click(function() {
        $("#formPatientID").submit();
    });

});

function getAppointments(appointmentID) {
    $.ajax({
        url: './ajaxRequest/appointment.ajax.php',
        method: 'POST',
        data: {
            getAppointmentId: 1,
            appId: appointmentID
        },
        success: function(response) {
            if (response === "") {
                $('#viewAppId').addClass("is-invalid")
            } else {
                $('#btnAppProceed').removeClass('unShow')
                $('#viewAppId').addClass("is-valid")
            }
            $('#loaderApp').addClass('unShow')


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

function getPatients(patientID) {
    $.ajax({
        url: './ajaxRequest/patient.ajax.php',
        method: 'POST',
        data: {
            getAllPatients: 1,
            patientID: patientID
        },
        success: function(response) {

            try {
                var patients = JSON.parse(response);
                // console.log(patients['Patient_ID']);
                $('#patientIdName').text("Patient Name: " + patients['Name']);
                $('#viewPatientId').addClass("is-valid")
                $('#btnIdSubmit').removeClass('unShow')
                $("#formInputPatientId").val($('#viewPatientId').val());
            } catch (e) {
                $('#viewPatientId').addClass("is-invalid")
            }
            $('#loaderPatient').addClass('unShow')

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