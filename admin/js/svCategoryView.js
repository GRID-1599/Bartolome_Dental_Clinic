var serviceCat_id;
var serviceCat_name;
var serviceCat_description;
var serviceCat_image;

var ifChangesHappen = true;
var isImageDeleted = false;
var isImageEdited = false;
var ifImageOnlyChanged = true;

$(document).ready(function() {
    initDatas()

    $('#btnImage').click(function() {
        if (confirm("Delete this service category image?")) {
            $("#serviceCatImage").attr("src", "../resources/Dental_Pics/ALL_CATEGORIES/logov2.png");
            $('#serviceCat_image').val("");
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

    profileEdit();
    testHaveImage();

});

function initDatas() {
    serviceCat_id = $('#serviceCat_id').text();
    serviceCat_name = $('#serviceCat_name').val();
    serviceCat_description = $('#serviceCat_description').val();
    serviceCat_image = $('#serviceCatImage').attr('src');
}

function checkIfDataEdited() {
    isImageEdited = false;
    ifImageOnlyChanged = true;
    let changesList = {};
    var imageFile = $('#serviceCat_image').val();
    testHaveImage();
    // console.log(typeof imageFile);
    $("#changesList").empty();
    $('#bntConfirmChanges').show();
    $('#serviceViewModalLabel').show();

    new_serviceCat_id = $('#serviceCat_id').text();
    new_serviceCat_name = $('#serviceCat_name').val();
    new_serviceCat_description = $('#serviceCat_description').val();
    new_serviceCat_image = $('#serviceCatImage').attr('src');


    var flag = true; // if no changes happen

    if (new_serviceCat_name !== serviceCat_name) {
        $('#changesList').append(changes("Service Name", serviceCat_name, new_serviceCat_name));
        flag = false; // false - if changes happen
        ifImageOnlyChanged = false;

        changesList["Name"] = new_serviceCat_name;
    }
    if (new_serviceCat_description !== serviceCat_description) {
        $('#changesList').append(changes("Description", serviceCat_description, new_serviceCat_description));
        ifImageOnlyChanged = false;
        flag = false; // false - if changes happen
        changesList["Description"] = new_serviceCat_description;

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
    var testsrc = $('#serviceCatImage').attr('src');
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
    // console.log(JSON.stringify(serviceEditList));

    $.ajax({
        url: '../ajaxRequest/serviceCategory.ajax.php',
        method: 'POST',
        data: {
            editServiceCAtegory: 1,
            serviceCat_id: serviceCat_id,
            serviceCatToEdit: JSON.stringify(serviceEditList),
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
    var files = $('#serviceCat_image')[0].files;
    fd.append('file', files[0]);
    var theURL = '../ajaxRequest/serviceCategory.ajax.php?serviceCategoryId=' + serviceCat_id;
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

// edit profile
function profileEdit() {
    btnImageInput = document.getElementById("serviceCat_image");
    previewImage = document.getElementById("serviceCatImage");

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