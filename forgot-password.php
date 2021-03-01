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
                <title>Reset Password</title>
                <link rel = "icon" href = "img/favicon.ico" type = "image/x-icon">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/css/uikit.min.css" />
                <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit-icons.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            </head>

        <body>
            <?php include_once("include/navbar.php"); ?>
            <?php include_once("include/side-menu.php"); ?>

            <hr class="uk-divider-icon">
            <h1 class="uk-text-center uk-text-uppercase uk-margin-remove-top">
                Forgot password
            </h1>
            <p class="uk-text-center">Forgot your password ? don't worry we got you covered</p>
            <hr class="uk-divider-icon">
            <br>
            <div class="uk-flex uk-flex-center uk-flex-middle uk-margin-top">
                <form onsubmit = "return process()" action = "signin-process.php" method = "POST">
                    <h1 class="uk-text-center">Enter Email</h1>
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: mail"></span>
                            <input onfocus = "BackToNormal('email')" id = "email" name = "email" class="uk-input" type="email" placeholder="Email" style="border-radius: 50px">
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

                    <!-- ===== loading gif for ajax ===== -->
                    <div class="uk-container" style="display: none" id="wait">
                        <img class="uk-align-center" src="img/ajax.gif" alt="">
                    </div>

                    <!-- ===== result div for ajax ===== -->
                    <div id="result"></div>

                    <div id="message"></div>

                    <div class="uk-flex uk-flex-right uk-margin-top">
                        <input type = "submit" name = "submit" class="uk-button uk-width-1-1 uk-button-primary" style="border-radius: 50px" value = "Next">
                    </div>
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
    function process(){
        var email = document.getElementById("email").value.trim();
        if(email == ""){
            document.getElementById('email').className += ' uk-form-danger';
        }
        else{
            $("#result").load("forgot-password-process.php", {email: email}, function(){
                    $("#message").load("forgot-password-message.php",{test: "hello"});
            });
        }
        return false;
    }

    function BackToNormal(para){
        document.getElementById(para).classList.remove("uk-form-danger");
    }

    $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
    });

    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });
</script>


</body>
</html>