<?php

require '../config/db.config.php';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Name`,`ID` FROM `user_data` WHERE `Name` = '" . $_POST['UserSearch'] . "' ";
$result = $conn->query($sql);
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FriendList</title>
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Passion+One" rel="stylesheet">
</head>
<style>
    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        overflow:hidden;
    }
    .Main {
        text-align:center;
        width: 100%;
        min-height: 100%;
        overflow: hidden;
        background: url(../../../Images/Login_Page/background-image-2.jpeg) no-repeat center bottom;
        background-size: cover;
    }
    .ResultContainer{
        width: 100%;
        height:80px;
        background-color:rgba(0,0,0,0.4);
        color:white;
        margin-top:20px;
    }
    .UserPicture{
        width:4%;
        min-width:4%;
        float:left;
        margin-left:70px;
        margin-top:6px;
    }
    .SearchedUserName{
        float:left;
        margin-left:40px;
        margin-top:30px;
        color:white;
        font-size:20px;
        font-family: Arial, Helvetica, sans-serif;
    }
    .SendRequest{
        border-style:none;
        background-color: rgba(10,10,10,0.4);
        width:160px;
        height:40px;
        margin-top:20px;
        float: right;
        margin-right: 40px;
        color:white;
        font-size:15px;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>
<body>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="ResultContainer">
                    <img src="../../../Images/logo.jpg" class="UserPicture">
                     <p class="SearchedUserName">' . $row['Name'] .
            '</p>
                 <form method="POST" action="SendFriendRequest.php">
                     <button name="RequestReciever" class="SendRequest" type="submit" value = "' . $row['ID'] .'"> Send Friend Request</button>
                 </form>
              </div>';
    }
}
echo '</div>
</body>
</html>';
$conn->close();