<?php
require('inc/fonctions.php');

if (!check_login()){
    header('Location: /connexion');
    exit();
}

$title = 'Classement';
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
                        <li class="breadcrumb-item active">Classement</li>
                    </ol>
                </div>
                <h4 class="page-title">Classement</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="header-title mt-0 mb-3">Classement des 10 premiers farmeurs</h4> 
                <div class="tab-content">
                    <div class="tab-pane show active" id="striped-rows-preview">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Utilisateur</th>
                                            <th>Générations</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $getFarm = get_farmeurs();
                                        while ($farm = $getFarm->fetch()) {
                                        ?>
                                        <tr>
                                            <td class="table-user">
                                                <?php if (!empty($farm['avatar'])) { ?>
                                                <img src="<?=$farm['avatar'] ?>" class="mr-2 rounded-circle"/>
                                                <?php } else { ?>
                                                <img src="/assets/images/avatar.jpg" class="mr-2 rounded-circle"/>
                                                <?php } ?>
                                                <?=$farm['pseudo'] ?>
                                            </td>
                                            <td><span class="badge badge-primary"><?=$farm['generations'] ?></span></td>
                                            <td><?=get_grade($farm['id'], 'lettres') ?></td>
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
