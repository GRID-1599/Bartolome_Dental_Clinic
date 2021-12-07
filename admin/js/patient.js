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

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()