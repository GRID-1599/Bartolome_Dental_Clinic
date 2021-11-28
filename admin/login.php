<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../resources/icons/logov2.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('font_links.php') ?>

    <link rel="stylesheet" href="./styles/style.css">
    <style>
        * {
            font-size: 100%;
            box-sizing: border-box;
            margin: 0 auto;
        }
    </style>
    <title>Admin Login | Bartolome Dental Clinic</title>
</head>

<body>
    <section class="adminLogin">
        <div class="background">
            <img src="resources/images/admin_login.png" alt="">
            <div class="form-box">
                <div class="form-input">
                    <h2>Admin Login</h2>
                    <h4>Username</h4>
                    <input id="adminUserName" type="text">
                    <h4>Password</h4>
                    <input id="adminPassword" type="password">
                    <a href="">Forgot Password?</a>
                    <button id="btnAdminLogin">Login</button>
                </div>
            </div>
        </div>
    </section>

</body>

<script src="js/adminLogin.js"></script>

</html>