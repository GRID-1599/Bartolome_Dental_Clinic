<!-- this only for trying -->
<?php
$appointmentServices = ["S163", "Acrylic Cosmo - Partial", "5,000", "S153", "Laminates / Veneers (Ceramage)", "7,000", "S155", "Consultation", "300", "S159", "Acrylic Leeformatron - Partial", "4,000", "S167", "Acrylic New Ace PX - Partial", "8,000"];
echo count($appointmentServices) . "<br>";
for ($x = 0; $x < count($appointmentServices); $x += 3) {
    // $stmt2->execute([$appointmentServices[$x],$appointmentServices[$x+1],$appointmentServices[$x+2]]);
    $id = $appointmentServices[$x];
    $name = $appointmentServices[$x + 1];
    $price = $appointmentServices[$x + 2];

    echo <<<tt
                 $id >>  $name >>  $price <br>
            tt;
}
