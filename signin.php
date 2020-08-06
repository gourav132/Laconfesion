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
                <title>Sign In</title>
                <link rel = "icon" href = "img/black dot.jpg" type = "image/x-icon">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/css/uikit.min.css" />
                <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit-icons.min.js"></script>
            </head>

        <body>
            <?php include_once("include/navbar.php"); ?>
            <?php include_once("include/side-menu.php"); ?>

            <div class="uk-flex uk-flex-center uk-flex-middle" style="height: 75vh;">

                <form onsubmit = "return SignIn_Validate()" action = "signin-process.php" method = "POST">
                    <h1 class="uk-text-center">LOGIN</h1>
                    <div>
                        <?php 
                        if(isset($_SESSION['successMessage']))
                        {
                            $message = $_SESSION['successMessage'];
                            ?>
                            <p class="uk-text-success" style = "text-align: center;"><?php echo $message; ?></p>
                            <?php
                        }
                        unset($_SESSION["successMessage"]);
                        ?>            
                    </div>
                    
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                            <input onfocus = "BackToNormal('user_name')" id = "user_name" name = "userName" class="uk-input" type="text" placeholder="Username" style="border-radius: 50px">
                        </div>
                    </div>
                
                    <div class="uk-margin-top uk-margin-bottom">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                            <input onfocus = "BackToNormal('password')" id = "password" name = "passwd" class="uk-input" type="password" placeholder="Password" style="border-radius: 50px">
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
                        <input type = "submit" name = "submit" class="uk-button uk-width-1-1 uk-button-primary" style="border-radius: 50px" value = "LOGIN">
                    </div>
                    <p class="uk-text-center uk-text-small">Don't have an account? <a href="SignUp" class="uk-button-text"> Sign up </a></p>

                </form>
                
            </div>




        <?php
    }
    else
    {
        header("location: Profile");
    }
?>

<script>
                function SignIn_Validate(){
                    var $valid = true;
                    var userName = document.getElementById("user_name").value.trim();
                    var password = document.getElementById("password").value.trim();
                    if(userName == "" & password == ""){
                        document.getElementById('user_name').className += ' uk-form-danger';
                        document.getElementById('password').className += ' uk-form-danger';
                        $valid = false;
                    }

                    else if(userName == ""){
                        document.getElementById('user_name').className += ' uk-form-danger';
                        $valid = false;
                    }

                    else if(password == ""){
                         document.getElementById('password').className += ' uk-form-danger';
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