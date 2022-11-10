<?php
require('inc/fonctions.php');

if (!check_login()){
    header('Location: /connexion');
    exit();
}

$title = 'Erreur';
require('inc/header_panel.php');

// Menu a gauche
require('inc/menu_panel.php');

// Menu en haut
require('inc/menu_haut.php');
?>

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">

                            <div class="card-body p-4">
                                 <form method="POST" async="recuperation">
           <div class="form-group mb-3">

			      </div>
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold">Erreur VIP</h4>
                                       <p class="text-muted">Vous ne disposez pas du rôle VIP pour avoir le générateur VIP, voici notre  <a href="https://discord.gg/" class="text-muted ms-1"><b> discord si vous êtes intéressé de prendre en abonnement VIP </b></a></p>  
                                </div>

    
            <div class="text-center">
                <img src="https://cdn.discordapp.com/attachments/966443016585875506/1021044334298144888/startman.png" height="200"/>
                                    </svg>
									
                                </div> <!-- end logout-icon-->

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Retouner au <a href="/index" class="text-muted ms-1"><b>Générateur Gratuit</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
		                </div>
                        <?php require('inc/footer_panel.php'); ?>
