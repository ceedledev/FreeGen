<?php
require('inc/fonctions.php');

if (!check_login()){
    header('Location: /connexion');
    exit();
}

if (empty($_GET['id']) OR !is_numeric($_GET['id'])) {
    header('Location: /');
    exit();
}

if ($utilisateur['grade'] == 1) {
    if (!empty($_SESSION['token_gen'])) {
        if ($_SESSION['token_gen'] < time()-10 AND $_SESSION['token_gen'] > time()-600) {
            if (!isset($_POST['generer'])){

                if(strpos($_SERVER['HTTP_REFERER'], 'exey.io') != (7 OR 8)){
                    if(!isset($_SESSION['token_lv'])){
                        header('Location: /');
                        exit();
                    }else{
                        if($_SESSION['token_gen'] > time()-70){
                            header('Location: /');
                            exit();
                        }
                    }
                }
            }
        } else {
            unset($_SESSION['token_gen']);
            if(isset($_SESSION['token_lv'])){
                unset($_SESSION['token_lv']);
            }
            header('Location: /');
            exit();
        }
    } else {
        header('Location: /');
        exit();
    }
} else {
    if (!empty($_SESSION['token_gen'])) {
        if ($_SESSION['token_gen'] > time()-180) {
        } else {
            unset($_SESSION['token_gen']);
            if(isset($_SESSION['token_lv'])){
                unset($_SESSION['token_lv']);
            }
            header('Location: /');
            exit();
        }
    } else {
        header('Location: /');
        exit();
    }
}

