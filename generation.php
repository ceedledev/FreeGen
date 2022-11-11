<?php
require('inc/fonctions.php');

if (!check_login()){
    header('Location: /connexion');
    exit();
}

if (empty($_GET['compte']) AND empty($_SERVER['HTTP_REFERER'])) {
    header('Location: /');
    exit();
}

$compte = htmlspecialchars($_GET['compte']);
$acc = @explode(':', $compte);
$acc2 = @explode('|', $acc[1]);


$title = 'Votre génération';
require('inc/header_panel.php');

// Menu a gauche
require('inc/menu_panel.php');

// Menu en haut
require('inc/menu_haut.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">FreeGen</a></li>
                        <li class="breadcrumb-item"><a href="/">Manager</a></li>
                        <li class="breadcrumb-item active">Récuperation de votre compte</li>
                    </ol>
                </div>
                <h4 class="page-title">Enfin, votre compte à été généré !</h4>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="text-center">
                <img src="https://i.imgur.com/jN4wOVb.gif" height="90"/>
                <h4 class="text-uppercase text-danger mt-3">Voici votre compte:</h4>
                <br>
                <ul class="list-group">
                    <li class="list-group-item active"><i class="uil-chat-bubble-user mr-1"></i> <?=$compte ?></li>
                </ul>
                <br>
                <ul class="list-group">
                    <li class="list-group-item"><i class="uil-fast-mail mr-1"></i>/<i class="uil-user mr-1"></i> <?=$acc[0] ?></li>
                    <li class="list-group-item"><i class="uil-lock mr-1"></i> <?=$acc2[0] ?></li>
                </ul>
                <p class="text-muted mt-3">Il arrive parfois que le compte que vous avez généré ne marche pas. Si c'est le cas, merci d'en générer un nouveau et de ne pas vous plaindre.</p>

                <a class="btn btn-info mt-3" href="/"><i class="mdi mdi-reply"></i> Retourner à l'accueil</a>
                
            </div>
        </div>
    </div>
</div>
<?php require('inc/footer_panel.php'); ?>
