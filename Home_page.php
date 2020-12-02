<?php
    include_once("class/class_login.php");
?>
<!DOCTYPE html>
<html lang="fr" >
<head>
    <meta charset="UTF-8">
    <title>Site Vinyle</title>
    <link rel="icon" href="asset/vinyl.ico">
    <link rel="stylesheet" href="asset/CSS/home_page.css">
    <link rel="stylesheet" href="asset/CSS/button.css">
    <link rel="stylesheet" href="asset/CSS/table.css">
    <?php include_once("model/login.php") ?>
</head>
<body>
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>

    <a class="display_home2" href="logout.php"> <img src="asset/logout.png" width="50" height="50"> </a>
    <center>
    <h1>Le site Vinyle</h1>
    <div id="inspired"></div>
        <div id="turntable">
            <div id="table-shadow"></div>
            <div id="table-feet"></div>
            <div id="wood">
                <div id="grain1"></div>
                <div id="grain2"></div>
                <div id="grain3"></div>
                <div id="grain4"></div>
                <div id="grain5"></div>
                <div id="grain6"></div>
            </div>
            <div id="wood2">
                <div id="grain7"></div>
                <div id="grain8"></div>
                <div id="grain9"></div>
                <div id="grain10"></div>
                <div id="grain11"></div>
            </div>
            <div id="table"></div>
            <div id="button"></div>
            <div id="disk">
                <div id="label"></div>
            </div>
            <div id="axis-shadow"></div>
            <div id="axis"></div>
            <div id="arm-shadow"></div>
            <div id="weight-shadow"></div>
            <div id="base">
                <div id="axle-shadow"></div>
            </div>
            <div id="lever"></div>
            <div id="weight"></div>
            <div id="axle"></div>
            <div id="arm"></div>
            <div id="head"></div>
            </div>
            <?php
                if (isset($_SESSION['user'])) {
                    $user = $_SESSION['user'];
                    if ($user->permission == "User") {
            ?>
                        <div class="container">
                            <a href="search_vinyl.php" class="button">Pour rechercher un vinyle</a>
                        </div>
                        <div class="container">
                            <a href="view_all_vinyl.php" class="button">Pour afficher tous les vinyles</a>
                        </div>
                        <div class="container">
                            <a href="wishlist.php" class="button">Pour accéder à la whishlist</a>
                        </div>
            <?php
                    } elseif ($user->permission == "Admin") {
            ?>          
                        <div class="container">
                            <a href="add_vinyl.php" class="button">Pour ajouter un vinyle</a>
                        </div>
                        <div class="container">
                            <a href="search_vinyl.php" class="button">Pour rechercher un vinyle</a>
                        </div>
                        <div class="container">
                            <a href="delete_vinyl.php" class="button">Pour supprimer un vinyle</a>
                        </div>
                        <div class="container">
                            <a href="view_all_vinyl.php" class="button">Pour afficher tous les vinyles</a>
                        </div>
                        <div class="container">
                            <a href="wishlist.php" class="button">Pour accéder à la whishlist</a>
                        </div>
            <?php
                    }
                }
            ?>
    </center>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

    <script>
        $('#button').click(function() {
            if ((($('#label').css('-webkit-animation-play-state')) == 'running') ||  (($('#label').css('animation-play-state')) == 'running')) {
                $(this).css({
                'top':'157px',
                'box-shadow':'0px 0px 0px #1a1a1a'
            });
            $('#label').css({
                '-webkit-animation-play-state': 'paused',
                'animation-play-state': 'paused'
            });
        }
            else {
                $(this).css({
                    'top':'155px',
                    'box-shadow':'2px 2px 0px #1a1a1a'
                });
                $('#label').css({
                    '-webkit-animation-play-state': 'running',
                    'animation-play-state': 'running'
                });
            }
        });  
</script>
<!-- partial -->
  
</body>
</html>