if (isset($_POST['generer'])) {
    if (recaptcha()) {
        $id = htmlspecialchars($_GET['id']);

        $req = $bdd->prepare('SELECT * FROM generateurs WHERE id = ?');
        $req->execute(array($id));
        $generateur = $req->fetch();

        $stock = get_stock($id);

        $req = $bdd->prepare('SELECT valeur FROM parametres WHERE nom = ?');
        $req->execute(array('generations_non_vip'));
        $limite_nvip = $req->fetch();

        $req = $bdd->prepare('SELECT valeur FROM parametres WHERE nom = ?');
        $req->execute(array('generations_StarterPro'));
        $limite_starterPro = $req->fetch();

        $req = $bdd->prepare('SELECT valeur FROM parametres WHERE nom = ?');
        $req->execute(array('generations_giant'));
        $limite_giant = $req->fetch();

        $req = $bdd->prepare('SELECT valeur FROM parametres WHERE nom = ?');
        $req->execute(array('generations_booster'));
        $limite_boost = $req->fetch();

        if ($generateur['verouillage'] == 0) {
            if ($stock > 0) {
                if (check_statut_gen($stock, $utilisateur['grade'], $id)) {
                    // Limite utilisateurs
                    if($utilisateur['grade'] == 1){
                        if ($utilisateur['generations_jour'] <= $limite_nvip['valeur']) {
                            $req = $bdd->query('SELECT * FROM '.$generateur['table_stockage'].' ORDER BY rand() LIMIT 1');
                            $compte = $req->fetch();

                            $req = $bdd->prepare('DELETE FROM '.$generateur['table_stockage'].' WHERE id = ?');
                            $req->execute(array($compte['id']));

                            $req = $bdd->prepare('INSERT INTO historiques (id_utilisateur, type, compte, favori, date_time) VALUES (?, ?, ?, ?, NOW())');
                            $req->execute(array($utilisateur['id'], $generateur['nom'], $compte['compte'], 0));

                            $req = $bdd->prepare('UPDATE parametres SET valeur = valeur+1 WHERE nom = ?');
                            $req->execute(array('generations_totales'));

                            $req = $bdd->prepare('UPDATE membres SET generations = generations+1, generations_jour = generations_jour+1, derniere_generation = NOW() WHERE id = ?');
                            $req->execute(array($utilisateur['id']));
                            
                            unset($_SESSION['token_gen']);
                            if(isset($_SESSION['token_lv'])){
                                unset($_SESSION['token_lv']);
                            }
                            header('Location: /generation?id='.$generateur['id'].'&compte='.$compte['compte']);
                            exit();
                        } else {
                            $erreur['type'] = 'danger';
                            $erreur['message'] = 'Vous avez dépassé votre quota de générations par jour.';
                        }
                    // Limite boosters
                    }elseif($utilisateur['grade'] == 4){
                        if ($utilisateur['generations_jour'] <= $limite_boost['valeur']) {
                            $req = $bdd->query('SELECT * FROM '.$generateur['table_stockage'].' ORDER BY rand() LIMIT 1');
                            $compte = $req->fetch();

                            $req = $bdd->prepare('DELETE FROM '.$generateur['table_stockage'].' WHERE id = ?');
                            $req->execute(array($compte['id']));

                            $req = $bdd->prepare('INSERT INTO historiques (id_utilisateur, type, compte, favori, date_time) VALUES (?, ?, ?, ?, NOW())');
                            $req->execute(array($utilisateur['id'], $generateur['nom'], $compte['compte'], 0));

                            $req = $bdd->prepare('UPDATE parametres SET valeur = valeur+1 WHERE nom = ?');
                            $req->execute(array('generations_totales'));

                            $req = $bdd->prepare('UPDATE membres SET generations = generations+1, generations_jour = generations_jour+1, derniere_generation = NOW() WHERE id = ?');
                            $req->execute(array($utilisateur['id']));
                            
                            unset($_SESSION['token_gen']);
                            if(isset($_SESSION['token_lv'])){
                                unset($_SESSION['token_lv']);
                            }
                            header('Location: /generation?id='.$generateur['id'].'&compte='.$compte['compte']);
                            exit();
                        } else {
                            $erreur['type'] = 'danger';
                            $erreur['message'] = 'Vous avez dépassé votre quota de générations par jour pour le grade booster.';
                        }
                    }elseif($utilisateur['grade'] == 2){
                        if ($utilisateur['generations_jour'] <= $limite_starterPro['valeur']) {
                            $req = $bdd->query('SELECT * FROM '.$generateur['table_stockage'].' ORDER BY rand() LIMIT 1');
                            $compte = $req->fetch();

                            $req = $bdd->prepare('DELETE FROM '.$generateur['table_stockage'].' WHERE id = ?');
                            $req->execute(array($compte['id']));

                            $req = $bdd->prepare('INSERT INTO historiques (id_utilisateur, type, compte, favori, date_time) VALUES (?, ?, ?, ?, NOW())');
                            $req->execute(array($utilisateur['id'], $generateur['nom'], $compte['compte'], 0));

                            $req = $bdd->prepare('UPDATE parametres SET valeur = valeur+1 WHERE nom = ?');
                            $req->execute(array('generations_totales'));

                            $req = $bdd->prepare('UPDATE membres SET generations = generations+1, generations_jour = generations_jour+1, derniere_generation = NOW() WHERE id = ?');
                            $req->execute(array($utilisateur['id']));
                            
                            unset($_SESSION['token_gen']);
                            if(isset($_SESSION['token_lv'])){
                                unset($_SESSION['token_lv']);
                            }
                            header('Location: /generation?id='.$generateur['id'].'&compte='.$compte['compte']);
                            exit();
                        } else {
                            $erreur['type'] = 'danger';
                            $erreur['message'] = 'Vous avez dépassé votre quota de générations par jour pour le grade Starter ou VIP.';
                        }
                    }elseif($utilisateur['grade'] == 3){
                        if ($utilisateur['generations_jour'] <= $limite_starterPro['valeur']) {
                            $req = $bdd->query('SELECT * FROM '.$generateur['table_stockage'].' ORDER BY rand() LIMIT 1');
                            $compte = $req->fetch();

                            $req = $bdd->prepare('DELETE FROM '.$generateur['table_stockage'].' WHERE id = ?');
                            $req->execute(array($compte['id']));

                            $req = $bdd->prepare('INSERT INTO historiques (id_utilisateur, type, compte, favori, date_time) VALUES (?, ?, ?, ?, NOW())');
                            $req->execute(array($utilisateur['id'], $generateur['nom'], $compte['compte'], 0));

                            $req = $bdd->prepare('UPDATE parametres SET valeur = valeur+1 WHERE nom = ?');
                            $req->execute(array('generations_totales'));

                            $req = $bdd->prepare('UPDATE membres SET generations = generations+1, generations_jour = generations_jour+1, derniere_generation = NOW() WHERE id = ?');
                            $req->execute(array($utilisateur['id']));
                            
                            unset($_SESSION['token_gen']);
                            if(isset($_SESSION['token_lv'])){
                                unset($_SESSION['token_lv']);
                            }
                            header('Location: /generation?id='.$generateur['id'].'&compte='.$compte['compte']);
                            exit();
                        } else {
                            $erreur['type'] = 'danger';
                            $erreur['message'] = 'Vous avez dépassé votre quota de générations par jour pour le grade GIANT.';
                        }
                    }else{
                        $req = $bdd->query('SELECT * FROM '.$generateur['table_stockage'].' ORDER BY rand() LIMIT 1');
                        $compte = $req->fetch();

                        $req = $bdd->prepare('DELETE FROM '.$generateur['table_stockage'].' WHERE id = ?');
                        $req->execute(array($compte['id']));

                        $req = $bdd->prepare('INSERT INTO historiques (id_utilisateur, type, compte, favori, date_time) VALUES (?, ?, ?, ?, NOW())');
                        $req->execute(array($utilisateur['id'], $generateur['nom'], $compte['compte'], 0));

                        $req = $bdd->prepare('UPDATE parametres SET valeur = valeur+1 WHERE nom = ?');
                        $req->execute(array('generations_totales'));

                        $req = $bdd->prepare('UPDATE membres SET generations = generations+1, generations_jour = generations_jour+1, derniere_generation = NOW() WHERE id = ?');
                        $req->execute(array($utilisateur['id']));
                            
                        unset($_SESSION['token_gen']);
                        if(isset($_SESSION['token_lv'])){
                            unset($_SESSION['token_lv']);
                        }
                        header('Location: /generation?id='.$generateur['id'].'&compte='.$compte['compte']);
                        exit();
                    }
                } else {
                    $erreur['type'] = 'danger';
                    $erreur['message'] = 'Le générateur n°'.$id.' est reservé au VIP.';
                }
            } else {
                $erreur['type'] = 'danger';
                $erreur['message'] = 'Le générateur n°'.$id.' est vide.';
            }
        } else {
            $erreur['type'] = 'warning';
            $erreur['message'] = 'Le générateur n°'.$id.' est actuellement verrouillé.';
        }
    } else {
        $erreur['message'] = 'Veuillez valider le captcha (anti-spam).';
        $erreur['type'] = 'danger';
    }
}

