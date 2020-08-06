<?php
    if(isset($_POST['submit']))
    {
        $from = $_POST['from'];
        $to = $_POST['to'];
        $replyTo = $_POST['replyto'];
        $reply = $_POST['reply'];

        if($reply == "")
        {
            // Error
        }
        else
        {
            include_once("connection.php");
            $escaped_replyTo = mysqli_real_escape_string($link , $replyTo);
            $escaped_reply = mysqli_real_escape_string($link , $reply);
            $sql = "INSERT INTO reply (who,whome,confession,reply) VALUES (?, ?, ? , ?)";
            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_bind_param($stmt, "ssss", $from, $to, $escaped_replyTo, $escaped_reply);
            $result = mysqli_stmt_execute($stmt);
            
            if($result)
            {
                header("location: Profile");
            }
            else
            {
                echo mysqli_error($link);
            }

        }

    }
?>