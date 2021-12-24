var service_id;
var service_name;
var service_description;
var service_image;

var isImageAdded = false;


$(document).ready(function() {
    $('#service_name').focus();

    $('#btnAddService').click(function() {
        initDatas();

        checkInputedDatas();
        if (!$.trim($('#messageList').html())) {
            $('#bntConfirmChanges').show();
            datasGet();
        } else {
            $('#serviceAddModalLabel').empty();
            $('#bntConfirmChanges').hide();
        }

    });

    $('#btnImage').click(function() {
        if (confirm("Delete this service image?")) {
            $("#serviceImage").attr("src", "../resources/Dental_Pics/SERVICE_IMAGES/logov2.png");
            $('#service_image').val("");
            $('#btnImage').hide();
            isImageAdded = false;
        }


    });

    $('#bntConfirmChanges').click(function() {
        postNewService();
        if (isImageAdded) {
            imageChange();
        }
        alert(service_id + "  " + service_name + " successfully added");
        window.location.href = "service/categories";

    });


    profileEdit();
    testHaveImage();


});

function initDatas() {
    service_id = $('#service_id').text();
    service_name = $('#service_name').val();
    service_description = $('#service_description').val();
    service_image = $('#serviceImage').val();
}

function checkInputedDatas() {
    $("#messageList").empty();

    if (service_name === "") {
        $('#messageList').append(toshow("Service Category Name", "Service must have a name"));
    }
}


function datasGet() {
    $('#serviceAddModalLabel').empty();
    $('#serviceAddModalLabel').append("New Service Data");

    $("#messageList").empty();
    $('#messageList').append(toshow("Name", $('#service_name').val()));

    if (!$('#service_description').val()) {
        $('#messageList').append(toshow("Description", "Empty"));
    } else {
        $('#messageList').append(toshow("Description", $('#service_description').val()));
    }
    if (!$('#service_image').val()) {
        $('#messageList').append(toshow("Image", "Empty"));
    } else {
        $('#messageList').append(toshow("Image", $('#service_image').val()));
    }


}

function toshow(title, bago) {
    var txt = `
        <dt class="col-sm-5">` + title + `</dt>
            <dd class="col-sm-7">
            <p >` + bago + `</p>
            </dd>
    `;
    return txt;
}

// edit profile
function profileEdit() {
    btnImageInput = document.getElementById("service_image");
    previewImage = document.getElementById("serviceImage");

    // previewImage.setAttribute("src", document.getElementById("userProfile").getAttribute('src'));

    btnImageInput.addEventListener("change", function() {
        const file = this.files[0];
        thisFile = file;
        if (file) {
            reader = new FileReader();
            reader.addEventListener("load", function() {
                previewImage.setAttribute("src", this.result);
                testHaveImage();
                isImageDeleted = false;
                isImageEdited = true;
            });
            reader.readAsDataURL(file);
        }
    });

    return
}

function testHaveImage() {
    var testsrc = $('#serviceImage').attr('src');
    testsrc = testsrc.substr(testsrc.length - 3);
    if (testsrc === "png") {
        $('#btnImage').hide();
    } else {
        $('#btnImage').show();
    }

    isImageAdded = true;
}



function postNewService() {
    $.ajax({
        url: '../ajaxRequest/serviceCategory.ajax.php',
        method: 'POST',
        data: {
            addNewServiceCategory: 1,
            serviceCat_id: service_id,
            serviceCat_name: $('#service_name').val(),
            serviceCat_description: $('#service_description').val(),
            serviceCat_image: " ",

        },
        success: function(response) {
            // response = JSON.stringify(response);
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

function imageChange() {
    var fd = new FormData();
    var files = $('#service_image')[0].files;
    fd.append('file', files[0]);
    var theURL = '../ajaxRequest/serviceCategory.ajax.php?serviceCategoryId=' + service_id;
    // console.log("url -" + theURL);
    $.ajax({
        url: theURL,
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response) {
            // response = JSON.stringify(response);
            console.log("response txt : " + response);
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