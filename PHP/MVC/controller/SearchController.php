<?php



?>
<!DOCTYPE html>
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
    .SearchResultContainer{
        width:100%;
        height: 80px;
        background-color: rgba(42, 34, 34, 0.51);
        margin-top: 20px;
    }
    .SearchProfilePicture{
        position: relative;
        top:10%;
        left: 3.5%;
        width: 10%;
        max-height: 65px;
    }
    .SearchNameContainer{
        position: relative;
        top: -85%;
        left:15.5%;
    }
    .Name{
        font-size: 22px;
        font-family:'Pacifico', cursive ;
        color: white;
    }
</style>
<body>
    <div class="Main">
        <div class="SearchResultContainer">
            <div>
                <img class="SearchProfilePicture" src="../../../Images/@Username/username1500303608.jpg">
            </div>
            <div class="SearchNameContainer">
                <p >
                <?php echo $_POST['FriendSearch']; ?>
                </p>
            </div>
            <div style="position: relative;top: -158%;left: 90%;">
                <form>
                    <button type="submit" style="height:30px;background-color: rgba(42, 34, 34, 0.51); border: none; color: white; ">Send Friend Request</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>