<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login Form</title>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script> 
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="title">Login Form</div>
            <form method="post">
                <div class="field">
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="field">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="g-recaptcha" data-sitekey="6LcMx3YsAAAAAHfJsiClTU_uCYwWP1p4iroEk7Gi"></div> 
                <div class="pass-link"><a href="#">Forgot password?</a></div>
                    <div class="field">
                        <input type="submit" name="login" value="Login">
                    </div>
                    <div class="signup-link">Not a member? <a href="register.php">Signup now?</a></div>
            </form>
        </div>
    </body>
</html>