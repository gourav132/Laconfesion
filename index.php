<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>La Confesion - Home</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=MuseoModerno&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Tenali+Ramakrishna&display=swap" rel="stylesheet">        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/css/uikit.min.css" />
        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.3/dist/js/uikit-icons.min.js"></script>
    </head>

    <style>
    .body{
        background-color: #f5f5f5;
    }
        .fas{
            font-size: 90px;
            color: #464646;
        }
        .branding-wrapper{
            padding-left: 30px; margin-top: -65px; height: 100%; width: 100;
        }
        .branding-logo{
            font-size: 110px;
            color: white;
            font-family: 'Tenali Ramakrishna', sans-serif;
            /* font-family: 'MuseoModerno', cursive; */
            margin: 0px;
        }
        .branding-caption{
            font-size: 31px;
            color: white;
            font-family: 'Dancing Script', cursive;
            /* font-family: 'Montserrat Alternates', sans-serif; */

            margin-top: -29px;
            padding: 0;
        }
        .nav-options{
            color: white;
            font-size: 20px;
            margin-right: 10px;
        }
        .footer{
        height: 241px;
        background-color: #222222;

        }

        @media only screen and (max-width: 600px)
        {
            .branding-logo{
            font-size: 70px;
        }
        .branding-caption{
            font-size: 21px;
        }
        .branding-wrapper{
            padding-left: 0px;
            margin-top: -85px;
        }
        }
    </style>

    <body style = " background-color: #f5f5f5; height: auto;">




        <div  style = "height: 100vh;background-image: url('https://images.pexels.com/photos/956981/milky-way-starry-sky-night-sky-star-956981.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');background-position: center;background-size: cover;background-repeat: no-repeat; position: relative; background-attachment: fixed;">
            <div style = "background-color: #00000066; height: 100%; width: 100;">
            <div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; top: 200">

                <?php include_once("include/navbar.php"); ?>
    <?php include_once("include/side-menu.php"); ?>
</div>

                <div class = "uk-flex uk-flex-middle branding-wrapper" style = "">
                    <div class="introduction-text uk-margin-left">
                        <h1 class = "branding-logo uk-text uk-padding-remove-bottom" uk-scrollspy="cls:uk-animation-fade">LA CONFESION</h1>
                        <p class = "branding-caption uk-padding-remove-top" uk-scrollspy="cls:uk-animation-fade">A perfect place to confess anonymously...</p>
                    </div>
                </div>
            </div>
        </div>

        <div class = "" style = "margin-top: 45px;">
        <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-container">
            <hr class="uk-divider-icon">
            <h3 style = "text-align: center;">
                Confession heals, confession justifies, confession grants pardon of sin, all hope consists in confession; in confession there is a chance for mercy.
            </h3>
            <hr class="uk-divider-icon">
        </div>
    </div>

    <div class="uk-container">
        <div class="uk-grid-small uk-child-width-expand@s uk-text-center" style = "margin-top: 45px" uk-grid>

            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                    <h3 class="uk-card-title uk-padding uk-padding-remove-bottom"><i style="
    color: #fde2b0;
" class="fas fa-envelope"></i></h3>
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">Confess</h3>
                        <p>Best platform to confess to your loved ones without disclosing your identity.</p>
                    </div>
                </div>
            </div>

            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                    <h3 class="uk-card-title uk-padding uk-padding-remove-bottom"><i style="
    color: #fde2b0;
" class="fas fa-envelope-open"></i></h3>
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">Reply</h3>
                        <p>Get a onetime reply option for the confessions you make </p>
                    </div>
                </div>
            </div>
                    
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                    <h3 class="uk-card-title uk-padding uk-padding-remove-bottom"><i style="
    color: #fde2b0;
" class="fas fa-user-secret"></i></h3>
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">Anonymously</h3>
                        <p>Confess without revealing your identity to anyone</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class = "" style = "margin-top: 45px;">
        <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-container">
        <h1 class = "uk-text">Join now and get you La Confession social media link</h1>
            <a href = "SignUp" class = "uk-button uk-button-secondary">Sign Up</a>
        </div>
    </div>

    <div style = "height: 100px;">
    
    </div>

<?php include_once("include/footer.php") ?>

    </body>
</html>

