var service_id;
var service_name;
var service_category;
var service_category_text;
var service_price;
var service_description;
var service_image;
var service_availability;
var service_availability_text;
var service_duration;

var isImageAdded = false;

const durationInMinutes = {
    0: "0 mins ",
    15: "15 mins",
    30: "30 mins",
    45: "45 mins",
    60: "60 mins",
    75: "1 hr and 15 mins",
    90: "1 hr and 30 mins",
    105: "1 hr and 45 mins",
    120: "2 hrs",
    135: "2 hr and 15 mins",
    150: "2 hr and 30 mins",
    165: "2 hr and 45 mins",
    180: "3 hrs",
    195: "3 hr and 15 mins",
    210: "3 hr and 30 mins",
    225: "3 hr and 45 mins",
    240: "4 hrs",
};

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
        window.location.href = "service";

    });

    $('#service_duration').change(function() {

        $('#duration_value').text(this.value + " | " + durationInMinutes[this.value]);
    });


    profileEdit();
    testHaveImage();


});

function initDatas() {
    service_id = $('#service_id').text();
    service_name = $('#service_name').val();
    service_category = $('#service_category').val();
    service_category_text = $('#service_category').find("option:selected").text();
    service_price = $('#service_price').val();
    service_description = $('#service_description').val();
    service_image = $('#serviceImage').val();
    service_availability = $('#service_availability').val();
    service_duration = $('#service_duration').val();
    service_availability_text = $('#service_availability').find("option:selected").text();
    // console.log(service_id);
    // console.log(service_name);
    // console.log(service_category);
    // console.log(service_price);
    // console.log(service_description);
    // console.log(service_image);
    // console.log(service_availability);
    // console.log(service_duration);
}

function checkInputedDatas() {
    $("#messageList").empty();

    if (service_name === "") {
        $('#messageList').append(toshow("Service Name", "Service must have a name"));
    }
    if (service_price === "") {
        $('#messageList').append(toshow("Service Price", "Service must have a price"));
    }
}


function datasGet() {
    $('#serviceAddModalLabel').empty();
    $('#serviceAddModalLabel').append("New Service Data");

    $("#messageList").empty();
    $('#messageList').append(toshow("Name", $('#service_name').val()));
    $('#messageList').append(toshow("Category", $('#service_category').find("option:selected").text()));
    $('#messageList').append(toshow("Price", $('#service_price').val()));

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

    $('#messageList').append(toshow("Availability", $('#service_availability').find("option:selected").text()));
    $('#messageList').append(toshow("Duration", $('#service_duration').val()));


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
        url: '../ajaxRequest/services.ajax.php',
        method: 'POST',
        data: {
            addNewService: 1,
            service_id: service_id,
            service_name: $('#service_name').val(),
            service_category: $('#service_category').val(),
            service_price: $('#service_price').val(),
            service_description: $('#service_description').val(),
            service_image: " ",
            service_availability: $('#service_availability').val(),
            service_duration: $('#service_duration').val(),

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
    var theURL = '../ajaxRequest/services.ajax.php?serviceId=' + service_id;
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