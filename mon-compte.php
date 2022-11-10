<?php
require('inc/fonctions.php');

if (!check_login()){
    header('Location: /connexion');
    exit();
}

$title = 'Mon compte';
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
                        <li class="breadcrumb-item active">Mon Compte</li>
                    </ol>
                </div>
                <h4 class="page-title">Mon Compte</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body profile-user-box">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="media">
                                <span class="float-left m-2 mr-4">
                                    <?php if (!empty($utilisateur['avatar'])) { ?>
                                        <img src="<?=$utilisateur['avatar'] ?>" style="width:100px;height:100px" class="rounded-circle img-thumbnail">
                                    <?php } else { ?>
                                        <img src="/assets/images/avatar.jpg" style="width:100px;height:100px" class="rounded-circle img-thumbnail">
                                    <?php } ?>
                                </span>
                                <div class="media-body">
                                    <h4 class="mt-1 mb-1 text-white"><?=$utilisateur['pseudo'] ?></h4>
                                    <p class="font-13 text-white-50"><?=get_grade($utilisateur['id'], 'lettres') ?></p>

                                    <ul class="mb-0 list-inline text-light">
                                        <li class="list-inline-item mr-3">
                                            <h5 class="mb-1 text-white"><?=get_user_gen($utilisateur['id']) ?></h5>
                                            <p class="mb-0 font-13 text-white-50">Vos générations</p>
                                        </li>
                                        <li class="list-inline-item mr-3">
                                            <h5 class="mb-1 text-white"><?= $utilisateur['generations_jour'] ?></h5>
                                            <p class="mb-0 font-13 text-white-50">Générations aujourd'hui</p>
                                        </li>
                                        <?php if (get_grade($utilisateur['id']) == 2 OR get_grade($utilisateur['id']) == 3) { ?>
                                        <li class="list-inline-item">
                                            <h5 class="mb-1"><?=strftime('%d/%m/%Y', strtotime($utilisateur['expiration'])) ?></h5>
                                            <p class="mb-0 font-13 text-white-50">Expiration de votre grade</p>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php if (get_grade($utilisateur['id']) == 1) { ?>            
                        <div class="col-sm-4">
                            <div class="text-center mt-sm-0 mt-3 text-sm-right">
                                <a class="btn btn-warning text-white" href="/vip">
                                    <i class="mdi mdi-piggy-bank mr-1"></i> Passer VIP
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Informations personnelles</h4>
                    <p class="text-muted font-13" id="message">Modifiez et regardez vos informations personnelles dans un même endroit !</p>
                    <div id="alert"></div>
                    <hr>
                    <form method="POST" enctype="multipart/form-data" async="mon-compte">
                        <div class="form-group">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" class="form-control" id="pseudo" value="<?=$utilisateur['pseudo'] ?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label for="mail">Adresse mail</label>
                            <input type="email" class="form-control" id="mail" name="mail" value="<?=$utilisateur['mail'] ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="motdepasse">Mot de passe</label>
                            <span class="text-muted float-right"><small>Vous serez déconnecté.</small></span>
                            <input type="password" class="form-control" id="motdepasse" name="motdepasse" autocomplete="off"/>
                        </div>
                        <div class="form-group">
                            <label>Avatar</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="avatar">Choisir un avatar</label>
                                    <?php if ($utilisateur['grade'] == 10) { ?>
                                    <input type="file" class="custom-file-input" id="avatar" name="avatar" accept="image/png, image/jpeg, image/gif"/>
                                    <?php } else { ?>
                                    <input type="file" class="custom-file-input" id="avatar" name="avatar" accept="image/png, image/jpeg"/>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="form-group">
                            <div class="progress progress-md">
                                <div class="progress-bar progress-bar-striped progress-bar-animated"></div>
                            </div>
                        </div>
                        -->
                        <script>
                        </script>
                        <div class="form-group text-center">
                            <input type="hidden" name="token" value="<?=$_SESSION['token'] ?>"/>
                            <input type="submit" class="btn btn-primary" value="Mettre à jour"/>
                        </div>
                    </form>
                    <!--
                    <div class="text-left">
                        <p class="text-muted mb-0"><strong>Elsewhere :</strong>
                            <a class="d-inline-block ml-2 text-muted" title="" data-placement="top" data-toggle="tooltip" href="" data-original-title="Facebook"><i class="mdi mdi-facebook"></i></a>
                            <a class="d-inline-block ml-2 text-muted" title="" data-placement="top" data-toggle="tooltip" href="" data-original-title="Twitter"><i class="mdi mdi-twitter"></i></a>
                            <a class="d-inline-block ml-2 text-muted" title="" data-placement="top" data-toggle="tooltip" href="" data-original-title="Skype"><i class="mdi mdi-skype"></i></a>
                        </p>
                    </div>
                    -->
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Vos informations de connexion</h4>
                    <hr/>
                    <div class="form-group">
                        <label for="ip_inscription">Adresse IP lors de votre inscription</label>
                        <input type="text" id="ip_inscription" class="form-control" value="<?=$utilisateur['ip_inscription'] ?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="date_time_inscription">Date de votre inscription</label>
                        <input type="text" id="date_time_inscription" class="form-control" value="<?=strftime('Le %d/%m/%Y à %H:%M', strtotime($utilisateur['date_time_inscription'])) ?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="date_time_connexion">Date de votre dernière connexion</label>
                        <input type="text" id="date_time_connexion" class="form-control" value="<?=strftime('Le %d/%m/%Y à %H:%M', strtotime($utilisateur['date_time_connexion'])) ?>" readonly/>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Historique des paiements</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-centered mb-0">
                            <thead>
                                <tr>
                                    
                                    <th>ID</th>
                                    <th>Grade</th>
                                    <th>Code Utilisé</th>
                                    <th>DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $req = $bdd->prepare('SELECT * FROM paiements WHERE id_user = ?');
                                $req->execute(array($utilisateur['id']));
                                $i = 0;
                                
                                while ($r = $req->fetch()) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $r['id'] ?></td>
                                    <td><span class="badge badge-primary"><?= $r['grade'] ?></span></td>
                                    <td><?= $r['code'] ?></td>
                                    <td><code><?= $r['date'] ?></code></td>
                                </tr>
                                <?php
                                }
                                
                                if($i == 0){
                                ?>
                                <tr>
                                    <td><span class="badge badge-warning"><i class="mdi mdi-alert"></i></span></td>
                                    <td>Aucun paiement trouvé</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card text-white bg-info overflow-hidden">
                <div class="card-body">
                    <div class="toll-free-box text-center">
                        <h4> <i class="mdi mdi-help"></i> Une question ? Rejoignez le <a href="https://discord.gg/">Discord</a></h4>
                    </div>
                </div>
            </div>
        </div>                     
    </div>
</div>
<?php require('inc/footer_panel.php'); ?>
