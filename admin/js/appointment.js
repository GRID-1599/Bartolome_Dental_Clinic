function appoinmentEventUpdate() {
    $('.appointmentRow').each(function() {
        $(this).click(function() {
            var appID = $(this).find("td:eq(0)").text();
            window.location.href = "appointment/" + appID;
        });
    });
}

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

    $('#filterID').click(function() {
        $('#filteredBy').text("Patient Id")
        unShowAllFilterInpt()
        $('#inptPatientID').removeClass("unShow")
    });

    $('#filterAppDate').click(function() {
        $('#filteredBy').text("Appoinment Date")
        unShowAllFilterInpt()
        $('#inptAppDate').removeClass("unShow")

    });

    $('#filterDateCreate').click(function() {
        $('#filteredBy').text("Date Created")
        unShowAllFilterInpt()
    });

    $('#filterAmount').click(function() {
        $('#filteredBy').text("Amount")
        unShowAllFilterInpt()
    });

    $('#filterPaid').click(function() {
        $('#filteredBy').text("Paid")
        unShowAllFilterInpt()
    });

});

function unShowAllFilterInpt() {
    $('.filterInputs').each(function() {
        $(this).addClass("unShow");
    });

}