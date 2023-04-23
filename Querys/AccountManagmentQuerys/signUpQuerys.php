<?php

class Signup extends Dbh
{


    protected function setUser($uid, $pwd, $email)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_name, users_password, users_email) VALUES (?,?,?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $hashedPwd, $email))) {

            $stmt = null;
            header("location: http://localhost/webpage/?oldal=login&error=stmtFailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($uid, $email)
    {
        $stmt = $this->connect()->prepare('SELECT users_name FROM users WHERE users_name = ? or users_email = ?; ');

        if (!$stmt->execute(array($uid, $email))) {

            $stmt = null;
            header("location: http://localhost/webpage/?oldal=login&error=stmtFailed");
            exit();
        }

        $resultCheck = false;

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}