
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us</title>
        <link rel = "icon" href = "img/favicon.ico" type = "image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/css/uikit.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit-icons.min.js"></script>
    </head>

    <body>
        <?php include_once("include/navbar.php"); ?>
        <?php include_once("include/side-menu.php"); ?>
        <hr class="uk-divider-icon">
        <h1 class="uk-text-center uk-text-uppercase">
        Contact Us
        </h1>
        <p class = "uk-text-muted uk-text-center">Need help with something ?</p>
        <hr class="uk-divider-icon">

        <div class = "uk-container uk-container-small">

            <form onsubmit = "return validate()" action = "send_complaint.php" method = "POST">
                <fieldset class="uk-fieldset">

                    <div class="uk-margin">
                        <input onfocus = "BackToNormal('name')" id = "name" name = "name"  class="uk-input" type="text" placeholder="Full Name">
                    </div>

                    <div class="uk-margin">
                        <input onfocus = "BackToNormal('email')" id = "email" name = "email" class="uk-input" type="text" placeholder="Email">
                    </div>

                    <div class="uk-margin">
                        <textarea onfocus = "BackToNormal('feedback')" id = "feedback" name = "feedback" class="uk-textarea" rows="5" placeholder="Your query..."></textarea>
                    </div>
                </fieldset>
                                        <!-- LOGIC FOR ERROR/SUCCESS MESSAGE STARTS HERE -->
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
                    <!-- LOGIC FOR ERROR/SUCCESS MESSAGE ENDS HERE -->
                <div class="">
                    <button name = "submit" type = "submit" class = "uk-button uk-button-secondary uk-align-right">Send</button>
                </div>
            </form>

        </div>

        <?php include_once("include/footer.php"); ?>

        <script>
            function validate(){
                var name = document.getElementById("name").value.trim();
                var email = document.getElementById("email").value.trim();
                var complaint = document.getElementById("feedback").value.trim();
                var valid = true;

                if(name == ""){
                    document.getElementById('name').className += ' uk-form-danger';
                    valid = false;
                }

                if(email == ""){
                    document.getElementById('email').className += ' uk-form-danger';
                    valid = false;
                }

                if(complaint == ""){
                    document.getElementById('feedback').className += ' uk-form-danger';
                    valid = false;
                }

                return valid;
            }
            function BackToNormal(para){
                    document.getElementById(para).classList.remove("uk-form-danger");
                }
        </script>
    </body>

</html>


