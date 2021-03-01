<div id="offcanvas-nav" uk-offcanvas="overlay: true; flip: true;" uk-offcanvas="flip: true"> 
    <div class="uk-offcanvas-bar">

        <ul class="uk-nav uk-nav-default">
        <li class="uk-nav-header">Menu</li>
            <li><a href="Home"><span class="uk-margin-small-right uk-margin-small-top" uk-icon="icon: home"></span> Home</a></li>
            <li><a href="Profile"><span class="uk-margin-small-right uk-margin-small-top" uk-icon="icon: comments"></span> Confessions</a></li>
            <li><a href="Search"><span class="uk-margin-small-right uk-margin-small-top" uk-icon="icon: commenting"></span> Confess</a></li>
            <li><a href="Reply"><span class="uk-margin-small-right uk-margin-small-top" uk-icon="icon: reply"></span> Replies</a></li>
            <li><a href="Contact"><span class="uk-margin-small-right uk-margin-small-top" uk-icon="icon: receiver"></span> Contact</a></li>
            <li class="uk-nav-divider"></li>
            <li class="uk-nav-header">Account</li>
            <?php 
                if(isset($_SESSION['userName'])){ 
                    $userName = $_SESSION['userName'];
            ?>
            <li><a href="logout.php"><span class="uk-margin-small-right uk-margin-small-top" uk-icon="icon: sign-out"></span>Logout</a></li>
            <li><a href="Manage"><span class="uk-margin-small-right uk-margin-small-top" uk-icon="icon: cog"></span>Manage account</a></li>
            <li class="uk-nav-divider"></li>
            <li class="uk-nav-header">LINK</li>
            <li class="uk-margin-small-right uk-margin-small-top"><input id="link" style="color: #8b8b8b; border: none; background: transparent; width: -webkit-fill-available;" type="text" value="localhost/La Confesion/Confess-<?php echo $userName; ?>" disabled></li>
            <li><a onclick='return copy()' href="SignUp"><span class="uk-margin-small-right uk-margin-small-top" uk-icon="icon: sign-in"></span>Copy</a></li>
            <?php
                }
                else{
            ?>
            <li><a href="SignIn"><span class="uk-margin-small-right uk-margin-small-top" uk-icon="icon: sign-in"></span>Sign in</a></li>
            <li><a href="SignUp"><span class="uk-margin-small-right uk-margin-small-top" uk-icon="icon: sign-in"></span>Sign up</a></li>
            <li class="uk-nav-divider"></li>
            <?php
                }
            ?>
        </ul>
    </div>
</div>

<script>
    function copy(){
        document.getElementById("link").disabled = false;
        var copyText = document.getElementById("link");
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/
        document.execCommand("copy");
        alert("Copied: " + copyText.value);
        document.getElementById("link").disabled = true;
        return false;
    }
</script>