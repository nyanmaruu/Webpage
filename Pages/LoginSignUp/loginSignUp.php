<head>
    <link rel="stylesheet" href="CSS/signInloginIn.css">
</head>


<div class="row d-flex justify-content-center" id="baseContent">
    <div class="wrapper">
        <div class="form-box register">
            <H2>SIGN UP</H2>
            <form action="./Controller/AccountManagmentInculudes/signUpInc.php" method="post">
                <div class="input-box">
                    <input type="text" name="uid" placeholder="Username">
                </div>
                <div class="input-box">
                    <input type="password" name="pwd" placeholder="Password">
                </div>
                <div class="input-box">
                    <input type="password" name="pwdrepeat" placeholder="Repeat Password">
                </div>
                <div class="input-box">
                    <input type="text" name="email" placeholder="E-mail">
                </div>
                <button class="AccountBtn" type="submit" name="submit">SIGN UP</button>
                <div>
                    <br>
                    <p>Already have an account?<a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
        <div class="form-box login">
            <H2>LOGIN</H2>
            <form action="./Controller/AccountManagmentInculudes/loginInc.php" method="post">
                <div class="input-box">
                    <input type="text" name="uid" placeholder="Username">
                </div>
                <div class="input-box">
                    <input type="password" name="pwd" placeholder="Password">
                </div>
                <br>
                <button class="AccountBtn" type="submit" name="submit">LOGIN</button>
                <div>
                    <br>
                    <p> Dont have an account?<a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./Js/login/login.js"></script>