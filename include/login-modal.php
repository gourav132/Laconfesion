<div id="modal-overflow" uk-modal>
    <div class="uk-modal-dialog">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="uk-modal-header">
            <h2 class="uk-text-center uk-modal-title">SIGN UP</h2>
        </div>

        <div class="uk-modal-body" uk-overflow-auto>
            
        <form action = "signup-process.php" method = POST onsubmit = "return SignUp_Validate()">

            <div class="uk-margin uk-flex uk-flex-center">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input id = "fullName" name = "fullName" class="uk-input" type="text" placeholder="Full name" style="border-radius: 50px">
                </div>
            </div>

            <div class="uk-margin uk-flex uk-flex-center">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: mail"></span>
                    <input id = "email" name = "email" class="uk-input" type="email" placeholder="Email" style="border-radius: 50px">
                </div>
            </div>

            <div class="uk-margin uk-flex uk-flex-center">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input id = "userName" name = "userName" class="uk-input" type="text" placeholder="Username" style="border-radius: 50px">
                </div>
            </div>

            <div class="uk-margin uk-flex uk-flex-center">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input id = "passwd" name = "passwd" class="uk-input" type="password" placeholder="Password" style="border-radius: 50px">
                </div>
            </div>

            <div class="uk-margin-top uk-flex uk-flex-center uk-margin-bottom">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input id = "confirmPasswd" name = "confirmPasswd" class="uk-input" type="password" placeholder="Confirm Password" style="border-radius: 50px">
                </div>
            </div>
                
                    <div>
                        <?php 
                        if(isset($_SESSION['errorMessage']))
                        {
                            $message = $_SESSION['errorMessage'];
                            ?>
                            <p class="uk-text-danger" style = "text-align: center;"><?php echo $message; ?></p>
                            <?php
                        }
                        unset($_SESSION["errorMessage"]);
                        ?>            
                    </div>

                    <div class="uk-flex uk-flex-right">
                        <input name = "submit" type="submit" class="uk-button uk-button-primary" style="border-radius: 50px" value="SIGNUP">
                    </div>
                    <p class="uk-text-center uk-text-small">Have an account? <a href="SignIn" class="uk-button-text"> Login </a></p>

                </form>

        </div>

    </div>
</div>

<script>
                function SignUp_Validate(){
                    var $valid = true;
                    var userName = document.getElementById("userName").value;
                    var password = document.getElementById("passwd").value;
                    var fullName = document.getElementById("fullName").value;
                    var email = document.getElementById("email").value;
                    var confirmPasswd = document.getElementById("confirmPasswd").value;

                    if(userName == ""){
                        document.getElementById('userName').className += ' uk-form-danger';
                        $valid = false;
                    }

                    if(password == ""){
                        document.getElementById('passwd').className += ' uk-form-danger';
                        $valid = false;
                    }

                    if(fullName == ""){
                        document.getElementById('fullName').className += ' uk-form-danger';
                        $valid = false;
                    }
                    
                    if(email == ""){
                        document.getElementById('email').className += ' uk-form-danger';
                        $valid = false;
                    }

                    if(confirmPasswd == ""){
                        document.getElementById('confirmPasswd').className += ' uk-form-danger';
                        $valid = false;
                    }

                    return $valid;
                    }
            </script>