$(document).ready(function() {
    $('#btnPatientEdit').click(function() {
        $('.detail').each(function() {
            $(this).removeClass('form-control-plaintext')
            $(this).addClass('form-control')
            $(this).removeAttr("disabled")
        });
        $('.rowEdit').addClass('unShow')
        $('.rowSave').removeClass('unShow')
    });

    $('#btnPatientCancel').click(function() {
        location.reload()
    });

    $('#btnPatientSave').click(function() {
        getInputs()
        saveChanges($('#ptID').text())
        $('#loaderModal').modal('show')
    });
});


function getInputs() {
    ptName = $('#ptName').val();
    ptNickname = $('#ptNickname').val();
    ptBday = $('#ptBday').val();
    ptAge = $('#ptAge').val();
    ptGender = $('#ptGender').val();
    ptStatus = $('#ptStatus').val();
    ptAddress = $('#ptAddress').val();
    ptEmail = $('#ptEmail').val();
    ptContact = $('#ptContact').val();

    console.log($('#ptID').text());
    console.log(ptName);
    console.log(ptNickname);
    console.log(ptBday);
    console.log(ptAge);
    console.log(ptGender);
    console.log(ptStatus);
    console.log(ptAddress);
    console.log(ptEmail);
    console.log(ptContact);
}

function saveChanges(thePatientID) {
    $.ajax({
        url: './ajaxRequest/patient.ajax.php',
        method: 'POST',
        data: {
            editPatient: 1,
            patientID: thePatientID,
            ptName: $('#ptName').val(),
            ptNickname: $('#ptNickname').val(),
            ptBday: $('#ptBday').val(),
            ptAge: $('#ptAge').val(),
            ptGender: $('#ptGender').val(),
            ptStatus: $('#ptStatus').val(),
            ptAddress: $('#ptAddress').val(),
            ptEmail: $('#ptEmail').val(),
            ptContact: $('#ptContact').val()
        },
        success: function(response) {
            console.log(response);
            location.reload()


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