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
            $row = "<tr class='appointmentRow' data-bs-toggle='tooltip' data-bs-placement='bottom' ".           
                "title='Click to view'>" .
                "<td class='appid'>" . $row["Appointment_Id"] . "</td>" .
                "<td>" . $row["Patient_ID"] . "</td>" .
                "<td>" . $row["Appoinment_Date"] . "</td>" .
                "<td>" . $row["Appoinment_Time"] . "</td>" .
                "<td>" . $row["Date_Created"] . "</td>" .
                "<td>" . $row["Amount"] . "</td>" .
                "<td>" . $row["Payment_Method"] . "</td>" .
                "<td>" . $isPaid. "</td>" .
                "</tr>";
            echo $row;
        }
        ?>
    </tbody>
</table>