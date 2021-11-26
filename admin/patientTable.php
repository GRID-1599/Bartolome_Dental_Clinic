<?php
include '../classes/Patient.class.php';
$patient = new Patient();
$patients = $patient->getAllPatients();
// echo json_encode($patients);
?>


<table class="datatablesSimple">
    <thead>
        <tr>
            <th>Patient ID</th>
            <th>Name</th>
            <th>Nickname</th>
            <th>Birthday</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Civil Status</th>
            <th>Address</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Date Created</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Patient ID</th>
            <th>Name</th>
            <th>Nickname</th>
            <th>Birthday</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Civil Status</th>
            <th>Address</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Date Created</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        $data = json_encode($patients);
        foreach ($patients as $entry) {
            $row = "<tr class='patientRow'>" .
                "<td>" . $entry["Patient_ID"] . "</td>" .
                "<td>" . $entry["Name"] . "</td>" .
                "<td>" . $entry["Nickname"] . "</td>" .
                "<td>" . $entry["Birthday"] . "</td>" .
                "<td>" . $entry["Age"] . "</td>" .
                "<td>" . $entry["Gender"] . "</td>" .
                "<td>" . $entry["Civil_Status"] . "</td>" .
                "<td>" . $entry["Address"] . "</td>" .
                "<td>" . $entry["Email"] . "</td>" .
                "<td>" . $entry["Contact"] . "</td>" .
                "<td>" . $entry["Date_Created"] . "</td>" .
                "</tr>";
            echo $row;
        }
        ?>
    </tbody>
</table>