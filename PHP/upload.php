<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 7/12/2017
 * Time: 10:44 AM
 */
//Uploaded Picture Validator and Handler

if (isset($_FILES['uploadPicture'])) {
    $errors = array();
    $fileName = $_FILES['uploadPicture']['name'];
    $fileSize = $_FILES['uploadPicture']['size'];
    $fileTmp = $_FILES['uploadPicture']['tmp_name'];
    $fileType = $_FILES['uploadPicture']['type'];


    $extensions = ["jpeg", "jpg", "png"];
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);

    if ($fileSize > 20971520) {
        $errors[] = 'File size should not be more than 20 MB';
    }

    if (empty($errors) == true) {
        $pictureDate = time();
        $fileUsableName = 'username' . $pictureDate . '.' . $extension;
        move_uploaded_file($fileTmp, "../Images/@Username/" . $fileUsableName);
        chmod('../Images/@Username/' . $fileUsableName, 0777);
        echo "OK";
        echo '<img src="../Images/@Username/' . $fileUsableName .'"' . 'style="width:100%"' .'/>';
    }
}
