<?php
function loginToText()
{
    $output = "";

    $output .=
        '
    <div class="wrapper">
    <div class="index-login-signup">
        <H4>SIGN UP</H4>
        <P>Don"t have an account yet? Sign up here!</P>
        <form action="./Controller/AccountManagmentInculudes/signUpInc.php" method="post">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwdrepeat" placeholder="Repeat Password">
            <input type="text" name="email" placeholder="E-mail">
            <br>
            <button value= type="submit" name="submit">SIGN UP</button>
        </form>
    </div>
    <div class="index-login-login">
        <H4>LOGIN</H4>
        <p>Don"t have an account yet? Sign up here!</p>
        <form action="./Controller/AccountManagmentInculudes/loginInc.php" method="post">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <br>
            <button type="submit" name="submit">LOGIN</button>
        </form>
    </div>
</div>
   ';


    return $output;
}


if (isset($_POST["action"]) && $_POST["action"] == "loginSignUp") {
    echo loginToText();
}
