<?php
require('inc/check_vip.php');
require('inc/fonctions.php');

if (!check_login()){
    header('Location: /connexion');
    exit();
}

if(isset($_POST['generer'])){
    $_SESSION['token_gen'] = time();
    if ($utilisateur['grade'] == 1) {
        if(isset($_POST['linkvert'])){
            $genid = htmlspecialchars($_POST['generer']);
            $aprespub = '/captcha?id='.$genid;
            $url = '&url='.$aprespub;
            header('Location: '.$url);
        }
    } else {
        $genid = htmlspecialchars($_POST['generer']);
        $url = '/captcha?id='.$genid;
        header('Location: '.$url);
    }
}

if (!permissions($utilisateur['grade'], 'vipcheck')) {
    header('Location: /false');
    exit();
}

$title = 'Générateurs VIP';
require('inc/header_panel.php');

// Menu a gauche
require('inc/menu_panel.php');

// Menu en haut
require('inc/menu_haut.php');
?>
<!-- <audio autoplay>
    <source src="http://djnaly.yo.fr/sounds/-fort-boyard-audio-cutter.mp3" type="audio/mp3">
</audio> -->

<div id="preloader">
            <div id="status">
                <div class="bouncing-loader"><div ></div><div ></div><div ></div></div>
            </div>
        </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">FreeGen</a></li>
                        <li class="breadcrumb-item"><a href="/">Manager</a></li>
                        <li class="breadcrumb-item active">Générateurs VIP</li>
                    </ol>
                    </div>
                <h4 class="page-title">Générateurs VIP <i class=" uil-spade  text-primary "></i></h4>
            </div>
                </div>
            </div>
        </div>
        

        <div class="row">
        <?php
        $getGenMEA = get_generateurvip_MEA();
        while ($generateurvip = $getGenMEA->fetch()) {
            $stockvip = get_stockvip($generateurvip['id']);

        ?>
        <div class="col-md-6 col-xl-3">

            <div class="card d-block">
                <img class="card-img-top" width="10" src="<?=$generateurvip['icon_gif'] ?>" alt="<?=$generateurvip['nom'] ?>">
                
                <div class="card-img-overlay">
                    <?php if ($stockvip >= 1) { ?>
                    <div class="badge badge-success p-1">En stock</div>
                    <?php } else { ?>
                    <div class="badge badge-danger p-1">Hors stock</div>
                    <?php } ?>
                </div>
                <div class="card-body position-relative">
                    <h4 class="mt-0">
                        <a href="#" class="text-title"><?=$generateurvip['nom'] ?> </a>
                    </h4>
                    <p class="mb-3">
                        <span class="pr-2 text-nowrap">
                            <i class="mdi mdi-format-list-bulleted-type"></i>
                            <b><?=$stockvip ?></b> Comptes restants
                        </span>
                        <span class="text-nowrap">
                            <?php if ($generateurvip['verouillage'] == 1) { ?>
                                <button class="btn btn-warning text-white" disabled>Verrouillé</button>
                            <?php } elseif ($stockvip == 0) { ?>
                                <button class="btn btn-danger text-white" disabled>Hors stock</button>
                                <?php } elseif (check_statut_genvip($stockvip, $utilisateur['grade'], $generateurvip['id'])) { 
                                                if($generateurvip['linkvertise'] !== "0"){
                                            ?>
                                                <form method="POST">
                                                    <button type="sumbit" value="<?= $generateurvip['id'] ?>" name="generer" class="btn btn-success text-white">Générer</button>
                                                </form>
                                            <?php
                                                }else{
                                            ?>
                                                <form method="POST"><button type="sumbit" value="<?= $generateurvip['id'] ?>" name="generer" class="btn btn-success text-white">Générer</button></form>
                                            <?php
                                                }
                                            ?>
                                            <?php } else { ?>
                                                <a href="/vip" class="btn btn-warning text-white">Réservé aux VIP</a>
                                            <?php } ?>
                        </span>
                    </p>
                    <p class="mb-2 font-weight"><?=coupePhrase($generateurvip['description'], 140) ?></p>
                    <div class="progress progress-sm">
                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="10000" style="width:<?=$stockvip ?>%"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Générateurs</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <tbody>
                                <?php
                                $getGen = get_generateurvip();
                                while ($generateurvip = $getGen->fetch()) {
                                    $stockvip = get_stockvip($generateurvip['id']);
                                    
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <img class="mr-2 rounded-circle" src="<?=$generateurvip['icon'] ?>" width="40"/>
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-1"><?=$generateurvip['nom'] ?><small class="font-weight-normal ml-3 swipez"></small></h5>
                                                    <span class="font-13"><?=coupePhrase($generateurvip['description'], 110) ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-muted font-13">
                                                <i class="mdi mdi-link-variant"></i> <?php if ($utilisateur['grade'] == 1) { ?>Avec publicité<?php } else { ?>Sans publicité<?php } ?>
                                            </span>
                                            <br>
                                            <p class="mb-0"><i class="mdi mdi-format-list-bulleted-type"></i> <?=$stockvip ?> comptes en stock</p>
                                        </td>
                                        <td class="table-action" style="width:50px">
                                            <?php if ($generateurvip['verouillage'] == 1) { ?>
                                                <button class="btn btn-warning text-white" disabled>Verrouillé</button>
                                            <?php } elseif ($stockvip == 0) { ?>
                                                <button class="btn btn-danger text-white" disabled>Hors stock</button>
                                            <?php } elseif (check_statut_genvip($stockvip, $utilisateur['grade'], $generateurvip['id'])) { 
                                                if($generateurvip['linkvertise'] !== "0"){
                                            ?>
                                                <form method="POST">
                                                    <button type="sumbit" value="<?= $generateurvip['id'] ?>" name="generer" class="btn btn-success text-white">Générer</button>
                                                    <input type="hidden" name="linkvert" value="<?= $generateurvip['linkvertise'] ?>"></input>
                                                </form>
                                            <?php
                                                }else{
                                            ?>
                                                <form method="POST"><button type="sumbit" value="<?= $generateurvip['id'] ?>" name="generer" class="btn btn-success text-white">Générer</button></form>
                                            <?php
                                                }
                                            ?>
                                            <?php } else { ?>
                                                <a href="/vip" class="btn btn-warning text-white">Réservé aux VIP</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('inc/footer_panel.php'); ?>