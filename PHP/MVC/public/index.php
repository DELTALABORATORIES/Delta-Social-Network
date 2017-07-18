<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 7/11/2017
 * Time: 2:40 PM
 */
//TODO Make MVC Controller
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

$controller->$action();