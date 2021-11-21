<?php
// isset($_POST['registration'])
if (isset($_POST['message'])) {
    include 'classes/Message.class.php';
    $message_obj = new Message();
    // $testObj->getUser();

    $Name = $_POST['msgName'];
    $Email  = $_POST['msgContact'];
    $Contact = $_POST['msgEmail'];
    $Body = $_POST['msgMessage'];
    //date Today
    $currentDate = new DateTime();
    $currentDate->setTimezone(new DateTimeZone('Asia/Manila'));
    $Date_Send = $currentDate->format('Y-m-d H:i:s');

    $message_obj->addMessage($Body,$Name,$Contact,$Email,$Date_Send);
    exit();
    // exit($patient_id);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('font_links.php') ?>

    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css">
    <title>Contact Us | Bartolome Dental Clinic | About Us</title>
</head>

<body>
    <?php $page = "contactUs";
    include('header.php') ?>

    <section class="contactUs">
        <div class="contactUs__cont">
            <div class="background">
                <div class="background__gradient"></div>
                <div class="background__txt">
                    <h1>Keep in Touch</h1>
                    <p>Feel free to contact us any time.<br>We will get back to you as soon as we can!</p>
                </div>

            </div>

            <!-- id 
            inputSenderName
            inputSendercontact
            inputSenderEmail
            inputSenderMessage
            -->

            <div class="contact">
                <div class="contact__form">
                    <h1>Send as a message</h1>
                    <div class="contactform-box">
                        <div class="box-1">
                            <div class="contactName-part">
                                <h3>Your Name</h3>
                                <input type="text" id="inputSenderName" name="" placeholder="" id="" onkeyup="" required title=""><br>
                            </div>

                            <div class="contactNo-part">
                                <h3>Phone</h3>
                                <input type="text" id="inputSendercontact" name="" placeholder="" id="" onkeyup="" required title=""><br>
                            </div>
                        </div>
                        <div class="box-2">
                            <div class="contactEmail-part">
                                <h3>Email Address</h3>
                                <input type="email" id="inputSenderEmail"  name="" placeholder="" id="" onkeyup="" required title=""><br>
                            </div>
                        </div>

                    </div>
                    <div class="contactmessage-box">
                        <div class="contactMessage-part">
                            <h3>Message</h3>
                            <h3>Hi I would like to talk about...</h3>
                            <textarea cols="50" rows="5" id="inputSenderMessage" ></textarea>
                        </div>
                    </div>
                    <button id="btnSendMessage">Send</button>
                </div>

                <div class="contact__details">
                    <h1>Contact Details</h1>
                    <div class="detail-box">
                        <div class="detail-info">
                            <a href="https://goo.gl/maps/u1NMVXMtfFro9HHg9" target="_blank">Calle Gipit, Brgy San Pablo 3000 Malolos, Bulacan</a>
                        </div>
                        <div class="detail-info">
                            <p>(+63) 922 396 4642</p>
                        </div>
                        <div class="detail-info">
                            <p>thepinkdmd@gmail.com</p>
                        </div>
                        <div class="detail-info">
                            <p>Monday - Saturday<br>8:30am to 5:30pm</p>
                        </div>
                        <div class="detail-info">
                            
                            <a href="http://www.facebook.com/BartolomeDental" target="_blank">www.facebook.com/BartolomeDental</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('footer.php') ?>
    <script src="sweetalert2/sweetalert2.min.js"></script>

    <script src="javascript/message.js"></script>
</body>

</html>