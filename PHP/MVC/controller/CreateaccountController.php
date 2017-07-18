<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 7/18/2017
 * Time: 6:03 PM
 */
namespace Controller;

class CreateaccountController
{
    const accountDatabaseLocation = '../../../Database/userInfo.txt';
    public function Signup()
    {
        //TODO Add E-Mail check for already registered ones
        if (preg_match("/^[ ]*$/", $_POST['logUpName']) || preg_match("/^[ ]*$/", $_POST['logUpLastName']) || preg_match("/^[ ]*$/", $_POST['logUpEmail']) || preg_match("/^[ ]*$/", $_POST['logUpPassword'])) {
            header("Location:../../../registration_form.html");
        }
        else {

            $accountDatabase = self::accountDatabaseLocation;
            $accountDatabase = fopen($accountDatabase, 'a');
            $password = $_POST['logUpPassword'];
            $options = [
                'cost' => 12,
            ];
            $passwordHash = password_hash($password, PASSWORD_BCRYPT, $options);
            $accountData = $_POST['logUpName'] . ' | ' . $_POST['logUpLastName'] . ' | ' . $_POST['logUpEmail'] . ' | ' . $passwordHash . "
";
            header("Location:../../../index.html");
            echo $accountData;
            fwrite($accountDatabase, $accountData);
            fclose($accountDatabase);
        }
    }
}