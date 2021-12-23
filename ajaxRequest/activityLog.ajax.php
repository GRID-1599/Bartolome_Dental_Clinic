<?php
include_once "../classes/activityLog.class.php";
$actLog_obj = new ActivityLog();


if (isset($_POST["cleanLog"])) {
    $actLog_obj->cleanLog();
    $actLog_obj->addNewLog('Clean', 'Log cleaned');
}
