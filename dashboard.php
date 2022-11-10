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

</div><div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">FreeGen</a></li>
                        <li class="breadcrumb-item"><a href="/">Manager</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard <i class="uil-cloud-computing text-primary"></i></h4>
            </div>
        </div>
    </div>

    <div class="row">

<div class="col-md-6 col-xl-3">
<div class="card d-block">
<img class="card-img-top" width="400" src="https://i.imgur.com/MD3Tcb4.gif"></a>
</div>
</div>

<div class="col-md-6 col-xl-3">
<div class="card d-block">
<img class="card-img-top" width="400" src="https://i.imgur.com/wrFrFyp.gif"></a>
</div>
</div>

<div class="col-md-6 col-xl-3">
<div class="card d-block">
<img class="card-img-top" width="400" src="https://i.imgur.com/G1fje6A.gif"></a>
</div>
</div>

<div class="col-md-6 col-xl-3">
<div class="card d-block">
<img class="card-img-top" width="400" src="https://i.imgur.com/fDuHdHl.gif"></a>
</div>

    </div>
    </div>
         <div class="col-md-12">
			
                            <div class="box">
                                <div class="card">
                                                    <div>
                                                            <div class="box-body ribbon-box">
                                            <div class="ribbon-two ribbon-two-info"><span>Bienvenue</span></div>
                                                        <div class="row">
                                                            <div class="col-lg-9 col-sm-8">
                                                                <div class="p-4">
                                                                    <h5 class="text-success">Bienvenue sur la version officielle de FreeGen, <?=$_SESSION['pseudo'] ?> !
                </h5>
                                                                    <p>#1 - Générateur européen.</p>
                
                                                                    <div class="text-muted">
                                                                        <p class="mb-1"><i class="fa fa-circle align-middle text-primary mr-1"></i> Plus de 60 types de comptes.</p>
                                                                        <p class="mb-1"><i class="fa fa-circle align-middle text-primary mr-1"></i> Des restocks de comptes réguliers.</p>
                                                                        <p class="mb-1"><i class="fa fa-circle align-middle text-primary mr-1"></i> Des tarifs pour vous satisfaire aux meilleurs prix !</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-sm-4 align-self-center">
                                                                <div>
                                                                    <img src="https://i.ibb.co/mN40t5g/img-1.png" alt="" class="img-fluid d-block">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                    </div></div>

    <div class="row">
        <div class="col-12">
            <div class="card widget-inline">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center">
                                    <i class="dripicons-user-group text-muted" style="font-size:24px"></i>
                                    <h3><span><?=get_utilisateurs() ?></span></h3>
                                    <p class="text-muted font-15 mb-0">Utilisateurs inscrits</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-checklist text-muted" style="font-size:24px"></i>
                                    <h3><span><?=get_generateurs() ?></span></h3>
                                    <p class="text-muted font-15 mb-0">Générateurs</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-box text-muted" style="font-size:24px"></i>
                                    <h3><span><?=get_user_gen($utilisateur['id']) ?></span></h3>
                                    <p class="text-muted font-15 mb-0">Vos générations</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <i class="dripicons-graph-line text-muted" style="font-size:24px"></i>
                                    <h3><span><?=get_generations_g() ?></span> <i class="mdi mdi-arrow-up text-success"></i></h3>
                                    <p class="text-muted font-15 mb-0">Générations globales</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <?php if (activation_maintenance()) {
        $req = $bdd->query('SELECT * FROM alerts WHERE connecte = 1 AND affiche = 1 ORDER BY id DESC');
        while($r = $req->fetch()) {
        ?>
        <div class="col-xl-12 col-lg-12">
            <div class="card cta-box bg-<?=$r['type'] ?> text-white">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <h3 class="mt-0"><i class="mdi mdi-bullhorn-outline" style="font-size:40px"></i>&nbsp;</h3>
                            <h3 class="m-0 font-weight-normal cta-box-title"><?=$r['titre'] ?> <?=$r['contenu'] ?><i class="mdi mdi-arrow-right"></i></h3>
                        </div>
                        <img class="ml-3" src="https://media.discordapp.net/attachments/1034890640410034286/1038833496069787688/HII.png" width="100"/>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    <?php } else { ?>
        <div class="col-xl-12 col-lg-12">
            <div class="card cta-box bg-danger text-white">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <h2 class="mt-0"><i class="mdi mdi-cogs"></i>&nbsp;</h2>
                            <h3 class="m-0 font-weight-normal cta-box-title">Le générateur est en <b>maintenance</b>. Seuls les Admins, Responsables et Fournisseurs peuvent se connecter. <i class="mdi mdi-arrow-right"></i></h3>
                        </div>
                        <img class="ml-3" src="/assets/images/maintenance.svg" width="120"/>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
        <div class="col-xl-12 col-lg-12">
		<div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
						</div>
                    </div>
                </div>
            </div>
	    </div>

<?php require('inc/footer_panel.php'); ?>