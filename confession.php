<?php session_start(); 
unset($_SESSION["comeback"]);?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel = "icon" href = "img/favicon.ico" type = "image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/css/uikit.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit-icons.min.js"></script>
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    </head>

<?php
    
    $_SESSION['confesstouser'] = $_GET['user'];
    $username_confession_to = $_SESSION['confesstouser'];
    include_once("connection.php");
    $sql = "SELECT * FROM account WHERE username=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username_confession_to);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) == 1)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $name_confession_to = $row['name'];

?>


    <body>
        <?php include_once("include/navbar.php"); ?>
        <?php include_once("include/side-menu.php"); ?>

        <hr class="uk-divider-icon">
        <h2 class="uk-text-center uk-text-uppercase">Want to confess somthing to <?php echo $name_confession_to; ?> ?</h2>
        <p class="uk-text-center uk-text-uppercase uk-text-muted">confess here</p>
        <hr class="uk-divider-icon">
        <div class="uk-section uk-section-muted">
            <div class="uk-container">

                <form action="send_confession.php" method="POST" onsubmit = "return validate()">
                    <!-- LOGIC FOR ERROR/SUCCESS MESSAGE STARTS HERE -->
                    <input type="hidden" id = "whome" value = "<?php echo $username_confession_to; ?>" name = "whome">
                    <textarea onfocus = "BackToNormal('confessionArea')" id = "confessionArea" name = "confession" class="uk-textarea" name="" id="" cols="20" rows="10" placeholder="Your Confession..."></textarea>
                    <?php 
                        if(isset($_SESSION['userName']))
                        {
                    ?>
                    <p class = "uk-margin-top"><input id="reply" class = "uk-checkbox" type="checkbox" name = "reply"> Want to get reply for the confession</p>
                    <?php 
                        }
                        else
                        {
                            $_SESSION['comeback'] = "Confess-".$username_confession_to;
                    ?>
                    <p><a href = "SignIn">Sign In </a>to get reply for your confession</p>
                    <?php
                        }
                    ?>
                                <div class="uk-container" style="display: none;" id="wait">
                <img class="uk-align-center" src="img/ajax.gif" alt="">
            </div><br>
                    <button type = "submit" name = "submit" class="uk-button uk-button-secondary uk-width-1-1">SEND CONFESSION</button>
                </form>
            </div>
        </div>

        <!-- modal testing -->
        <a style="display: none" id = "modalclick" class="uk-button uk-button-default" href="#modal-center" uk-toggle>Open</a>
        <div id="modal-center" class="uk-flex-top" uk-modal>
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                <button class="uk-modal-close-default" type="button" uk-close></button>

                <div id="message"></div>
                <hr>
                <h3 class="uk-text-center uk-text-uppercase">found it interesting to confess to someone without being recognised create your very own la confesion account and let your friends confess to you anonymously</h3>
        <a class="uk-button uk-align-center uk-button-secondary" href="signup.php">SIGN UP NOW</a>

            </div>
        </div>

        <hr class="uk-divider-icon">
        <h3 class="uk-text-center uk-text-uppercase">found it interesting to confess to someone without being recognised create your very own la confesion account and let your friends confess to you anonymously</h3>
        <a class="uk-button uk-align-center uk-button-secondary" href="signup.php">SIGN UP NOW</a>
        <hr class="uk-divider-icon">
        <div id = "result"></div>

                    <?php 
}}  
            else{
                ?>
                        <div class="uk-margin uk-card uk-card-default uk-card-hover uk-card-body uk-container">
                            <hr class="uk-divider-icon">
                            <h1 style = "text-align: center;">No such user exists
                            </h1>
                            <hr class="uk-divider-icon">
                        </div>
                <?php
            }
        ?>



        <script>

$(document).ajaxStart(function(){
  $("#wait").css("display", "block");
});

$(document).ajaxComplete(function(){
  $("#wait").css("display", "none");
});
        // function to valid form
            function validate(){
                var confessionArea = document.getElementById("confessionArea").value.trim();
                if(document.getElementById("reply") == null)
                {
                    var reply = "false";
                }
                else{
                    var reply = document.getElementById("reply").checked;
                }             
                var whome = document.getElementById("whome").value;
                if(confessionArea == "") 
                {
                    document.getElementById('confessionArea').className += ' uk-form-danger';
                }
                else
                {
                    $("#result").load("send_confession.php", {submit: "ok", confession: confessionArea, reply: reply, whome:whome}, function(){
                        $("#message").load("message/confessionMessage.php", function(){
                            document.getElementById("modalclick").click();
                            document.getElementById("confessionArea").value = "";
                        });
                    });
                }
                return false;
            }

            function BackToNormal(para){
                document.getElementById(para).classList.remove("uk-form-danger");
            }
        </script>
</body>
</html>

