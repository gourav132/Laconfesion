<?php
ob_start();
    session_start();
    if(isset($_POST['submit']))
    {
        $userName = $_POST['userName'];
        $passwd = $_POST['passwd'];
        include_once("connection.php");
        $sql = "SELECT * FROM account WHERE username=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $userName);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        // echo mysqli_num_rows($result);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $user = $row['username'];
            $hashed_password = $row['password'];
            echo $hashed_password;
            if(password_verify($passwd, $hashed_password)) {
                if($user == "laconfesion_admin" && $name == "Admin"){
                    $_SESSION['Admin'] = $user;
                    header("location: Admin-content.php");
                }
                else{
                    $_SESSION["errorMessage"] = "You are not the one";
                    header("location:Admin-Login.php");
                }
            }             
            else
            {
                $_SESSION["errorMessage"] = "Invalid Password";
                header("location:Admin-Login.php");
            }
            // echo mysqli_error($link);
            }
        }
        else
        {
            $_SESSION["errorMessage"] = "Invalid Credentials";
            header("location:Admin-Login.php");
        }
    }

?>