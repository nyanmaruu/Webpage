<?php

session_start();
unset($_SESSION["userid"]);
unset($_SESSION["useruid"]);
unset($_SESSION["type_id"]);
unset($_SESSION["address_id"]);




header("location: http://localhost/webpage/?oldal=&error=none");
