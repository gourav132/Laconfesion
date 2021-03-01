<?php session_start();
if(isset($_SESSION['user'])){

    $user = $_SESSION['user'];
    $username = $_SESSION['userName'];

 ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confession</title>
        <!-- UIkit CSS -->
        <link rel = "icon" href = "img/favicon.ico" type = "image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/css/uikit.min.css" />
        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit-icons.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <style>
            .loader{
                display: block;
            }
        </style>
    </head>

<body>

    <?php include_once("include/navbar.php"); ?>
    <?php include_once("include/side-menu.php"); ?>
    <hr class="uk-divider-icon">
        <h1 class="uk-text-center uk-text-uppercase uk-margin-remove-top">Search for users to confess</h1>

        <div class="uk-container">

            <form>
                <div class="uk-margin uk-flex uk-flex-center">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: search"></span>
                        <input id="search" class="uk-input uk-form-small" type="text" placeholder="Search..." style="border-radius: 10px;" autocomplete="off">

                    </div>
                </div>
            </form>

        </div>

    <hr class="uk-divider-icon uk-margin-remove-top">

    <div class="uk-container" style="display: none;" id="wait">
                <img class="uk-align-center" src="img/ajax.gif" alt="">
    </div>

    <br>

    <div id="result">

        <div class="uk-container" id="msg">
            <h4 style="text-align: center; color: #8c8c8c">Search for users... </h4>
        </div>

    </div>


<!-- <?php include_once("include/footer.php"); ?> -->

<script>

$(document).ajaxStart(function(){
  $("#wait").css("display", "block");
  $("#msg").css("display", "none");
});

$(document).ajaxComplete(function(){
  $("#wait").css("display", "none");
});

    $("#search").keyup(function(){
        var search = document.getElementById("search").value;
        if(search != ""){
    $("#result").load("process/result.php",{search: search}, function(responseTxt, statusTxt, xhr){
    });
    }});

</script>
</body>
</html>


<?php
}
else{
    header("location:SignIn");
}?>