$title = 'Captcha';
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
                        <li class="breadcrumb-item active">Captcha</li>
                    </ol>
                </div>
                <h4 class="page-title">Vérification humaine</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php if (isset($erreur)) { ?>
                    <div class="alert bg-<?=$erreur['type'] ?> text-white">
                        <?php if ($erreur['type'] == 'danger') { echo '<i class="dripicons-wrong mr-2"></i>'; } else { echo '<i class="dripicons-warning mr-2"></i>'; } ?>
                        <?=$erreur['message'] ?>
                    </div>     
                    <?php } ?>
                    <h4 class="header-title mt-0 mb-3">Pour éviter les BOTS, un captcha a été mis en place.</h4>
                    <p class="text-muted font-13" id="message">On se doute bien que vous n'êtes pas un robot, mais bon qui sait ? :p</p>
                    <hr>
                    <form method="POST">
                        <div class="form-group">
                            <div class="g-recaptcha" data-theme="dark" data-sitekey="6LeG2eMiAAAAALoZNxBNuFnsm7BYKSOEu29PDHLD"></div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <input type="submit" name="generer" class="btn btn-primary" value="Valider"/>
                        </div>
                        <script src="https://www.google.com/recaptcha/api.js"></script>
                    </form>
                </div>
            </div>   
        </div>
    </div>
</div>
<?php require('inc/footer_panel.php'); ?>
