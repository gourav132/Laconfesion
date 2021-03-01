<?php

    session_start();
    if(isset($_SESSION['userName']))
    {
        $CurrentUser = $_SESSION['userName'];
        $RandomId = $_SESSION['randomId'];
?>
        <!DOCTYPE html>
        <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Replies</title>
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
                Replies of your confessions
                </h1>
                <p class = "uk-text-muted uk-text-center">Confessions done while logged in will be shown here</p>
                <hr class="uk-divider-icon">
                <div class="uk-section uk-section-muted">
                    <div class="uk-container">

<?php
    include_once("connection.php");
    $sql = "SELECT * FROM reply WHERE whome=? ORDER BY id DESC";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $RandomId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if($result)
    {
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $reply = $row['reply'];
                $replyFrom = $row['who'];
                $replyToWhat = $row['confession'];
                // echo mysqli_error($link);
?>

    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
        <div class="uk-card-media-left uk-card-body">
            <h3 class="uk-card-title">Confession</h3>
            <p><?php echo $replyToWhat ?></p>
        </div>

        <div>
            <div class="uk-card-body uk-card-secondary">
                <h3 class="uk-card-title">Reply</h3>
                <p><?php echo $reply ?></p>
            </div>
        </div>
    </div>
                        

<?php
            }
        }
        else
        {
            ?>
                               <div class="uk-container" style = "margin: auto">
                    <div class="uk-card uk-card-default uk-card-body">
                        <h3 class="uk-card-title uk-text-center">No Replies...</h3>
                    </div>
                </div>
            <?php

        }
    }
?>

</div>
                </div>
                <?php include_once("include/footer.php"); ?>
    </body>
</html>
<?php
    }
    else
    {
        header("location: SignIn");
    }

?>

