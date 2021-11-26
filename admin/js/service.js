function serviceEventUpdate() {
    $('.servicerow').each(function() {
        $(this).click(function() {
            var ID = $(this).find("td:eq(0)").text();
            window.location.href = "service/" + ID;
        });
    });
}

$(document).ready(function() {
    $('.servicerow').each(function() {
        $(this).click(function() {
            var ID = $(this).find("td:eq(0)").text();
            window.location.href = "service/" + ID;
        });
    });


    setInterval(function() {
        serviceEventUpdate();

    }, 1000);

    // $(window).change(function() {
    //     //resize just happened, pixels changed
    //     alert(11);
    // });
    // serviceEventUpdate();
    // var ID = $(this).find("td:eq(0)").text();
    // window.location.href = "service/" + ID;


});