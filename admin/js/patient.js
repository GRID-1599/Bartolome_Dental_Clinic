function patientEventUpdate() {
    $('.patientRow').each(function() {
        $(this).click(function() {
            var ID = $(this).find("td:eq(0)").text();
            window.location.href = "patients/" + ID;
        });
    });
}

$(document).ready(function() {
    $('.patientRow').each(function() {
        $(this).click(function() {
            var ID = $(this).find("td:eq(0)").text();
            window.location.href = "patients/" + ID;
        });
    });


    setInterval(function() {
        patientEventUpdate();

    }, 1000);

    // $(window).change(function() {
    //     //resize just happened, pixels changed
    //     alert(11);
    // });
    // patientEventUpdate();
    // var ID = $(this).find("td:eq(0)").text();
    // window.location.href = "patient/" + ID;


});