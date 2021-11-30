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

var ifChangesHappen = true;
var isImageDeleted = false;
var isImageEdited = false;
var ifImageOnlyChanged = true;

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
    initDatas();


    $('#btnImage').click(function() {
        if (confirm("Delete this service image?")) {
            $("#serviceImage").attr("src", "../resources/Dental_Pics/SERVICE_IMAGES/logov2.png");
            $('#service_image').val("");
            $('#btnImage').hide();
            isImageDeleted = true;
        }


    });

    $('#btnEditService').click(function() {
        checkIfDataEdited();
    });

    $('#bntConfirmChanges').click(function() {
        if (ifImageOnlyChanged === false) {
            editService();
        }
        if (isImageEdited) {
            // console.log("image changes");
            imageChange();
        }
        setTimeout(function() {
            $("#serviceChanges").modal("hide");
            location.reload();
        }, 500);



    });

    $('#btnConfirmDelete').click(function() {
        deleteService();
    });

    $('#service_duration').change(function() {
        $('#duration_value').text(this.value + " | " + durationInMinutes[this.value]);
    });
    console.log();
    $('#duration_value').text(durationInMinutes[$('#service_duration').val()]);


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
    service_image = $('#serviceImage').attr('src');
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


function checkIfDataEdited() {
    isImageEdited = false;
    ifImageOnlyChanged = true;
    let changesList = {};
    var imageFile = $('#service_image').val();
    testHaveImage();
    // console.log(typeof imageFile);
    $("#changesList").empty();
    $('#bntConfirmChanges').show();
    $('#serviceViewModalLabel').show();

    new_service_id = $('#service_id').text();
    new_service_name = $('#service_name').val();
    new_service_category = $('#service_category').val();
    new_service_price = $('#service_price').val();
    new_service_description = $('#service_description').val();
    new_service_image = $('#serviceImage').attr('src');
    new_service_availability = $('#service_availability').val();
    new_service_duration = $('#service_duration').val();


    var flag = true; // if no changes happen

    if (new_service_name !== service_name) {
        $('#changesList').append(changes("Service Name", service_name, new_service_name));
        flag = false; // false - if changes happen
        ifImageOnlyChanged = false;

        changesList["Name"] = new_service_name;
    }
    if (new_service_category !== service_category) {
        $('#changesList').append(changes("Service Category", service_category_text, $('#service_category').find("option:selected").text()));
        ifImageOnlyChanged = false;
        flag = false; // false - if changes happen
        changesList["ServiceCategory_ID"] = new_service_category;

    }
    if (new_service_price !== service_price) {
        $('#changesList').append(changes("Service Price", service_price, new_service_price));
        ifImageOnlyChanged = false;
        flag = false; // false - if changes happen
        changesList["Starting_Price"] = new_service_price;

    }
    if (new_service_description !== service_description) {
        $('#changesList').append(changes("Description", service_description, new_service_description));
        ifImageOnlyChanged = false;
        flag = false; // false - if changes happen
        changesList["Description"] = new_service_description;

    }
    if (imageFile !== "") {
        $('#changesList').append(changes2("Service Image", "Changed to : " + imageFile));
        flag = false; // false - if changes happen
        isImageEdited = true;

        // changesList["ImgFilename"] = imgdata;

    }
    if (isImageDeleted) {
        $('#changesList').append(changes2("Service Image", "Deleted image service"));
        ifImageOnlyChanged = false;
        flag = false; // false - if changes happen
        changesList["ImgFilename"] = imageFile;

    }

    if (new_service_availability !== service_availability) {
        $('#changesList').append(changes("Service Availablity", service_availability_text, $('#service_availability').find("option:selected").text()));
        ifImageOnlyChanged = false;
        flag = false; // false - if changes happen
        changesList["Availability"] = new_service_availability;

    }
    if (new_service_duration !== service_duration) {
        $('#changesList').append(changes("Service Duration", service_duration, new_service_duration));
        ifImageOnlyChanged = false;
        flag = false; // false - if changes happen
        changesList["Duration_Minutes"] = new_service_duration;

    }
    if (flag) {
        ifChangesHappen = false;
        $('#changesList').append(" <div> No Changes Happen </div>");
        $('#bntConfirmChanges').hide();
        $('#serviceViewModalLabel').hide();
        // <div> Nothing to changes </div>
    }
    serviceEditList = changesList;

    return flag;

}

function changes(title, dati, bago) {
    var txt = `
        <dt class="col-sm-5 ">` + title + `</dt>
            <dd class="col-sm-7 ">
            <p >` + dati + `</p>
            <p >to</p>
            <p >` + bago + `</p>
            </dd>
    `;
    return txt;
}

function changes2(title, bago) {
    var txt = `
        <dt class="col-sm-5">` + title + `</dt>
            <dd class="col-sm-7">
            <p >` + bago + `</p>
            </dd>
    `;
    return txt;
}

function testHaveImage() {
    var testsrc = $('#serviceImage').attr('src');
    testsrc = testsrc.substr(testsrc.length - 3);
    if (testsrc === "png") {
        $('#btnImage').hide();
    } else {
        $('#btnImage').show();
    }
}

var serviceEditList = {};

function editService() {
    // console.log(serviceEditList["Duration_Minutes"]);
    // console.log("nasama");
    console.log(JSON.stringify(serviceEditList));

    $.ajax({
        url: '../ajaxRequest/services.ajax.php',
        method: 'POST',
        data: {
            editService: 1,
            service_id: service_id,
            serviceToEdit: JSON.stringify(serviceEditList),
            // serviceToEdit: serviceEditList,

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

function deleteService() {
    var theURL = '../ajaxRequest/services.ajax.php';
    // console.log("url -" + theURL);
    $.ajax({
        url: theURL,
        type: 'post',
        data: {
            deleteService: 1,
            service_id: service_id,
        },
        success: function(response) {
            // response = JSON.stringify(response);
            $("#serviceDelete").modal("hide");
            alert(response);
            window.location.href = "service";
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
            });
            reader.readAsDataURL(file);
        }
    });

    return
}