var patient_id

$(document).ready(function() {
    $('.btnSaveNote').each(function() {
        $(this).hide();
    });

    $('.btnNewNote').hide();

    $('.areaNewNote').click(function() {
        $('.btnNewNote').show();
        $('.btnNewNote').click(function() {
            if ($('.areaNewNote').val() !== "") {
                $('.btnNewNote').hide();
                addNote($('.btnNewNote').val(), $('.areaNewNote').val());
            }
        });

    });

    $('.thisNote').click(function() {
        $(this).parent().find('.btnSaveNote').show();
        $(this).parent().find('.btnSaveNote').click(function() {
            $(this).hide();
            console.log(this.value);
            var msg_body = $(this).parent().parent().find('.thisNote').val();
            editNote(this.value, msg_body);
        });;

    });

    $('.btnDeleteNote').each(function() {
        $(this).click(function() {
            if (confirm("Delete this note?")) {
                $(this).parent().hide();
                deleteNote(this.value);
            }
        });
    });

    patient_id = $('#patientID').text();

});



function deleteNote(note_id) {
    $.ajax({
        url: '../ajaxRequest/patient.ajax.php',
        method: 'POST',
        data: {
            deleteNote: 1,
            patient_id: patient_id,
            note_id: note_id
        },
        success: function(response) {
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

function editNote(note_id, message_body) {
    $.ajax({
        url: '../ajaxRequest/patient.ajax.php',
        method: 'POST',
        data: {
            editNote: 1,
            note_id: note_id,
            patient_id: patient_id,
            message_body: message_body

        },
        success: function(response) {
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

function addNote(patient_id, message_body) {
    $.ajax({
        url: '../ajaxRequest/patient.ajax.php',
        method: 'POST',
        data: {
            addNote: 1,
            patient_id: patient_id,
            message_body: message_body
        },
        success: function(response) {
            // console.log(response);
            location.reload();
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