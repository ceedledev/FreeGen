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
                        <li class="breadcrumb-item active">F.A.Q</li>
                    </ol>
                </div>
                <h4 class="page-title">F.A.Q</h4>
            </div>
        </div>
    </div>

<div class="row">
             <div class="col-sm-12">
                 <br>
                 <br>
    
                                </div>
                            </div><!-- end col -->
                        
        
                        <div class="row pt-20">
                            <div class="col-lg-10 offset-lg-1">
                                <!-- Question/Answer -->
                                <div>
									      <div class="text-center">
                                    <h3 class="">Questions fréquemment posées</h3>
                                    <p class="text-muted mt-3">Nous remarquons que beaucoup d'entre vous se posent les mêmes questions, notre équipe de support vous à concocté vos questions les plus demandées. Si vous avez toujours besoin d'aide après ça.</p>
        
                                 <a href="https://discord.gg/" class="btn btn-success btn-sm mt-2" data-cf-modified-a1999ced2180f541624fe3e5-=""><i class="mdi mdi-email-outline mr-1"></i> Contactez le Support</button>
                                 <a href="https://twitter.com/FreeGenBinks_" class="btn btn-info btn-sm mt-2 ml-1"><i class="mdi mdi-twitter mr-1"></i> Tweetez nous</a>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
        
                        <div class="row pt-5">
                            <div class="col-lg-5 offset-lg-1">
                                <!-- Question/Answer -->
                                <div>
                                    <div class="faq-question-q-box">Q.</div>
                                    <h4 class="faq-question" data-wow-delay=".1s">Les comptes sont ajoutés tout les combien de temps ?</h4>
                                    <p class="faq-answer mb-4">Eh bien  FrankMichelle, nous n'avons pas de date précise pour les remise en stock, dès qu'on peux en donner une nous prévenons maximum 1 jour à l'avance.</p>
                                </div>
        
                                <!-- Question/Answer -->
                                <div>
                                    <div class="faq-question-q-box">Q.</div>
                                    <h4 class="faq-question">Pourquoi il est marqué "Réservé au VIP" ?</h4>
                                    <p class="faq-answer mb-4">Toutes les catégories de comptes sont disponibles pour tout les grades jusqu'a ce que le stock atteigne 20, après ce seuil le générateur passe en "Réservé au VIP".</p>
                                </div>
        
                                <!-- Question/Answer -->
                                <div>
                                    <div class="faq-question-q-box">Q.</div>
                                    <h4 class="faq-question">Pourquoi le générateur [...] est désactivé ?</h4>
                                    <p class="faq-answer mb-4">Le générateur peut être désactivé pour plusieurs raisons, attente de restock, problèmes avec le stock, mise à jour du générateur...</p>
                                </div>
        
                                <!-- Question/Answer -->
                                <div>
                                    <div class="faq-question-q-box">Q.</div>
                                    <h4 class="faq-question" data-wow-delay=".1s">Combien de comptes puis-je générer par jour ?</h4>
                                    <p class="faq-answer mb-4">Les générations journalières varient en fonction des grades, Utilisateur: 25, Starter & Premium: 50, et Giant: 65.</p>
                                </div>
        
                            </div>
                            <!--/col-md-5 -->
        
                            <div class="col-lg-5">
                                <!-- Question/Answer -->
                                <div>
                                    <div class="faq-question-q-box">Q.</div>
                                    <h4 class="faq-question">Pourquoi mon compte ne fonctionne pas ?</h4>
                                    <p class="faq-answer mb-4">Tout les comptes sont vérifies avant un certain temps les gens savent quand une personne se connecte sur leur compte et sont obligée de changer de mot de passe.</p>
                                </div>
        
                                <!-- Question/Answer -->
                                <div>
                                    <div class="faq-question-q-box">Q.</div>
                                    <h4 class="faq-question">Quand j'essaye de générer un compte, un pop-up s'affiche au milieu de la page ?</h4>
                                    <p class="faq-answer mb-4">Ce problème survient lorsque tu possèdes un bloqueur de publicité (AdBlock...), ces publicités contribuent au paiement du site et sont nécessaires.</p>
                                </div>
        
                                <!-- Question/Answer -->
                                <div>
                                    <div class="faq-question-q-box">Q.</div>
                                    <h4 class="faq-question">Je n'arrive pas à générer de compte, j'utilise Brave comme navigateur ?</h4>
                                    <p class="faq-answer mb-4">Le site ne marche malheureusement pas avec Brave, la seule solution est de changer de navigateur.</p>
                                </div>
        
                                <!-- Question/Answer -->
                                <div>
                                    <div class="faq-question-q-box">Q.</div>
                                    <h4 class="faq-question">J'ai généré des comptes en trop, puis-je les mettre en vente ?</h4>
                                    <p class="faq-answer mb-4">La revente de comptes est strictement interdite et sanctionnée d'un ban PERMANENT du discord et du site Freegen.</p>
                                </div>
        
        
                                
                            
                            <!--/col-md-5-->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->

            </div>

            <?php require('inc/footer_panel.php'); ?>