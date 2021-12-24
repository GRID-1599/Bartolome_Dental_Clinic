<?php
include_once "../classes/admin.class.php";
$admin_obj = new Admin();

include_once "../classes/activityLog.class.php";
$actLog_obj = new ActivityLog();

if(isset($_POST["adminRegister"])){
    $admin_obj->registerNewAdmin(
        $_POST["admin_firstname"],
        $_POST["admin_lastname"],
        $_POST["admin_email"],
        $_POST["admin_contact"],
        $_POST["admin_username"],
        $_POST["admin_password"]
    );

    $actLog_obj->addNewLog('Register', 'New Admin Added : ' . $_POST["admin_username"]);

}


if(isset($_POST["adminEdit"])){
    $admin_obj->editAdminNewInfo(
        $_POST["admin_firstname"],
        $_POST["admin_lastname"],
        $_POST["admin_email"],
        $_POST["admin_contact"],
        $_POST["admin_username"]
    );

    $actLog_obj->addNewLog('Edit', 'Admin Details Edited');

}

if(isset($_POST["checkPassword"])){
    $result = $admin_obj->checkPassword(
        $_POST["admin_username"],
        $_POST["admin_password"]
    );

    if($result == 1){
        session_start();
        $_SESSION['userAdmin'] = $_POST["admin_username"];
         echo 1;
    }else{
        echo 2;
    }
}


if(isset($_POST["savePassword"])){
    $admin_obj->savePassword(
        $_POST["admin_username"],
        $_POST["admin_password"]
    );
    $actLog_obj->addNewLog('Edit', 'Password Edit');

}

if(isset($_POST["adminResetPassword"])){
    $admin_obj->savePassword(
        $_POST["adminUsername"],
        $_POST["adminNewPassword"]
    );

}

if(isset($_POST["checkUsername"])){
    $admin_obj->getAdminByUsername(
        $_POST["admin_username"]
    );
}


if(isset($_POST["adminGetEmail"])){
    // echo $_POST["adminEmail"];
   echo json_encode($admin_obj->getAdminByEmail($_POST["adminEmail"]));
}


?>