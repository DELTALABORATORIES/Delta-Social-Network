<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 7/11/2017
 * Time: 2:40 PM
 */
spl_autoload_register(function ($className) {

    $classPath = str_replace('\\', '/', $className);

    $classPath = '../' . $classPath . '.php';

    require $classPath;
});
$pageName = $_POST['pageName'];
$action = $_POST['controller'];

$pageName = strtolower($pageName);
$pageName = ucfirst($pageName);
$pageName .= 'Controller';
$pageName = 'Controller\\' . $pageName;

$action = strtolower($action);
$action = ucfirst($action);

$controller = new $pageName();

$servername = "localhost";
$username = "root";
$password = "DELTA";
$dbname = "network_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$controller->$action();