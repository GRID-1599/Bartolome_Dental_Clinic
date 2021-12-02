<?php
include_once "../classes/admin.class.php";
$admin_obj = new Admin();


if(isset($_POST["adminRegister"])){
    $admin_obj->registerNewAdmin(
        $_POST["admin_firstname"],
        $_POST["admin_lastname"],
        $_POST["admin_email"],
        $_POST["admin_contact"],
        $_POST["admin_username"],
        $_POST["admin_password"]
    );
}


if(isset($_POST["adminEdit"])){
    $admin_obj->editAdminNewInfo(
        $_POST["admin_firstname"],
        $_POST["admin_lastname"],
        $_POST["admin_email"],
        $_POST["admin_contact"],
        $_POST["admin_username"]
    );
}

if(isset($_POST["checkPassword"])){
    $admin_obj->checkPassword(
        $_POST["admin_username"],
        $_POST["admin_password"]
    );
}


if(isset($_POST["savePassword"])){
    $admin_obj->savePassword(
        $_POST["admin_username"],
        $_POST["admin_password"]
    );
}

if(isset($_POST["checkUsername"])){
    $admin_obj->getAdminByUsername(
        $_POST["admin_username"]
    );
}

?>