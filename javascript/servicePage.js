//  document ready
// ________________________________________________________________________
// ------------------------------------------------------------------------
$(document).ready(function() {
    $('#btnDisplayByCategory').click(function() {
        $('.serviceCategoryDisplay').removeClass("svUnshow");
        $('.allServiceDisplay').addClass("svUnshow");
        $(this).addClass("selected");
        $('#btnDisplayAllService').removeClass("selected");
    });

    $('#btnDisplayAllService').click(function() {
        $('.serviceCategoryDisplay').addClass("svUnshow");
        $('.allServiceDisplay').removeClass("svUnshow");
        $(this).addClass("selected");
        $('#btnDisplayByCategory').removeClass("selected");
    });
});