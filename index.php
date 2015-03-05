<?php
//begin session
    session_start();

//require autoloader
    require_once "vendor/autoload.php";
//connect to database
   $user = new Src\Model\User();


    $routing = [
        'home' => [
            'controller' => 'home',
            'secure' => false,
        ],

        'payment' => [
            'controller' => 'payment',
            'secure' => false,
        ],

        'buy' => [
            'controller' => 'buy',
            'secure' => false,
        ],

        'login' => [
            'controller' => 'login',
            'secure' => false,
        ],
        'logout' => [
            'controller' => 'logout',
            'secure' => true,
        ],

        'subscription' => [
            'controller' => 'subscription',
            'secure' => false,
        ],

        'contact' => [
            'controller' => 'contact',
            'secure' => false,
        ],

        'newsletter' => [
            'controller' => 'newletter',
            'secure' => false,
        ],
    ];

    if(isset($_GET['action'])){
        $action = $_GET['action'];
        if(!isset($routing[$action])){
            $action = '404';
        }
    } else {
        $action = 'home';
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>noxDuck</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/default.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/flat-ui.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/logo.png">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="assets/js/vendor/html5shiv.js"></script>
    <script src="assets/js/vendor/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <a class="navbar-brand" href="?action=home">
                <img src="assets/img/logo.png" alt="Logo de noxDuck" class="img-responsive logo"/>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-01">
            <ul class="nav navbar-nav navbar-right text-center" id="menu">
                <li><a href="?action=home">Accueil</a></li>
                <li><a href="?action=home#description">Description</a></li>
                <li><a href="?action=home#avis">Avis</a></li>
                <li><a href="?action=buy">Achat</a></li>
                <li><a href="?action=contact">Contact</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
        <div class="login-space">
            <?php
                if (isset($_SESSION['login'])) {
                    echo '<a href="?action=">' . $_SESSION['login'] . '</a> - <a href="?action=logout">Deconnexion</a>';
                } else {
                    echo '<a href="?action=login">Connexion</a> - <a href="?action=subscription">Inscription</a>';

                }

                ?>
        </div>
    </nav><!-- /navbar -->

    <nav class="navigation text-center text-uppercase">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><span class="text-left">Service client <span class="primary-color">GRATUIT</span></span></div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><span class="text-left">Installation <span class="primary-color">GRATUITE</span></span></div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><span class="text-left">Paiement Sécurisé</span></div>
        </div>
    </nav>

    <?php
        require('Src/view/'.$action.'.php');
    ?>


    <footer>
        <a href="?action=buy">Acheter un Produit</a> - <a href="?action=contact">Contactez-nous</a> - <a href="?action=newsletter">Newsletter</a>
    </footer>

    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="assets/js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/vendor/video.js"></script>
    <script src="assets/js/flat-ui.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>