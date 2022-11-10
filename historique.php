<?php
require('inc/fonctions.php');

if (!check_login()){
    header('Location: /connexion');
    exit();
}

if (!empty($_GET['suppr']) AND is_numeric($_GET['suppr'])){
    $suppr = htmlspecialchars($_GET['suppr']);

    $modif = $bdd->prepare('UPDATE historiques SET favori = 0 WHERE id_utilisateur = ? AND favori = 1 AND id = ?');
    $modif->execute(array($utilisateur['id'], $suppr));

    $_SESSION['alert']['success'] = 'Favori supprimé.';
}

if (isset($_GET['favori']) && is_numeric($_GET['favori'])) {
    $favori = htmlspecialchars($_GET['favori']);

    $req = $bdd->prepare('SELECT * FROM historiques WHERE favori = 1 AND id_utilisateur = ?');
    $req->execute(array($utilisateur['id']));

    if ($req->rowCount() < 5) {
        $modif = $bdd->prepare('UPDATE historiques SET favori = 1 WHERE id_utilisateur = ? AND favori = 0 AND id = ?');
        $modif->execute(array($utilisateur['id'], $favori));

        $_SESSION['alert']['success'] = 'Favori ajouté.';
    } else {
        $_SESSION['alert']['danger'] = 'Vous ne pouvez pas mettre plus de 5 favoris.';
    }
}

$title = 'Historique';
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
                        <li class="breadcrumb-item active">Historique</li>
                    </ol>
                </div>
                <h4 class="page-title">Historique</h4>
                <?php if (isset($_SESSION['alert'])) { ?>
                    <?php foreach ($_SESSION['alert'] as $type => $message) { ?>
                        <div class="alert alert-dismissible bg-<?=$type ?> text-white">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php
                            if ($type == 'success') {
                                echo '<i class="dripicons-checkmark"></i>';
                            } else {
                                echo '<i class="dripicons-cross"></i>';
                            }
                            ?>
                            <?=$message ?>
                        </div>
                    <?php } ?>
                    <?php unset($_SESSION['alert']); ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="header-title mt-0 mb-3">Vos favoris</h4> 
                <div class="tab-content">
                    <div class="tab-pane show active" id="striped-rows-preview">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Générateur</th>
                                            <th>Compte</th>
                                            <th>Généré le</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $req = $bdd->prepare('SELECT * FROM historiques WHERE id_utilisateur = ? AND favori = 1 ORDER BY id DESC');
                                        $req->execute(array($utilisateur['id']));

                                        if ($req->rowCount() >= 1) {
                                            while ($r = $req->fetch()) {
                                                $date_time = new DateTime($r['date_time']);
                                                ?>
                                                <tr>
                                                    <td><?=$r['type'] ?></td>
                                                    <td><?=$r['compte'] ?></td>
                                                    <td><?=$date_time->format('d/m/y') ?></td>
                                                    <td class="table-action text-center">
                                                        <a href="?suppr=<?=$r['id'] ?>" class="action-icon text-danger"><i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td>Aucun favori</td>
                                                <td>Ajoutez en un en cliquant sur le bouton <i class="mdi mdi-plus text-success"></i></td>
                                                <td></td>
                                                <td></td>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="header-title mt-0 mb-3">Vos 10 derniers comptes générés</h4> 
                <div class="tab-content">
                    <div class="tab-pane show active" id="striped-rows-preview">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Générateur</th>
                                            <th>Compte</th>
                                            <th>Généré le</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $req = $bdd->prepare('SELECT * FROM historiques WHERE id_utilisateur = ? ORDER BY id DESC LIMIT 10');
                                        $req->execute(array($utilisateur['id']));
                                        
                                        if ($req->rowCount() >= 1) {
                                            while ($r = $req->fetch()) {
                                                $date_time = new DateTime($r['date_time']);
                                                ?>
                                                <tr>
                                                    <td><?=$r['type'] ?></td>
                                                    <td><?=$r['compte'] ?></td>
                                                    <td><?=$date_time->format('m/d/y') ?></td>
                                                    <?php if ($r['favori'] == 0) { ?>
                                                    <td class="table-action text-center">
                                                        <a href="?favori=<?=$r['id'] ?>" class="action-icon text-success"><i class="mdi mdi-plus"></i></a>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td class="table-action text-center">
                                                        <a href="?suppr=<?=$r['id'] ?>" class="action-icon text-danger"><i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td>Aucun compte généré</td>
                                                <td>Commencez dès maintenant, <a href="/">cliquez ici</a></td>
                                                <td></td>
                                                <td></td>
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
    </div>
</div>
<?php require('inc/footer_panel.php'); ?>