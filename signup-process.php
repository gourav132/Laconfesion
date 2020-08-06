<?php
ob_start();
    session_start();

    if(isset($_POST['submit']))
    {
        include_once("connection.php");
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $userName = $_POST['userName'];
        $passwd = $_POST['passwd'];
        $confirmPasswd = $_POST['confirmPasswd'];
        $randomId = randomId();

        // checking if the confirm password matches the passwor or not 

        if($confirmPasswd != $passwd)
        {
            $_SESSION["errorMessage"] = "Password not matched";
            header("location: SignUp");
        }
        else
        {
            if(strlen($passwd) < 5) 
            {
                $_SESSION["errorMessage"] = "Password too short";
                header("location: SignUp");
            }
            else
            {
                // Checking if the username and email exists or not
                $sql = "SELECT * FROM account WHERE username=?";
                $stmt = mysqli_prepare($link, $sql);
                mysqli_stmt_bind_param($stmt, "s", $userName);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $value = mysqli_num_rows($result);
                // echo $value;
                echo mysqli_error($link);
                if($value > 0)
                {
                    $_SESSION["errorMessage"] = "Username already in use";
                    header("location: SignUp");
                }
                else
                {
                    $sql = "SELECT * FROM account WHERE email=?";
                    $stmt = mysqli_prepare($link, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $value = mysqli_num_rows($result);
                    // echo $value;
                    echo mysqli_error($link);
                    if($value > 0)
                    {
                        $_SESSION["errorMessage"] = "Email already registered";
                        header("location: SignUp");
                    }
                    else
                    {
                        $hashPass = password_hash($passwd, PASSWORD_DEFAULT);
                        // Inserting values to the database
                        $sql = "INSERT INTO account (name , email, username, password, randomid) VALUES (?,?,?,?,?)";
                        if($stmt = mysqli_prepare($link, $sql)){
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "sssss", $fullName, $email, $userName, $hashPass, $randomId);
                
                            $result = mysqli_stmt_execute($stmt);
                            if($result){
                                $_SESSION["successMessage"] = "Account created successfully";
                                header("location: SignIn.php");
                            }
                            else{
                                $_SESSION["errorMessage"] = "Try again";
                                header("location: SignUp");
                            }
                
                        }
                    }
                }
            }
        }
    }

?>

<!-- Generating Random Id -->

<?php

    function randomId()
    {
        $date = preg_replace('/[.,]/', '', date("Y.m.d"));
        $str=rand(); 
        $result = sha1($str); 
        $id = $result.$date;
        return $id;
    }

?>