<?php

class Login extends Dbh
{


    protected function getUser($uid, $pwd)
    {
        $stmt = $this->connect()->prepare('SELECT user_password FROM users WHERE user_name = ? OR user_email = ?;');


        if (!$stmt->execute(array($uid, $pwd))) {

            $stmt = null;
            header("location: http://localhost/webpage/?oldal=login&error=stmtFailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: http://localhost/webpage/?oldal=login&error=userNotFound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["user_password"]);


        if ($checkPwd == false) {

            $stmt = null;
            header("location: http://localhost/webpage/?oldal=login&error=userNameOrPasswordWrong");
            exit();
        } else if ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE user_name = ? OR user_email = ? AND user_password = ?;');


            if (!$stmt->execute(array($uid, $uid, $pwd))) {

                $stmt = null;
                header("location: http://localhost/webpage/?oldal=login&error=stmtFailed");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: http://localhost/webpage/?oldal=login&error=userNotFound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();

            $_SESSION["userid"] = $user[0]["id"];
            $_SESSION["useruid"] = $user[0]["user_name"];
        }

        $stmt = null;
    }
}
