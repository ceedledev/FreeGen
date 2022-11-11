<?php
// Sessions


if (session_status() == PHP_SESSION_NONE) {
    $lifetime = 0;
    $path = '/';
    $domain = "freegen.freemembersplus.fr";
    $secure = true;
    $httponly = true;
    
    session_set_cookie_params($lifetime, $path, $domain, $secure, $httponly);

    session_start();
}

// Erreurs
error_reporting(E_ALL);
ini_set('display_errors', true);

// Base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=admin;charset=utf8', 'user_db', '');
} catch(Exception $e) {
    // header('Location: /maintenance');
    exit();
    die('Erreur : '.$e->getMessage());
}

// Timezone
date_default_timezone_set('Europe/Paris');

// Vérification du domaine
$domaine = 'https://'.$_SERVER['HTTP_HOST'].'';

// Clé pour la génération du cookie de reconnexion
$cle_cookie = 'Vj9n8VNY@]jL-93Fs%s4Qs_45]J5@)';

// Suppression de grade
$bdd->query('UPDATE membres SET grade = 1, expiration = null WHERE expiration <= NOW()');

// Remise à zéro des générations
$bdd->query('UPDATE membres SET generations_jour = 0 WHERE derniere_generation < DATE_SUB(NOW(),INTERVAL 1 DAY)');

// Suppression du token de récuperation
$bdd->query('DELETE FROM recuperation WHERE date_time <= DATE_SUB(NOW(),INTERVAL 2 DAY)');



// Reconnexion auto
if (!isset($_SESSION['id']) AND !isset($_SESSION['motdepasse']) AND !empty($_COOKIE['sesouvenir'])) {
    $sesouvenir = json_decode(openssl_decrypt($_COOKIE['sesouvenir'], 'AES-128-ECB', $cle_cookie), true);

    if (!empty($sesouvenir['id']) AND !empty($sesouvenir['motdepasse'])) {
        $req = $bdd->prepare('SELECT * FROM membres WHERE id = ? AND motdepasse = ?');
        $req->execute(array($sesouvenir['id'], $sesouvenir['motdepasse']));
        
        if ($req->rowCount() == 1) {
            $r = $req->fetch();
            
            $_SESSION['id'] = $r['id'];
            $_SESSION['pseudo'] = $r['pseudo'];
            $_SESSION['motdepasse'] = $r['motdepasse'];
        }
    }
}

// Vérification de la connexion
if (!empty($_SESSION['id']) AND !empty($_SESSION['motdepasse'])) {
	$req = $bdd->prepare('SELECT * FROM membres WHERE id = ? AND motdepasse = ?');
	$req->execute(array($_SESSION['id'], $_SESSION['motdepasse']));
	
	if ($req->rowCount() == 1) {
        $utilisateur = $req->fetch();

        if ($utilisateur['banni'] == 1) {
            $deconnexion = '/connexion';
        }
    } else {
        $deconnexion = '/connexion';
    }
}


// Upload
if (!empty($utilisateur['grade']) AND $utilisateur['grade'] == '10') {
    $taille = '5'; // En MO
    $extensions = array('jpeg', 'jpg', 'png', 'gif');
} else {
    $taille = '1'; // En MO
    $extensions = array('jpeg', 'jpg', 'png');
}

// Token pour formulaire
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
}

// Vérification Maintenance
if ($_SERVER['PHP_SELF'] != '/connexion.php' AND $_SERVER['PHP_SELF'] != '/async/connexion.php') {
    $req = $bdd->prepare('SELECT valeur FROM parametres WHERE nom = ?');
    $req->execute(array('maintenance'));
    $r = $req->fetch();

    if ($r['valeur'] == 1) {
        if (!empty($_SESSION['id'])) {
            $req = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
            $req->execute(array($_SESSION['id']));
            $r = $req->fetch();
    
            if ($r['grade'] < 7) {
                $deconnexion = '/maintenance';
            }
        } else {
            header('Location: /maintenance');
        }
    }
}

if (!empty($deconnexion)) {
    $_SESSION = array();
    session_destroy();
    setcookie('sesouvenir', null, -1, '/', $_SERVER['HTTP_HOST'], true, true);
    header('Location: '.$deconnexion);
    exit();
}


