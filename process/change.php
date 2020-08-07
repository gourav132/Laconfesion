<?php 
    session_start();
    $username = $_POST['username'];
    $oldPasswd = $_POST['old'];
    $newPasswd = $_POST['newp'];

    include_once("../connection.php");
        $sql = "SELECT * FROM account WHERE username=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)) {
                $hashed_password = $row['password'];
                if(password_verify($oldPasswd, $hashed_password)) {
                    $hashPass = password_hash($newPasswd, PASSWORD_DEFAULT);
                    $sql = "UPDATE account SET password=? WHERE username=?";
                    if($stmt = mysqli_prepare($link, $sql)){
                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt, "ss", $hashPass, $username);
            
                        $result2 = mysqli_stmt_execute($stmt);
                        if($result2){
                            $_SESSION["success"] = "Password changed successfully";
                            header("location: ../Manage");
                        }
                        else{
                            $_SESSION["error"] = "Password not changed try again";
                            header("location: ../Manage");
                        }
            
                    }
                }
                else{
                    $_SESSION["error"] = "Wrong current password";
                    header("location: ../Manage");
                }
            }
        }
?>