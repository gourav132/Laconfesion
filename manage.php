<?php session_start(); 
    $username = $_SESSION['userName'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Account</title>
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/css/uikit.min.css" />
        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit-icons.min.js"></script>
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <style>
    #notMatched{
        display: none;
    }
</style>
</head>

<body>
    <?php include_once("include/navbar.php"); ?>
    <?php include_once("include/side-menu.php"); ?>

    <hr class="uk-divider-icon">
    <h1 class="uk-text-center uk-text-uppercase uk-margin-remove-top">
        Manage Your Account
    </h1>
    <hr class="uk-divider-icon">

    <div class="uk-container">
        <h2>Change your password</h2>
        <form action="process/change.php" method="POST" onsubmit="return validate()">
            <input type="hidden" value="<?php echo $username; ?>" name = "username">

            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input onfocus = "BackToNormal('old')" class="uk-input" type="password" id="old" name = "old" placeholder="Current password" style="border-radius: 10px">
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input onfocus = "BackToNormal('newp')" class="uk-input" type="password" id="newp" name = "newp" placeholder="New password" style="border-radius: 10px">
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input onfocus = "BackToNormal('confirm')" class="uk-input" type="password" id="confirm" placeholder="Confirm new password" style="border-radius: 10px">
                </div>
                <p class="uk-text-danger" id="notMatched">Password not matched</p>
            </div>

            <?php 
                if(isset($_SESSION['error']))
                {
                    $message = $_SESSION['error'];
            ?>
                    <p class="uk-text-danger"><?php echo $message; ?></p>
            <?php
                }
                unset($_SESSION["error"]);
            ?>  
            <?php 
                if(isset($_SESSION['success']))
                {
                    $message = $_SESSION['success'];
                    ?>
                    <p class="uk-text-success"><?php echo $message; ?></p>
                    <?php
                }
                unset($_SESSION["success"]);
            ?> 

            <button type = "submit" class="uk-button uk-button-secondary uk-button-small" style = "border-radius: 10px">Submit</button>

        </form>

        <hr>

        <h2>Delete your account</h2>
        <p>No. of Confessions - 0</p>
        <p>No. of Replies - 0</p>
        <form action="process/delete.php" method="POST">
            <input type="hidden" name="username" value = "<?php echo $username; ?>">
            <textarea class="uk-textarea" name="why" id="" cols="30" rows="10" placeholder="Reason for leaving us...(Optional)" style = "border-radius: 10px"></textarea>
            <?php 
                if(isset($_SESSION['error1']))
                {
                    $message = $_SESSION['error1'];
            ?>
                    <p class="uk-text-danger"><?php echo $message; ?></p>
            <?php
                }
                unset($_SESSION["error1"]);
            ?>  
            <button type = "submit" class="uk-button uk-button-secondary uk-button-small uk-margin" style = "border-radius: 10px">Delete</button>
        </form> 

        <hr>
    </div>
    <?php include_once("include/footer.php"); ?>
    <script>
        function validate(){
            var $valid = true;
            var old = document.getElementById("old").value.trim();
            var newp = document.getElementById("newp").value.trim();
            var confirm = document.getElementById("confirm").value.trim();

            if(old == ""){
                document.getElementById('old').className += ' uk-form-danger';
                $valid = false;
            }
            if(newp == ""){
                document.getElementById('newp').className += ' uk-form-danger';
                $valid = false;
            }
            if(confirm == ""){
                document.getElementById('confirm').className += ' uk-form-danger';
                $valid = false;
            }
            if(confirm != newp){
                document.getElementById('confirm').className += ' uk-form-danger';
                document.getElementById('newp').className += ' uk-form-danger';
                document.getElementById("notMatched").style.display = "initial";
                $valid = false;
            }
            return $valid;
        }

        function BackToNormal(para){
            document.getElementById(para).classList.remove("uk-form-danger");
            if(para == "confirm"){
                document.getElementById("notMatched").style.display = "none";
            }
        }

    </script>
</body>
</html>