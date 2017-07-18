<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 7/18/2017
 * Time: 6:02 PM
 */
namespace Controller;

class SigninController
{   //TODO Make paths as new methods for objects
    //TODO Make new static paths
    const accountDatabaseLocation = '../../../Database/userInfo.txt';
    public function Validation()
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
            $accountDatabase = self::accountDatabaseLocation ;
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
                        header("Location:../../../timeline_page.html");
                    } else {
                        echo 'Wrong Email or Password';
                    }
                }
            }
            fclose($accountData);
        }
    }
}