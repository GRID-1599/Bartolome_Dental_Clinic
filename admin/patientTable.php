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
            <th>Date Created</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        $data = json_encode($patients);
        foreach ($patients as $entry) {
            $bday = date_create($entry["Birthday"]);

            $row = "<tr class='patientRow'>" .
                "<td>" . $entry["Patient_ID"] . "</td>" .
                "<td>" . $entry["Name"] . "</td>" .
                "<td>" . $entry["Nickname"] . "</td>" .
                "<td>" . date_format($bday, "M d, Y") . "</td>" .
                "<td>" . $entry["Age"] . "</td>" .
                "<td>" . $entry["Gender"] . "</td>" .
                "<td>" . $entry["Date_Created"] . "</td>" .
                "</tr>";
            echo $row;
        }
        ?>
    </tbody>
</table>