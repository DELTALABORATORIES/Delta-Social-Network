<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 7/11/2017
 * Time: 2:40 PM
 */


//Sign In Page Validation
if (!preg_match("/^[a-zA-Z ]*$/",$_POST['logInUSERNAME']) && !preg_match("/^[a-zA-Z ]*$/",$_POST['logInPASSWORD'])) {
    header("Location:../index.html");
}
elseif ($_POST['logInUSERNAME'] == null || $_POST['logInPASSWORD'] == null){
    header("Location:../index.html");
}


//Sign In Page Worked
if ($_POST['logInUSERNAME'] == 'Delta@gmail.com' && $_POST['logInPASSWORD'] == 'Delta'){
    header("Location:../timeline_page.html");
}


//Sign Up Validation
if (!preg_match("/^[a-zA-Z ]*$/",$_POST['logUpName']) || !preg_match("/^[a-zA-Z ]*$/",$_POST['logUpLastName']) || !preg_match("/^[a-zA-Z ]*$/",$_POST['logUpUsername']) || !preg_match("/^[a-zA-Z ]*$/",$_POST['logUpPassword'])) {
    header("Location:../registration_form.html");
}
else{
    //Create Profile
}
