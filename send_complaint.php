<?php
    session_start();
    if(isset($_POST['submit'])){

        include_once("connection.php");

        // Prepare an insert statement
        $sql = "INSERT INTO question (name, email, question) VALUES (?, ?, ?)";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $feedback_esc);
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $feedback = $_POST['feedback'];
            $feedback_esc = mysqli_real_escape_string($link , $feedback);

            $result = mysqli_stmt_execute($stmt);
            if($result){
                $_SESSION['successMessage'] = "Your complaint is successfully sent";
                header("location: Contact");
            }
            else{
                $_SESSION['errorMessage'] = "Try again";
                header("location: Contact");
            }

        }

        else{
            $_SESSION['errorMessage'] = "Try again";
            header("location: Contact");
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }
?>