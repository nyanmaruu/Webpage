<?php

session_start();
unset($_SESSION["userid"]);
unset($_SESSION["useruid"]);



header("location: http://localhost/webpage/?oldal=&error=none");
