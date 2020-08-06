<?php
session_start();
    if(!isset($_SESSION['user']))
    {
        ?>

        <!DOCTYPE html>
        <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Sign Up</title>
                <!-- UIkit CSS -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/css/uikit.min.css" />
                <!-- UIkit JS -->
                <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit-icons.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            </head>

            <body>
            <?php include_once("include/navbar.php"); ?>
            <?php include_once("include/side-menu.php"); ?>
            <div class="uk-flex uk-flex-center uk-flex-middle" style="height: 75vh;">
                <form action = "signup-process.php" method = POST onsubmit = "return SignUp_Validate()">
                    <h1 class="uk-text-center">SIGNUP</h1>
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                            <input onfocus = "BackToNormal('fullName')" id = "fullName" name = "fullName" class="uk-input" type="text" placeholder="Full name" style="border-radius: 50px">
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: mail"></span>
                            <input onfocus = "BackToNormal('email')" id = "email" name = "email" class="uk-input" type="email" placeholder="Email" style="border-radius: 50px">
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                            <input onfocus = "BackToNormal('userName')" id = "userName" name = "userName" class="uk-input" type="text" placeholder="Username" style="border-radius: 50px">
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                            <input onfocus = "BackToNormal('passwd')" id = "passwd" name = "passwd" class="uk-input" type="password" placeholder="Password" style="border-radius: 50px">
                        </div>
                    </div>

                    <div class="uk-margin-top uk-margin-bottom">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                            <input onfocus = "BackToNormal('confirmPasswd')" id = "confirmPasswd" name = "confirmPasswd" class="uk-input" type="password" placeholder="Confirm Password" style="border-radius: 50px">
                        </div>
                    </div>
                
                    <div>
                        <?php 
                        if(isset($_SESSION['errorMessage']))
                        {
                            $message = $_SESSION['errorMessage'];
                            ?>
                            <p class="uk-text-danger" style = "text-align: center;"><?php echo $message; ?></p>
                            <?php
                        }
                        unset($_SESSION["errorMessage"]);
                        ?>            
                    </div>

                    <div class="uk-flex uk-flex-right">
                        <input name = "submit" type="submit" class="uk-button uk-width-1-1 uk-button-primary" style="border-radius: 50px" value="SIGNUP">
                    </div>
                    <p class="uk-text-center uk-text-small">Have an account? <a href="SignIn" class="uk-button-text"> Login </a></p>

                </form>
                
            </div>
            </div>

            <script>
                function SignUp_Validate(){
                    var $valid = true;
                    var userName = document.getElementById("userName").value.trim();
                    var password = document.getElementById("passwd").value.trim();
                    var fullName = document.getElementById("fullName").value.trim();
                    var email = document.getElementById("email").value.trim();
                    var confirmPasswd = document.getElementById("confirmPasswd").value.trim();

                    if(userName == ""){
                        document.getElementById('userName').className += ' uk-form-danger';
                        $valid = false;
                    }

                    if(password == ""){
                        document.getElementById('passwd').className += ' uk-form-danger';
                        $valid = false;
                    }

                    if(fullName == ""){
                        document.getElementById('fullName').className += ' uk-form-danger';
                        $valid = false;
                    }
                    
                    if(email == ""){
                        document.getElementById('email').className += ' uk-form-danger';
                        $valid = false;
                    }

                    if(confirmPasswd == ""){
                        document.getElementById('confirmPasswd').className += ' uk-form-danger';
                        $valid = false;
                    }

                    return $valid;
                    }

                    function BackToNormal(para){
                    document.getElementById(para).classList.remove("uk-form-danger");
                }
            </script>

            </body>
</html>

<?php

}
else
{
    header("location: Profile");
}
?>