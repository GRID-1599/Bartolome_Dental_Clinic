<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Patient Id | Bartolome Dental Clinic</title>

    <?php include_once('font_links.php') ?>
    <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css">
    <link href="styles/bootstap_css/styles.css" rel="stylesheet" />
    <link href="styles/style.css" rel="stylesheet" />
</head>

<body>
    <?php include('header.php') ?>

    <div class="container mt-5">
        <div class="row justify-content-center gx-2">
            <div class="content col-lg-7 bg-white border ">
                <div class="text-2 display-6 pb-4">Forgot Patient Id</div>
                <div class="row gy-4" novalidate>
                    <div class="col-md-10">
                        <label for="validationCustom01" class="form-label">Patient name</label>
                        <input type="text" class="form-control" id="ptName" name="ptName" required>

                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom04" class="form-label">Gender</label>
                        <select class="form-select" id="ptGender" name="ptGender" required>
                            <option selected disabled value=""></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Bigender">Bigender</option>
                            <option value="Transgender">Transgender</option>
                            <option value="Prefer not to say">Prefer not to say</option>
                        </select>

                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Birthday</label>
                        <input type="date" class="form-control" id="ptBirthday" name="ptBirthday" required>

                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary mt-3" id="btnSubmit">Submit</button>
                    </div>
                </div>
            </div>

            <div class="content col-lg-5 bg-white unShow" id="result">
                <div class="text-2 display-6 pb-4"></div>
                <p class="text-muted" style="font-size: 1.5rem;">Result: </p>
                <div class="unShow" id="notFound">
                    <p style="color: red;">No Patient Found</p>
                    <p>Please check your inputed details</p>
                </div>
                <div class="unShow" id="found">
                    <dl class="row">
                        <p style="font-size: 1.25rem;">Hi! <strong id="ptNameOutput"></strong> please check your email ( <em id="ptemailOutput"> qeqeqe qwe qweq</em> ) we send a copy of your patient ID. Thank you </p>
                
                    </dl>
                </div>
                <p></p>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="sweetalert2/sweetalert2.min.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <script src="javascript/forgotPatientId.js"></script>


</body>

</html>