function appoinmentEventUpdate() {
    $('.appointmentRow').each(function() {
        $(this).click(function() {
            var appID = $(this).find("td:eq(0)").text();
            window.location.href = "appointment/" + appID;
        });
    });
}

var myModal = document.getElementById('filteringModal')
myModal.addEventListener('shown.bs.modal', function() {
    // myInput.focus()
    // alert()
})

$(document).ready(function() {
    $('.appointmentRow').each(function() {
        $(this).click(function() {
            var appID = $(this).find("td:eq(0)").text();
            window.location.href = "appointment/" + appID;
        });
    });


    setInterval(function() {
        appoinmentEventUpdate();

    }, 1000);


    // $('#filterDD').on('hide.bs.dropdown', function() {
    //     console.log(1);
    //     return false;
    // });


    $('input[type=radio][name=appDateRadio]').change(function() {
        if (this.value == 1) {
            $('#appDateSpecificWrapper').removeClass("unShow");
            $('#appDateRangeWrapper').addClass("unShow");

        } else if (this.value == 2) {
            $('#appDateSpecificWrapper').addClass("unShow");
            $('#appDateRangeWrapper').removeClass("unShow");


        }

    });

    $('input[type=radio][name=crtDateRadio]').change(function() {
        if (this.value == 1) {
            $('#crtDateSpecificWrapper').removeClass("unShow");
            $('#crtDateRangeWrapper').addClass("unShow");

        } else if (this.value == 2) {
            $('#crtDateSpecificWrapper').addClass("unShow");
            $('#crtDateRangeWrapper').removeClass("unShow");


        }

    });

    $('input[type=radio][name=amtRadio]').change(function() {
        if (this.value == 1) {
            $('#amtSpecificWrapper').removeClass("unShow");
            $('#amtRangeWrapper').addClass("unShow");

        } else if (this.value == 2) {
            $('#amtSpecificWrapper').addClass("unShow");
            $('#amtRangeWrapper').removeClass("unShow");


        }

    });



});