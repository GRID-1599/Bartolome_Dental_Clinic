<?php 
include '../classes/admin.class.php';
    $admin = new Admin();
     $admins = $admin->getAllAdmin();
    // echo json_encode($admins);

?>


<table class="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Username</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        // $data = json_encode($admins);
                                        foreach ($admins as $entry) {
                                            $row = "<tr>".
                                            "<td>" . $entry["Username"]."</td>" .
                                             "<td>" .$entry["First_Name"]."</td>".
                                             "<td>" .$entry["Last_Name"]."</td>".
                                            "<td>" . $entry["Contact"]."</td>".
                                            "<td>" . $entry["Email"]."</td>".
                                             "</tr>";
                                            echo $row  ;
                                        }
                                    ?>
                                <t/body>
                            </table>