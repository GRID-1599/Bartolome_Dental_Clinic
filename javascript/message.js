const inputSenderName = document.querySelector('#inputSenderName');
const inputSendercontact = document.querySelector('#inputSendercontact');
const inputSenderEmail = document.querySelector('#inputSenderEmail');
const inputSenderMessage = document.querySelector('#inputSenderMessage');

const btnSendMessage = document.querySelector('#btnSendMessage');

// btnSendMessage.addEventListener('click', () => {
//     console.log(inputSenderMessage.value);
//     SetEmptyMessageInputs();
//     Swal.fire({
//         icon: 'success',
//         title: "Message Sent"
//     });
// });

function isInputsEmpty() {
    flag = false;
    if ($('#inputSenderMessage').val() == "") {
        $('#inputSenderMessage').focus();
        flag = true;

        return flag;

    };
}



$(document).ready(function() {
    $("#btnSendMessage").on('click', function() {
        if (!isInputsEmpty()) {
            ajaxAddNewMessage();
        } else {
            Swal.fire({
                icon: 'info',
                text: "Please input first your message",
                confirmButtonText: "Ok, Got it!",
                confirmButtonColor: "#F05F79"
            });

        }


    });
});

function ajaxAddNewMessage() {
    $.ajax({
        url: './ajaxRequest/message.ajax.php',
        method: 'POST',
        data: {
            message: 1,
            msgName: $('#inputSenderName').val(),
            msgContact: $('#inputSendercontact').val(),
            msgEmail: $('#inputSenderEmail').val(),
            msgMessage: $('#inputSenderMessage').val(),
        },
        success: function(response) {
            console.log(response);
            Swal.fire({
                icon: 'success',
                title: "Message Sent"
            });
            // console.log(1212);
            // console.log(response);
            // console.log(patient_data[0].patient_id);
            // console.log(patient_data[0].name);
            // console.log(patient_data[0].email);
            // var patient_data = JSON.parse(response);
            // addSuccessful(patient_data[0].patient_id, patient_data[0].name, patient_data[0].email);
            SetEmptyMessageInputs()
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


function SetEmptyMessageInputs() {
    $('#inputSenderName').val(null)
    $('#inputSendercontact').val(null)
    $('#inputSenderEmail').val(null)
    $('#inputSenderMessage').val(null)
}