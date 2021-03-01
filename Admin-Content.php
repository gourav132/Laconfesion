<?php 
    session_start();
    include_once("connection.php");
    $sql = "SELECT * FROM account";
    $result = mysqli_query($link, $sql);
    $total = mysqli_num_rows($result);
    $users = $total-1;
    $sql = "SELECT * FROM confession";
    $result = mysqli_query($link, $sql);
    $total = mysqli_num_rows($result);
    $confessions = $total;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "icon" href = "img/favicon.ico" type = "image/x-icon">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit-icons.min.js"></script>
</head>
<body>
    <?php include_once("include/navbar.php"); ?>
    <?php include_once("include/side-menu.php"); ?>
    <hr class="uk-divider-icon">
    <h1 class="uk-text-center uk-text-uppercase uk-margin-remove-top">
        Dashboard
    </h1>
    <hr class="uk-divider-icon">
    <div class="uk-container">
        <div class="uk-card uk-card-secondary uk-margin-bottom uk-card-body" style="
    border-radius: 15px;
">
            <h3 class="uk-card-title">Users :</h3>
            <p><?php echo $users; ?></p>
        </div>
        <div class="uk-card uk-card-secondary uk-margin-bottom uk-card-body" style="
    border-radius: 15px;
">
            <h3 class="uk-card-title">Confessions :</h3>
            <p><?php echo $confessions; ?></p>
        </div> 
    </div>
    <div class="uk-overflow-auto uk-container uk-table-middle">
    <h1>List of users : </h1>
    <table class="uk-table uk-table-small uk-table-divider uk-table-hover" style="border: 1px solid #e5e5e5;">
        <thead>
            <tr>
                <th>Name</th>
                <th>UserName</th>
            </tr>
        </thead>
    <?php
        if(isset($_SESSION['Admin'])){
            $sql = "SELECT * FROM account";
            $result = mysqli_query($link, $sql);
            $total = mysqli_num_rows($result);
            if ($total > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    if($row["username"] != "laconfesion_admin" && $row["username"] != "nidhi.098"){
    ?>

    <tbody>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['username']; ?></td>
        </tr>
    </tbody>

    <?php
                    } //End of if statement

                } //End of while loop

            } //End of if statement
            else{
                echo "0 Users";
            }
        }
        else{
            header("location:Admin");
        }
?>
    </table>
</div>
<div class="uk-container uk-margin-top"><a href="logout.php" class="uk-button uk-button-secondary">Logout</a></div>
<div class="uk-margin"></div>
<?php include_once("include/footer.php");?>

</body>
</html>