<?php
require('inc/fonctions.php');

if (!check_login()){
    header('Location: /connexion');
    exit();
}

if (isset($_POST['suppr'])){
    if ($utilisateur['grade'] == 10) {
        $bdd->query('TRUNCATE TABLE evenements');
    }
}

$title = 'Informations';
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
                        <li class="breadcrumb-item active">Infos</li>
                    </ol>
                </div>
                <h4 class="page-title">Informations</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <?php if ($utilisateur['grade'] == 10) { ?>
                    <div class="dropdown float-right show">
                        <form method="POST">
                            <button type="sumbit" class="btn btn-danger" name="suppr">
                                <i class="mdi mdi-delete-sweep"></i>
                            </button>
                        </form>
                    </div>
                <?php } ?>
                <h4 class="header-title mt-0 mb-3">Voici les 15 derniers évenements</h4>
                <?php 
                $getInfo = get_infos();
                $i = 0;
                while ($infos = $getInfo->fetch()) {
                    $i++;
                    $date_time = new DateTime($infos['date_time']);
                    if ($infos['type'] == 'retrait') {
                    ?>
                    <div class="row py-1 align-items-center">
                        <div class="col-auto">
                            <i class="mdi mdi-arrow-collapse-up text-danger font-18"></i>
                        </div>
                        <div class="col pl-0">
                            <a href="javascript:void(0);" class="text-body">Retrait du générateur <?=$infos['generateur'] ?></a>
                            <p class="mb-0 text-muted"><small>Effectué par <?= $infos['faitpar'] ?> le <?=$date_time->format('m/d') ?> à <?=$date_time->format('H:i') ?></small></p>
                        </div>
                        <div class="col-auto">
                            <span class="text-danger font-weight-bold pr-2">Retrait</span>
                        </div>
                    </div>
                    <?php } elseif ($infos['type'] == 'restock') { ?>
                    <div class="row py-1 align-items-center">
                        <div class="col-auto">
                            <i class="mdi mdi-bookmark-plus text-success font-18"></i>
                        </div>
                        <div class="col pl-0">
                            <a href="javascript:void(0);" class="text-body">Restock de <?=$infos['stock_ajoute'] ?> <?=$infos['generateur'] ?></a>
                            <p class="mb-0 text-muted"><small>Effectué par <?=$infos['faitpar'] ?> le <?=$date_time->format('m/d') ?> à <?=$date_time->format('H:i') ?></small></p>
                        </div>
                        <div class="col-auto">
                            <span class="text-success font-weight-bold pr-2">+ <?=$infos['stock_ajoute'] ?></span>
                        </div>
                    </div>
                    <?php } elseif ($infos['type'] == 'ajout') { ?>
                    <div class="row py-1 align-items-center">
                        <div class="col-auto">
                            <i class="mdi mdi-arrow-collapse-down text-success font-18"></i>
                        </div>
                        <div class="col pl-0">
                            <a href="javascript:void(0);" class="text-body">Ajout du générateur <?= $infos['generateur'] ?></a>
                            <p class="mb-0 text-muted"><small>Effectué par <?=$infos['faitpar'] ?> le <?=$date_time->format('m/d') ?> à <?=$date_time->format('H:i') ?></small></p>
                        </div>
                        <div class="col-auto">
                            <span class="text-success font-weight-bold pr-2">Ajout</span>
                        </div>
                    </div>
                    <?php } ?>
                <?php } if ($i == 0) { ?>
                <div class="row py-1 align-items-center">
                    <div class="col-auto">
                        <i class="mdi mdi-timer-sand-empty text-danger font-18"></i>
                    </div>
                    <div class="col pl-0">
                        <a href="javascript:void(0);" class="text-body">Aucun évenement récent.</a>
                    </div>
                </div>
                <?php } ?>
                </div>
            </div>   
        </div>
    </div>
</div>
<?php require('inc/footer_panel.php'); ?>
