<?php 
    session_start();
    include_once("connection.php");
    if(isset($_POST['submit']))
    {
        $whome = $_POST['whome'];
        $confession = $_POST['confession'];
        $reply = "";
        $reply = $_POST['reply'];
        if($reply == 'true')
        {
            $currentuser = $_SESSION['userName'];
            $sql = "SELECT * FROM account WHERE username=?";
            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_bind_param($stmt, "s", $currentuser);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            echo mysqli_error($link);

            if($result)

            {
               if(mysqli_num_rows($result) > 0)
               {
                   while($row = mysqli_fetch_assoc($result)){
                       $randomId = $row['randomid'];
                       $getReply = "true";
                       echo mysqli_error($link);

                }
               }
            }
        }
        else
        {
            $randomId = randomId();
            $getReply = "false";
            echo mysqli_error($link);

        }
            
            $escaped =  mysqli_real_escape_string($link , $confession);
            $date = date("F jS \, Y");
            $sql = "INSERT INTO confession (who,whome,confession,date,reply) VALUES (?, ?, ? , ? , ?)";
            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_bind_param($stmt, "sssss", $randomId, $whome, $escaped , $date , $getReply);
            $result2 = mysqli_stmt_execute($stmt);
            if($result2)
            {
                $_SESSION["successMessage"] = "Confession sent";
                header("location: Confess-$whome");
            }
            else
            {
                $_SESSION["errorMessage"] = "Try Again";
                header("location: Confess-$whome");
            }
    }
?>




<?php

    function randomId()
    {
        $date = preg_replace('/[.,]/', '', date("Y.m.d"));
        $str=rand(); 
        $result = sha1($str); 
        $id = $result.$date;
        return $id;
    }

    function reverse_mysqli_real_escape_string($str) {
        return strtr($str, [
            '\0'   => "\x00",
            '\n'   => "\n",
            '\r'   => "\r",
            '\\\\' => "\\",
            "\'"   => "'",
            '\"'   => '"',
            '\Z' => "\x1a"
        ]);
     }

?>