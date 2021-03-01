<?php session_start(); ?>
<div>
    <?php 
    if(isset($_SESSION['errorMessage']))
    {
        $message = $_SESSION['errorMessage'];
        ?>
        <p class="uk-text-danger uk-margin-remove-bottom" style = "text-align: center;"><?php echo $message; ?></p>
        <?php
    }
    unset($_SESSION["errorMessage"]);
    ?>            
</div>

<div>
    <?php 
    if(isset($_SESSION['successMessage']))
    {
        $message = $_SESSION['successMessage'];
        ?>
        <p class="uk-text-success uk-margin-remove-bottom" style = "text-align: center;"><?php echo $message; ?></p>
        <?php
    }
    unset($_SESSION["successMessage"]);
    ?>            
</div>