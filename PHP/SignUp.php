<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 7/13/2017
 * Time: 11:02 PM
 */
//TODO Add E-Mail check for already registered ones
if (preg_match("/^[ ]*$/", $_POST['logUpName']) || preg_match("/^[ ]*$/", $_POST['logUpLastName']) || preg_match("/^[ ]*$/", $_POST['logUpEmail']) || preg_match("/^[ ]*$/", $_POST['logUpPassword'])) {
    header("Location:../../../registration_form.html");
}
else {

    require 'MVC/config/db.config.php';



    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $dbPass = $_POST['logUpPassword'];
    $options = [
        'cost' => 12,
    ];
    $passwordHash = password_hash($dbPass, PASSWORD_BCRYPT, $options);
    $accountData = $_POST['logUpName'] . ' | ' . $_POST['logUpLastName'] . ' | ' . $_POST['logUpEmail'] . ' | ' . $passwordHash . "
";
    echo $accountData;
    $sql = "INSERT INTO `user_data`(`Name`, `LastName`, `E-Mail`, `BirthDay`, `Password_Hash`)
 VALUES ('".$_POST['logUpName']."','".$_POST['logUpLastName']."','".$_POST['logUpEmail']."','2000-06-10','".$passwordHash."')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
