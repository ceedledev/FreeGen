<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_GET['erreur'] == 404 AND !empty($_SESSION['id']) AND !empty($_SESSION['motdepasse'])) {
    require('inc/fonctions.php');

    $title = 'Erreur 404';
    require('inc/header_panel.php');
    require('inc/menu_panel.php');
    require('inc/menu_haut.php');
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">FreeGen</a></li>
                            <li class="breadcrumb-item active">404</li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?=$title ?></h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="text-center">
                    <img src="/assets/images/file-searching.svg" height="90">

                    <h1 class="text-error mt-4">404</h1>
                    <h4 class="text-uppercase text-danger mt-3">Page non trouvée</h4>
                    <p class="text-muted mt-3">Il semble que vous ayez pris un mauvais virage. 
                    Ne vous inquiétez pas... ça arrive aux meilleurs d'entre nous. 
                    Voici un petit conseil qui pourrait vous aider à vous remettre sur la bonne voie.</p>

                    <a class="btn btn-info mt-3" href="/"><i class="mdi mdi-reply"></i> Retourner à l'accueil</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    require('inc/footer_panel.php');

    exit();
}

if ($_GET['erreur'] == 400) {
    $title = 'Erreur 400';
} else if ($_GET['erreur'] == 401) {
    $title = 'Erreur 401';
} else if ($_GET['erreur'] == 403) {
    $title = 'Erreur 403';
} else if ($_GET['erreur'] == 404) {
    $title = 'Erreur 404';
} else if ($_GET['erreur'] == 500) {
    $title = 'Erreur 500';
} else {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>FreeGen<?php if (!empty($title)) { echo ' - '.$title; } ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="FreeGen.pw - Premier Générateur de France">
        <meta name="description" content="FreeGen vous permet de générer des comptes premium sur une vaste gamme de services, y compris les films, la télévision, les sports, le contenu pour adultes, les jeux vidéo et bien plus encore et cela 100% Gratuitement en 2 clics !"/>
        <meta name="keywords" content="générateur, generateur, freegen, freegen.fr, FreeGen, FreeGen.fr, générateur gratuit, comptes, spotify gratuit, spotify premium free, free, gen, freegenerateur, generateur de comptes, générateur de comptes gratuit, genfree, twitter freegen, discord freegen, netflix free, spotify free, netflix premium, netflix gratuit, netflix premium gratuit, proxy hq, proxy hq gratuits, pornhub comptes, pornhub free, deezer free, deezer gratuit, freegen.io, freegenio"/>
        
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://freegen.pw"/>
        <meta property="og:title" content="FreeGen.pw - Premier Générateur de France"/>
        <meta property="og:description" content="FreeGen vous permet de générer des comptes premium sur une vaste gamme de services, y compris les films, la télévision, les sports, le contenu pour adultes, les jeux vidéo et bien plus encore et cela 100% Gratuitement en 2 clics !">
        <meta property="og:image" content="https://i.imgur.com/buR4vxW.jpg"/>

        <meta property="twitter:card" content="summary_large_image"/>
        <meta property="twitter:url" content="https://freegen.pw"/>
        <meta property="twitter:title" content="FreeGen.pw - Premier Générateur de France"/>
        <meta property="twitter:description" content="FreeGen vous permet de générer des comptes premium sur une vaste gamme de services, y compris les films, la télévision, les sports, le contenu pour adultes, les jeux vidéo et bien plus encore et cela 100% Gratuitement en 2 clics !">
        <meta property="twitter:image" content="https://i.imgur.com/buR4vxW.jpg"/>
        
        <link rel="shortcut icon" href="/assets/images/favicon.ico"/>
        
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style"/>
        <link href="/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style"/>
    </head>
    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":true, "showRightSidebarOnStart": true}'>
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="/">
                                    <span><img src="https://i.imgur.com/l4CSmBY.png" alt="Logo" height="55"></span>
                                </a>
                            </div>
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <?php
                                    if ($_GET['erreur'] == 400) {
                                        ?>
                                        <h1 class="text-error">4<i class="mdi mdi-emoticon-sad"></i>0</h1>
                                        <h4 class="text-uppercase text-danger mt-3">Mauvaise requête</h4>
                                        <p class="text-muted mt-3">Il semble que vous ayez pris un mauvais virage. 
                                        Ne vous inquiétez pas... ça arrive aux meilleurs d'entre nous. 
                                        Voici un petit conseil qui pourrait vous aider à vous remettre sur la bonne voie.</p>
                                        <a class="btn btn-info mt-3" href="/"><i class="mdi mdi-reply"></i> Retourner à l'accueil</a>
                                        <?php
                                    } else if ($_GET['erreur'] == 401) {
                                        ?>
                                        <h1 class="text-error">4<i class="mdi mdi-emoticon-sad"></i>1</h1>
                                        <h4 class="text-uppercase text-danger mt-3">Non autorisé</h4>
                                        <p class="text-muted mt-3">Il semble que vous ayez pris un mauvais virage. 
                                        Ne vous inquiétez pas... ça arrive aux meilleurs d'entre nous. 
                                        Voici un petit conseil qui pourrait vous aider à vous remettre sur la bonne voie.</p>
                                        <a class="btn btn-info mt-3" href="/"><i class="mdi mdi-reply"></i> Retourner à l'accueil</a>
                                        <?php
                                    } else if ($_GET['erreur'] == 403) {
                                        ?>
                                        <h1 class="text-error">4<i class="mdi mdi-emoticon-sad"></i>3</h1>
                                        <h4 class="text-uppercase text-danger mt-3">Accès interdit</h4>
                                        <p class="text-muted mt-3">Il semble que vous ayez pris un mauvais virage. 
                                        Ne vous inquiétez pas... ça arrive aux meilleurs d'entre nous. 
                                        Voici un petit conseil qui pourrait vous aider à vous remettre sur la bonne voie.</p>
                                        <a class="btn btn-info mt-3" href="/"><i class="mdi mdi-reply"></i> Retourner à l'accueil</a>
                                        <?php
                                    } else if ($_GET['erreur'] == 404) {
                                        ?>
                                        <h1 class="text-error">4<i class="mdi mdi-emoticon-sad"></i>4</h1>
                                        <h4 class="text-uppercase text-danger mt-3">Page non trouvée</h4>
                                        <p class="text-muted mt-3">Il semble que vous ayez pris un mauvais virage. 
                                        Ne vous inquiétez pas... ça arrive aux meilleurs d'entre nous. 
                                        Voici un petit conseil qui pourrait vous aider à vous remettre sur la bonne voie.</p>
                                        <a class="btn btn-info mt-3" href="/"><i class="mdi mdi-reply"></i> Retourner à l'accueil</a>
                                        <?php
                                    } else if ($_GET['erreur'] == 500) {
                                        ?>
                                        <img src="/assets/images/startman.svg" height="120">

                                        <h1 class="text-error mt-4">500</h1>
                                        <h4 class="text-uppercase text-danger mt-3">Erreur interne du serveur</h4>
                                        <p class="text-muted mt-3">Une erreur 500 se produit lorsque quelque chose ne va pas dans notre code.
                                        Le fait que vous voyez ceci ne corrige pas cette erreur. Vous êtes probablement énervé en ce moment car 
                                        vous êtes privés de votre générateur préféré, mais tout va bien aller prenez une tisane, pétez un bon coup et rafraichissez la page. 
                                        (si dans 20min c'est toujours comme ça, passez nous dire bonjour sur <a href="https://discord.gg/Wj4fPRD" class="text-muted"><b>Discord</b></a></p>

                                        <a class="btn btn-info mt-3" href="/"><i class="mdi mdi-reply"></i> Retourner à l'accueil</a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer footer-alt">
            © 2016 - <?=date('Y') ?> FreeGen. Tous droits réservés.
        </footer>
        <script src="/assets/js/vendor.min.js"></script>
        <script src="/assets/js/app.min.js"></script>
    </body>
</html>
</html>