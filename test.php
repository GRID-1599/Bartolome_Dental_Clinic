<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <p><strong style='color:#bf2441; padding:2px; '>Hi! Christian Jude Catudio </strong><br>
                This is a confirmation that you registered as a new patient of Bartolome Dental Clinic. Here's your patient number/ID <b style='color:#bf2441;'> 1001 </b>.<br>
                Please make sure to remember your patient ID for your setting of your futures appointment. Thank you!<br><br>
                Bartolome Dental Clinic<br>
                0975-123-8396
        </div>
    </div>
</body>

</html>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

<script>
    window.location.href = "index";

    newPatientName = 'Christian jude Catudio';

    newPatientID = '1001';

    message = "<p><strong>Hi!  " + newPatientName + "</strong><br>" +
        "This is a confirmation that you registered as a new patient  of Bartolome Dental Clinic. Here's your patient number/ID <b style='color:#bf2441;'> " + newPatientID + "</b>.<br>" +
        "Please make sure to remember your patient ID for your setting of your futures appointment. Thank you!<br><br>" +
        "Bartolome Dental Clinic<br>" +
        "0975-123-8396";

    newPatientemail = 'catudiochristianjude@gmail.com';

    // sendEmail(newPatientemail, message);


    function sendEmail(email, message) {
        Email.send({
            Host: "smtp.gmail.com",
            Username: "bartolome.dentalclinic@gmail.com",
            Password: "qnbrlagqmkzchcuf",
            To: email,
            From: "bartolome.dentalclinic@gmail.com",
            Subject: 'New Patient | Bartolome Dental Clinic',
            Body: message,
        });
    }
</script>