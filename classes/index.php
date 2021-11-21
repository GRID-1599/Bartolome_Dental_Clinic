<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // include 'test.class.php';
    include '../includes/classesFolder_autoIncludes.inc.php';
    // include '../includes/autoIncludes.inc.php';
    $testObj = new Patient();
    $testObj->getUser();
    $Name = "Andrea Nicole Catudio";
    $Nickname = "Nicole";
    $Birthdate = new DateTime('1999-10-15');
    $Birthday = $Birthdate->format('Y-m-d');
    $Age = 13;
    $Gender = "Female";
    $Civil_Status = "Single";
    $Address = "624 Kaypalong St. San Vicente Sta Maria Bulacan";
    $Email = "catudiochristianjude@gmail.com";
    $Contact = "09169702065";
    $currentDate = new DateTime();
    $Date_Created = $currentDate->format('Y-m-d');

    $testObj->addNewPatient($Name, $Nickname, $Birthday, $Age, $Gender, $Civil_Status, $Address, $Email, $Contact, $Date_Created);

    ?>
</body>

</html>