<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />        
        <link rel="stylesheet" href="css/front_cool.css" media="screen, projection" type="text/css"/>        
        <script type="text/javascript" src="js/jquery-1.11.1.js"></script>        
        <script type="text/javascript" src='js/login.js'></script>
    </head>
    <body style="background: #fff">
        <div id="container">
            <fieldset id="signin_menu">
                <form method="post" id="signin" name="signin" action="ValidateUser.php" onsubmit="return isLoginFormBlank();">
                    <input type="hidden" id ="messageToUser" value="<?php
                    if (isset($_SESSION['messageToUser'])) {
                        echo $_SESSION['messageToUser'];
                        unset($_SESSION['messageToUser']);
                    }
                    ?>" />
                    <h3 style="color:#59B">
                        User Login
                    </h3>
                    <h5>
                        User Authentication is enforced. Please enter credentials to login.
                    </h5>
                    <hr style="height: 0px; color: #59B;background-color:#598; width: 100% " />
                    <label for="username"><span style="color:#59B"><strong>User Id:</strong> &nbsp;<font color="red">*</font></span></label>

                    <input id="username" name="username" value="" title="user id" tabindex="4" type="text" style="color:#59B" onfocus=""/>
                    </p>
                    <p>
                        <label for="password"><strong><span style="color:#59B">Password: &nbsp;<font color="red">*</font></span></strong></label>
                        <input id="password" name="password" value="" title="password" tabindex="5" type="password" style="color:#59B" onfocus=""/>
                    </p>
                    <p class="remember">
                        <input class="signin_submit" value="Sign in" tabindex="6" type="submit"/>
                        <input class="signin_submit" value="Clear" tabindex="7" type="reset"/>
                    </p>
                    <div id="extraContent"></div>
                    <p class="forgot"><a href="#" id="forgotUserIdLink">Forgot your User Id?</a> | <a href="#" id="forgotPasswordLink" >Forgot your password?</a> |
                     <a href="#" id="signupLink">Sign up</a>   
                    <div id="forgotPasswordDiv"></div>
                    <hr style="height: 0px; color: #59B;background-color:#598; width: 100% " />
                    <p style="color:#59B;font-weight: bolder"><font color="red">*</font> Required Field</p>
                    
                    <div id="requestNewAccessDiv"></div>
                </form>
            </fieldset>
        </div>
    </body>
</html>


