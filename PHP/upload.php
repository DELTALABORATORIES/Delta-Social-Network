<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 7/12/2017
 * Time: 10:44 AM
 */
   //Uploaded Picture Validator and Handler

   if(isset($_FILES['uploadPicture'])){
       $errors= array();
       $fileName = $_FILES['uploadPicture']['name'];
       $fileSize = $_FILES['uploadPicture']['size'];
       $fileTmp = $_FILES['uploadPicture']['tmp_name'];
       $fileType = $_FILES['uploadPicture']['type'];
       $fileExit=strtolower(end(explode('.',$_FILES['uploadPicture']['name'])));

       $extensions= ["jpeg","jpg","png"];

       if(in_array($fileExit,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
       }

       if($fileSize > 20971520) {
           $errors[]='File size should not be more than 20 MB';
       }

       if(empty($errors)==true) {
           $pictureDate = time();
           move_uploaded_file($fileTmp,"../Images/@Username/".'username'.$pictureDate);
           echo "OK";
       }
   }
