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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/css/uikit.min.css" />
        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit-icons.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    </head>

    <style>
        .reply{
            display: none;
        }
    </style>

    <script>
        function reply(dynamicId){
            dynamicId.style.display = "block";
        }

        $(document).ready(function () {
            var count = 6;
            $("#load-confession").click(function () {
                count = count + 4;
                $("#ajax-call").load("load_confession_ajax.php", {Confessioncount: count});
            });
        });
    </script>

<body>

    <?php include_once("include/navbar.php"); ?>
    <?php include_once("include/side-menu.php"); ?>
    <hr class="uk-divider-icon">
    <h1 class="uk-text-center uk-text-uppercase">
        WELCOME <?php echo $user; ?> TO <br> LA CONFESION
    </h1>
    <hr class="uk-divider-icon">
    <div class="uk-section uk-section-muted">
        <div class="uk-container">
            <h2 class="uk-text-muted uk-text-center">CONFESSIONS</h2><br>
            <div id="ajax-call">
                <div class="uk-grid-match uk-child-width-1-2@m" uk-grid>
                <?php 
                    include_once("connection.php");
                    $sql = "SELECT * FROM confession WHERE whome=? ORDER BY id DESC LIMIT 6 ";
                    $stmt = mysqli_prepare($link, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $username);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $i = 0;
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $i = $i+1;
                            $confession = $row['confession'];
                            $date = $row['date'];
                            $reply = $row['reply'];
                            $whome = $row['who'];
                            // echo $whome;
                            $dynamnicId = "id".$i;
                            $dynamnicId2 = "id2".$i;
                            // echo $dynamnicId;
                ?>

                <div>
                    <div class="uk-card uk-card-default uk-width-1-1@m">

                        <div class="uk-card-header">
                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                <div class="uk-width-auto">
                                    <img class="uk-border-circle" width="40" height="40" src="img/avatar.jpg">
                                </div>
                                <div class="uk-width-expand">
                                    <h3 class="uk-card-title uk-margin-remove-bottom">Anonymous</h3>
                                    <p class="uk-text-meta uk-margin-remove-top"><?php echo $date; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="uk-card-body">
                            <p style = "overflow-wrap: break-word;"> <?php echo $confession; ?> </p>
                        </div>

                        <?php 
                            if($reply == "true")
                            {
                                $sql2 = "SELECT * FROM reply WHERE who=? AND whome=? AND confession=?";
                                $stmt = mysqli_prepare($link, $sql2);
                                mysqli_stmt_bind_param($stmt, "sss", $user,$whome,$confession);
                                mysqli_stmt_execute($stmt);
                                $result2 = mysqli_stmt_get_result($stmt);
                                
                                if($result2)
                                {
                                    if(mysqli_num_rows($result2) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($result2))
                                        {
                                            $replymsg = $row['reply']
                        ?>
                        
                        <div class="uk-card-footer">
                            <button onclick = "reply(<?php echo $dynamnicId2 ?>)" class="uk-button uk-button-text">Your reply</button>
                        </div>

                        <div id = '<?php echo $dynamnicId2 ?>' class="reply uk-card uk-card-secondary uk-card-body">
                            <!-- <h3 class="uk-card-title">Replyed</h3> -->
                            <p><?php echo $replymsg; ?></p>
                        </div>    

                        <?php
                                    }  } 
                                    else
                                    {

                                    
                                
                        ?>

                        <div class="uk-card-footer">
                            <button onclick = "reply(<?php echo $dynamnicId ?>)" class="uk-button uk-button-text">Reply</button>
                        </div>

                        <div id = "<?php echo $dynamnicId ?>" class="reply uk-card uk-card-secondary uk-card-body">
                            <!-- <h3 class="uk-card-title">Reply</h3> -->
                            <form action="replying-process.php" method = "POST">
                                <input type="hidden" name = "from" value = "<?php echo $user; ?>">
                                <input type="hidden" name = "to" value = "<?php echo $whome; ?>">
                                <input type="hidden" name = "replyto" value = "<?php echo $confession; ?>">
                                <textarea name = "reply" class = "uk-textarea" name="" id=""></textarea>
                                <button name = "submit" class = "uk-button uk-button-secondary uk-margin-top" type = "submit">Send</button>
                            </form>
                        </div>    
                            
                        <?php
                            }}}
                        ?> 


                    </div>

                    <hr class="uk-divider-icon">
                </div>
                
            <?php 

            }
            }
            else
            {
                ?>
                <div class="uk-container" style = "margin: auto">
                    <div class="uk-card uk-card-default uk-card-body">
                        <h3 class="uk-card-title uk-text-center">No Confessions...</h3>
                    </div>
                </div>
                <?php
                
            }
?>

        </div>
            </div>
    </div>
</div>

    <button id = "load-confession" class="uk-button uk-button-secondary uk-align-center">SHOW MORE CONFESSIONS</button>



</body>
</html>
<?php
}
else{
    header("location:SignIn");
}?>
