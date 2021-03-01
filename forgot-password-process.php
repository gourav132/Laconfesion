<?php session_start();
sleep(2);
if(isset($_POST['email'])){
    $email = $_POST['email'];
    include_once("connection.php");
    $sql = "SELECT * FROM account WHERE email=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $value = mysqli_num_rows($result);
    // echo $value;
    // echo mysqli_error($link);
    if($value > 0)
    {
        $to = $email;
        $subject = "Testing php mail function";
        $txt = "Hello world!";
        $headers = "From: webmaster@example.com" . "\r\n" .
        "CC: somebodyelse@example.com";
        ini_set("SMTP", "localhost");
        ini_set("sendmail_from", "gouravchatterje64@outlook.com");
        ini_set("smtp_port", "25");
        if(mail($to,$subject,$txt,$headers)){

        $_SESSION["successMessage"] = "Email sent";
        }
        else{
            $_SESSION['errorMessage'] = "Encountering some problem";
        }
    }
}
?>