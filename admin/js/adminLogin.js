$(document).ready(function() {
    $('#btnLogin').click(function() {
        user = $('#adminUserName').val();
        window.location.href = "index.php?adminUser=" + user;
    });
});