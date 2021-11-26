$(document).ready(function() {
    $('.appointmentRow').each(function() {
        $(this).click(function() {
            var appID = $(this).find("td:eq(0)").text();
            window.location.href = "appointment/" + appID;
        });
    });
});