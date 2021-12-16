
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Bartolome Dental Clinic</title>

    <?php include_once('font_links.php') ?>
    <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css">
    <link href="styles/bootstap_css/styles.css" rel="stylesheet" />
    <link href="styles/style.css" rel="stylesheet" />
</head>

<body>
    <?php $page = "contactUs";
    include('header.php') ?>
    <div class="container-fluid contactBanner">
        <div class="container-xxl ">
            <div class="row align-items-center  ">
                <div class="col mt-5">
                    <h1 class="m-0 banner-text pt-2 text-white">Keep in Touch</h1>
                    <p class="display-6 text-white">Feel free to contact us any time.<br> We will get back to you as soon as we can</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl mt-5 px-5">

        <div class="row justify-content-center">
            <div class="col-md-5 mb-4 order-md-3  ">
                <p class="display-6"><small>Contact Details</small></p>
                <div class="row mt-3 g-3  h6">
                    <dt class="col-1 ">
                        <i class="fa fa-map-marker fa-lg icon-pink mt-2" aria-hidden="true"></i>
                    </dt>
                    <dd class="col-11">
                        <a href="https://goo.gl/maps/u1NMVXMtfFro9HHg9" target="_blank" class="text-black link-text-undecorated ">Calle Gipit, Brgy San Pablo 3000 Malolos, Bulacan</a>
                    </dd>
                    <dt class="col-1">
                        <i class="fa fa-phone fa-lg icon-pink" aria-hidden="true"></i>
                    </dt>
                    <dd class="col-11">
                        <span class="mt-3 ">(+63) 922 396 4642</span>
                    </dd>
                    <dt class="col-1">
                        <i class="fa fa-envelope fa-lg icon-pink" aria-hidden="true"></i>
                    </dt>
                    <dd class="col-11">
                        <span>thepinkdmd@gmail.com</span>
                    </dd>
                    <dt class="col-1">
                        <i class="fa fa-clock-o fa-lg icon-pink mt-2" aria-hidden="true"></i>
                    </dt>
                    <dd class="col-11">
                        <span>Monday - Saturday<br>9:00am to 6:00pm</span>
                    </dd>
                    <dt class="col-1">
                        <i class="fa fa-facebook-official fa-lg icon-pink" aria-hidden="true"></i>
                    </dt>
                    <dd class="col-11">
                        <a href="http://www.facebook.com/BartolomeDental" target="_blank" class="text-truncate text-black link-text-undecorated "> Bartolome Dental Clinic</a>
                    </dd>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="inputSenderName" placeholder="Full name" >
                    <label for="inputSenderName">Full name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="inputSenderEmail" placeholder="name@example.com" >
                    <label for="inputSenderEmail">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="inputSendercontact" placeholder="phone number" >
                    <label for="inputSendercontact">Phone</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="inputSenderMessage" style="height: 12rem"></textarea>
                    <label for="inputSenderMessage">Enter your message</label>
                </div>
                <button class="btn btn-primary mt-3 float-start" id="btnSendMessage">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                    Send
                </button>
            </div>




        </div>

    </div>

    <?php include 'footer.php'; ?>
    <script src="sweetalert2/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <script src="javascript/message.js"></script>
</body>

</html>