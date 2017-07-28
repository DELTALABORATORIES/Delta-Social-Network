<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 7/13/2017
 * Time: 11:18 PM
 */
require 'MVC/config/db.config.php';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT `E-Mail`, `Password_Hash` FROM `user_data` WHERE `E-Mail` = '" . $_POST['logInEMAIL'] . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$echo = password_verify($_POST['logInPASSWORD'], $row['Password_Hash']);
$password = $_POST['logInPASSWORD'];
$options = [
    'cost' => 12,
];
$passwordHashed = password_hash($password, PASSWORD_BCRYPT, $options);
if (password_verify($_POST['logInPASSWORD'], $row['Password_Hash']) === true) {
    header("Location:../timeline_page.html");
} else {
    echo "Wrong Login Or Password";
}
$conn->close();

