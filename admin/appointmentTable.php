<?php
include_once '../classes/appoinment.class.php';
$appointment_obj = new Appointment();
$stmt_appointments = $appointment_obj->getAllAppointment();
// echo json_encode($patients);
?>


<table class="datatablesSimple">
    <thead>
        <tr>
            <th>Appointment ID</th>
            <th>Patient ID</th>
            <th>Appointment Date</th>
            <th>Appointment Time</th>
            <th>Date Created</th>
            <th>Amount</th>
            <th>Payment Method</th>
            <th>IsPaid</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Appointment ID</th>
            <th>Patient ID</th>
            <th>Appointment Date</th>
            <th>Appointment Time</th>
            <th>Date Created</th>
            <th>Amount</th>
            <th>Payment Method</th>
            <th>IsPaid</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        while ($row = $stmt_appointments->fetch()) {
            $isPaid = ($row["IsPaid"] ) ? "Paid" : "Not Paid";
            $appDate = date_create($row["Appoinment_Date"]);
            $appTime = date_create($row["Appoinment_Time"]);
            $dateCreated = date_create($row["Date_Created"]);
            $row = "<tr class='appointmentRow' data-bs-toggle='tooltip' data-bs-placement='bottom' ".           
                "title='Click to view'>" .
                "<td class='appid'>" . $row["Appointment_Id"] . "</td>" .
                "<td>" . $row["Patient_ID"] . "</td>" .
                "<td>" . date_format($appDate, "M d, Y"). "</td>" .
                "<td>" . date_format($appTime, " h:i a") . "</td>" .
                "<td>" . date_format($dateCreated, "M d, Y h:ia") . "</td>" .
                "<td>" . $row["Amount"] . "</td>" .
                "<td>" . $row["Payment_Method"] . "</td>" .
                "<td>" . $isPaid. "</td>" .
                "</tr>";
            echo $row;
        }
        ?>
    </tbody>
</table>