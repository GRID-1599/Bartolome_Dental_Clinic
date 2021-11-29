$(document).ready(function() {
    $('.message-wrapper').click(function() {
        console.log($(this).attr("id"));
        window.location.href = "message/" + $(this).attr("id");
    });
});