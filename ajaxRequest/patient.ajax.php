<?php
include_once "../classes/patient.class.php";
$patient_obj = new Patient();

if(isset($_POST["deleteNote"])){
    $patient_obj->deleteNote($_POST["note_id"]);
}

if(isset($_POST["editNote"])){
    // $note_id, $note_message
    $patient_obj->editNote($_POST["note_id"],$_POST["message_body"]);
}

if(isset($_POST["addNote"])){
    // $patient_id, $note_message
    $patient_obj->addNote($_POST["patient_id"],$_POST["message_body"]);
}


?>