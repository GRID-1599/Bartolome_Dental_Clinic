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

if (isset($_POST["getAllPatients"])) {
    $paient_obj = new Patient();
    echo json_encode($paient_obj->getPatientById($_POST['patientID']));
}

if (isset($_POST["getPatientByID"])) {
    $paient_obj = new Patient();
    echo json_encode($paient_obj->getPatientById($_POST['patientID']));
}

if(isset($_POST["editPatient"])){
    $patient_obj->editPatientDetails(
        $_POST['patientID'],
        $_POST['ptName'],
        $_POST['ptNickname'],
        $_POST['ptBday'],
        $_POST['ptAge'],
        $_POST['ptGender'],
        $_POST['ptStatus'],
        $_POST['ptAddress'],
        $_POST['ptEmail'],
        $_POST['ptContact']
    );
}

?>