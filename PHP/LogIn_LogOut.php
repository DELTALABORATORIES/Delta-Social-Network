<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 7/17/2017
 * Time: 12:33 PM
 */
class LogIn
{
    //TODO: Make paths as new methods for objects
    //TODO:Add E-Mail check for already registered ones
    public function signIn()
    {
        if (preg_match("/^[ ]*$/",$_POST['logInEMAIL']) || preg_match("/^[ ]*$/",$_POST['logInPASSWORD'])) {
            echo 'Something Went Wrong';
        }

        elseif ($_POST['logInEMAIL'] == null && $_POST['logInPASSWORD'] == null){
            echo 'Something Went aWFULL';
        }
        else{
            $EMail = $_POST['logInEMAIL'];
            echo $_POST['logInEMAIL'];
            $accountDatabase = '../Database/userInfo.txt';
            $accountData = fopen($accountDatabase, 'r');

            while (!feof($accountData)) {
                $account = fgets($accountData);
                echo strpos($account, $EMail);

                if (strpos($account, $EMail) == false) {
                    echo 'Wrong E-Mail Or Password';
                } else {
                    $password = $_POST['logInPASSWORD'];
                    $options = [
                        'cost' => 12,
                    ];
                    $passwordHashed = password_hash($password, PASSWORD_BCRYPT, $options);
                    $passwordStored = substr($account, -62, 60);
                    echo '</br>'.$passwordStored;
                    var_dump($passwordStored);
                    var_dump(password_verify($passwordHashed, $passwordStored));

                    if (password_verify($password, $passwordStored) == true) {
                        header("Location:../timeline_page.html");
                    } else {
                        echo 'Wrong Email or Password';
                    }
                }
            }
            fclose($accountData);
        }

    }
}
class LogUp
{
    public function SignUp(){
        if (preg_match("/^[ ]*$/", $_POST['logUpName']) || preg_match("/^[ ]*$/", $_POST['logUpLastName']) || preg_match("/^[ ]*$/", $_POST['logUpEmail']) || preg_match("/^[ ]*$/", $_POST['logUpPassword'])) {
            header("Location:../registration_form.html");
        }
        else {
            $accountDatabaseLoc = '../Database/userInfo.txt';
            $accountDatabase = fopen($accountDatabaseLoc, 'a');
            $password = $_POST['logUpPassword'];
            $options = [
                'cost' => 12,
            ];
            $passwordHash = password_hash($password, PASSWORD_BCRYPT, $options);
            $accountData = $_POST['logUpName'] . ' | ' . $_POST['logUpLastName'] . ' | ' . $_POST['logUpEmail'] . ' | ' . $passwordHash . "
";
            echo $accountData;
            fwrite($accountDatabase, $accountData);
            fclose($accountDatabase);

        }

    }
}