<?php
    $routing = [
        'home' => [
            'controller' => 'home',
            'secure' => false,
        ],

        'login' => [
            'controller' => 'login',
            'secure' => false,
        ],
    ];

    if(isset($_GET['action'])){
        $action = $_GET['action'];
        if(!isset($routing[$action])){
            $action = 'errors/404';
        }
    } else {
        $action = 'home';
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Accueil - Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/default.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/flat-ui.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="assets/js/vendor/html5shiv.js"></script>
    <script src="assets/js/vendor/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>

<nav class="navbar">
    <div class="menu">
        <ul>
            <li>
                <a href="?action=home">Accueil</a>
            </li>
            <li>
                <a href="?action=home">Description</a>
            </li>
            <li>
                <a href="?action=home">Achat</a>
            </li>
            <li>
                <a href="?action=home">Contact</a>
            </li>
        </ul>
    </div>
</nav>
<!-- /.nav -->
<nav class="navigation">
    <span class="text-left">Service client <span class="XXXX">GRATUIT</span> 000 000 000</span>
</nav>

<?php
    require_once('view/'.$action.'.php');
?>


<footer>
    <a href="">mode de paiement</a> - <a href="">mode de livraison</a> - <a href="">qualité de services certifiés</a> - <a href="">contact</a> - <a href="">newsletters</a>
</footer>

<!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
<script src="assets/js/vendor/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/vendor/video.js"></script>
<script src="assets/js/flat-ui.min.js"></script>
</body>
</html>
