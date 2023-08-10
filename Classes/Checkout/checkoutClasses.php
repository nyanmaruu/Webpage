
<?php

include "../../Querys/AccountManagmentQuerys/loginQuerys.php";

class LoginContr extends Login
{

    private $uid;
    private $pwd;



    public function __construct($uid, $pwd)
    {

        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser()
    {
        if ($this->emptyInput() == false) {

            header("location: http://localhost/webpage/?oldal=login&error=emptyinput");
            exit();
        }



        $this->getUser($this->uid, $this->pwd);
    }



    private function emptyInput()
    {
        $result = false;
        if (empty($this->uid || $this->pwd)) {

            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}


// isten fasza
