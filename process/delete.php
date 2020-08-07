<?php
    session_start();
    $username = $_POST['username'];
    $name = $_SESSION['user'];
    $why;
    $status = false;
    if(isset($_POST['why'])){
        $why = $_POST['why'];
        $status = true;
    }

    include_once("../connection.php");
    $sql = "DELETE FROM account WHERE username=?";
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $username);
        $result = mysqli_stmt_execute($stmt);
        if($result){
            $sql = "DELETE FROM confession WHERE whome=?";
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $username);
                $result = mysqli_stmt_execute($stmt);
                if($result){
                    $sql = "DELETE FROM reply WHERE who=?";
                    if($stmt = mysqli_prepare($link, $sql)){
                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt, "s", $name);
                        $result = mysqli_stmt_execute($stmt);
                        if($result){
                            unset($_SESSION["user"]);
                            unset($_SESSION["userName"]);
                            unset($_SESSION["randomId"]);
                            $_SESSION["success1"] = "Account deleted successfully";
                            header("location: ../SignIn");
                        }
                        else{
                            $_SESSION["error1"] = "Try again";
                            header("location: ../Manage");
                        }
        
                    }

                }
                else{
                    $_SESSION["error1"] = "Try again";
                    header("location: ../Manage");
                }

            }
        }
        else{
            $_SESSION["error1"] = "Try again";
            header("location: ../Manage");
        }

    }

?>