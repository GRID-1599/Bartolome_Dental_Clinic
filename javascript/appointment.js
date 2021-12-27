var app_id

$(document).ready(function() {
    app_id = $('#app_Id').text()

    imgPOP_Edit();

    $('#btnPOPAdd').click(function() {
        if ($('#pop_image').val()) {
            $('#loaderModal').modal('show')
            submitImagePOP()
        }
    });

    $('#btnPOPEdit').click(function() {
        if ($('#pop_image').val()) {
            $('#loaderModal').modal('show')
            deletePOP();
        }
    });

});


// edit POP image
function imgPOP_Edit() {
    btnImageInput = document.getElementById("pop_image");
    previewImage = document.getElementById("imgPOP");

    // previewImage.setAttribute("src", document.getElementById("userProfile").getAttribute('src'));

    btnImageInput.addEventListener("change", function() {
        const file = this.files[0];
        thisFile = file;
        if (file) {
            reader = new FileReader();
            reader.addEventListener("load", function() {
                previewImage.setAttribute("src", this.result);
                isImageDeleted = false;
                isImageEdited = true;
            });
            reader.readAsDataURL(file);
        }
    });

    return
}

function submitImagePOP() {
    var fd = new FormData();
    var files = $('#pop_image')[0].files;
    fd.append('file', files[0]);
    var theURL = './ajaxRequest/appointment.ajax.php?appID=' + app_id;
    console.log(fd);
    console.log("url -" + theURL);
    $.ajax({
        url: theURL,
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response) {
            // response = JSON.stringify(response);
            console.log("response txt : " + response);

            window.location.reload()
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

function deletePOP() {
    $.ajax({
        url: './ajaxRequest/appointment.ajax.php',
        type: 'post',
        data: {
            deletePOP: 1,
            popID: app_id
        },
        success: function(response) {
            // response = JSON.stringify(response);
            // $("#serviceDelete").modal("hide");
            // alert(response);

            submitImagePOP()
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