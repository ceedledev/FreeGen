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
                        <li class="breadcrumb-item active">Timeline</li>
                    </ol>
                </div>
                <h4 class="page-title">Timeline</h4>
            </div>
        </div>
    </div>
<div class="row">
                            <div class="col-12">
                                <div class="timeline" dir="ltr">

                                    <div class="timeline-show mb-3 text-center">
                                        <h5 class="m-0 time-show-name">2022</h5>
                                    </div>

                                    <div class="timeline-lg-item timeline-item-left">
                                        <div class="timeline-desk">
                                            <div class="timeline-box">
                                                <span class="arrow-alt"></span>
                                                <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                                <h4 class="mt-0 mb-1 font-16">Merci à nos utilisateurs !</h4>
                                                <p class="text-muted"><small>18 Juin 2022</small></p>
                                                <p>Merci à tous d'utilisé FreeGen, et de rendre actifs le site sans vous on n'en serait pas là aujourd'hui ! Merci à tous nos VIP qui soutiennent notre site et qui permet de le maintenir en ligne !</p>

                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">👍 12k</a>
                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">❤️ 10k</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="timeline-lg-item timeline-item-right">
                                        <div class="timeline-desk">
                                            <div class="timeline-box">
                                                <span class="arrow"></span>
                                                <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                                <h4 class="mt-0 mb-1 font-16">Merci à notre équipes !</h4>
                                                <p class="text-muted"><small>18 Juin 2022</small></p>
                                                <p>Merci à nos <a href="#">Administrateurs</a>, <a href="#"> Responsable</a>,<a href="#"> Modérateur</a>,<a href="#"> Fournisseurs</a>, <a href="#">Support</a>, qui aide FreeGen à avancer chaque jour !</p>

                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">🎉 10k</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="timeline-show my-3 text-center">
                                        <h5 class="m-0 time-show-name">2019</h5>
                                    </div>

                                    <div class="timeline-lg-item timeline-item-left">
                                        <div class="timeline-desk">
                                            <div class="timeline-box">
                                                <span class="arrow-alt"></span>
                                                <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                                <h4 class="mt-0 mb-1 font-16">Toute l'équipes FreeGen !</h4>
                                                <p class="text-muted"><small>12 Juin 2019</small></p>
                                                <p>Vous remercier, de votre confiance et de votre fidélité envers FreeGen, depuis 2016 !</p>

                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">🏆 1k</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="timeline-lg-item timeline-item-right">
                                        <div class="timeline-desk">
                                            <div class="timeline-box">
                                                <span class="arrow"></span>
                                                <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                                <h4 class="mt-0 mb-1 font-16">Deuxième version de FreeGen !</h4>
                                                <p class="text-muted"><small>20 Avril 2019</small></p>
                                                <p>Voici la deuxième version de FreeGen. La version que tout le monde à connu et qui n'a pas encore changé jusqu'à maintenant !</p>

                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">👍 1.4k</a>
                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">🎉 2k</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="timeline-lg-item timeline-item-left">
                                        <div class="timeline-desk">
                                            <div class="timeline-box">
                                                <span class="arrow-alt"></span>
                                                <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                                <h4 class="mt-0 mb-1 font-16">FreeGen s'est fais connaître !</h4>
                                                <p class="text-muted"><small>17 Mars 2019</small></p>
                                                <p>Effectivement FreeGen, à fait le buzz lors du confinement ou beaucoup de personne étais à la recherche de comptes gratuitement !</p>

                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">❤️ 1k</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="timeline-show my-3 text-center">
                                        <h5 class="m-0 time-show-name">2016</h5>
                                    </div>

                                    <div class="timeline-lg-item timeline-item-right">
                                        <div class="timeline-desk">
                                            <div class="timeline-box">
                                                <span class="arrow"></span>
                                                <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                                <h4 class="mt-0 mb-1 font-16">Première version de FreeGen !</h4>
                                                <p class="text-muted"><small>18 juillet 2016</small></p>
                                                <p>Seuls les vrais ont connu la première version de FreeGen :). Merci à tous ceux qui nous suivent depuis 2016. Vous êtes les meilleurs !</p>

                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">🎉 1.4k</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="timeline-lg-item timeline-item-left">
                                        <div class="timeline-desk">
                                            <div class="timeline-box">
                                                <span class="arrow-alt"></span>
                                                <span class="timeline-icon"><i class="mdi mdi-adjust"></i></span>
                                                <h4 class="mt-0 mb-1 font-16">Création de FreeGen !</h4>
                                                <p class="text-muted"><small>16 juillet 2016</small></p>
                                                <p>Eh oui FrankMichelle, FreeGen a fait son apparition le 16 juillet 2016.</p>

                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">🎉 10k</a>
                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">👍 3.2k</a>
                                                <a href="javascript: void(0);" class="btn btn-sm btn-light">❤️ 7.1k</a>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- end timeline -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->
                </div>
                <?php require('inc/footer_panel.php'); ?>