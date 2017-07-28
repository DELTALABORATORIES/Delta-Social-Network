<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 7/26/2017
 * Time: 2:19 PM
 */
namespace Controller;

class SendFriendRequest
{
    public function  sendFriendRequest()
    {
        $dbHost = "localhost";
        $dbUser = "root";
        $dbName = "network_database";
        $dbPass = "DELTA";

        $conn = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = 'INSERT INTO `notifications`(`UserID`, `Notification_Content`, `Notification_Status`) 
                VALUES ("'.$_POST['RequestReciever'].'" , " A Person Sent You A Friend Request" , "0")';

        $conn->query($sql);

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        }
    }
}

$SendRequest = new SendFriendRequest();
$SendRequest->sendFriendRequest();