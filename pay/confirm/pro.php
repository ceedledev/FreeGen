<?php 

    require('../../inc/config.php');

    if (empty($_SESSION['id']) AND empty($_SESSION['pseudo']) AND empty($_SESSION['motdepasse'])) {
        header('Location: https://freegen.freemembersplus.fr/');
    }

    $code = isset($_POST['code']) ? preg_replace('/[^a-zA-Z0-9]+/', '', $_POST['code']) : '';

    if(empty($code)){

        $resultat['type'] = "error";
        $resultat['message'] = "Vous devez saisir un code.";
        $resultat['content'] = "Nous avons besoin d'un code pour compléter la transaction, veuillez recommencer le processus.";

    }else{
        $dedipass = file_get_contents('https://api.dedipass.com/v1/pay/?public_key=7b05421848dc672c35d15724bdadb4b0&private_key=04864b5f814043b052edfc208bc1f237919&code=' . $code); 
        $dedipass = json_decode($dedipass);

        if($dedipass->status == 'success') {
            // La transaction est validée et payée. 

            $resultat['type'] = "success";
            $resultat['message'] = "Paiement effectué !";
            $resultat['content'] = "Le code ".$code." à été utilisé pour un montant d'une valeur de ".$dedipass->payout." EUR pour le grade PRO";

            $now = date("Y-m-d H:i:s");
            $add = strtotime('+30 days');
            $expir = date("Y-m-d H:i:s", $add);

            
            $modif = $bdd->prepare('UPDATE membres SET grade = ?, expiration = ? WHERE id = ?');
            $modif->execute(array(2, $expir, $utilisateur['id']));

            $insert = $bdd->prepare('INSERT INTO paiements (id_user, grade, montant, code, date) VALUES (?, ?, ?, ?, ?)');
            $insert->execute(array($utilisateur['id'], "PRO", $dedipass->payout, $code, $now));
            

        }else{ 

            // Le code est invalide 
            $resultat['type'] = "error";
            $resultat['message'] = "Votre code est invalide";
            $resultat['content'] = "Le code ".$code." est invalide, veuillez recommencer le processus de paiement.";
            

        } 
    } 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <title>FreeGen - Pay</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a7c6bf746a.js" crossorigin="anonymous"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="/pay/css/style.css">
</head>
<body>
    <div class="page">
        <div class="header">
            <img src="https://freegen.freemembersplus.fr/assets/images/logo.png" style="height:60px"/>
            <div class="infos">
                <h1 style="display:inline">≈ 14.99<div class="unite">EUR</div></h1>
                <p><?= $_SESSION['pseudo'] ?> - PRO</p>
            </div>
        </div>
        <div class="content" style="text-align:center">
        <?php
            if(isset($resultat)){
                if($resultat['type'] == "error"){
                    echo '<svg viewBox="0 0 24 24" class="icon-error"><path d="M12 1L1 20h22L12 1zm1 16h-2v-2h2v2zm-2-4V7h2v6h-2z"></path></svg>';
                    echo '<h3 class="title">'.$resultat['message'].'</h3>';
                    echo '<p class="details">'.$resultat['content'].'</p>';

                }elseif($resultat['type'] == "success"){
                    echo '<svg aria-hidden="true" focusable="false" class="icon-success" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 480H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h352c26.51 0 48 21.49 48 48v352c0 26.51-21.49 48-48 48zm-204.686-98.059l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.248-16.379-6.249-22.628 0L184 302.745l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.25 16.379 6.25 22.628.001z"></path></svg>';
                    echo '<h3 class="title">'.$resultat['message'].'</h3>';
                    echo '<p class="details">'.$resultat['content'].'</p>';

                }else{
                    header('Location /pro');
                }
            }
        ?>  
            <br />
            <a class='btn-retour' href="https://freegen.freemembersplus.fr"></a>
        </div> 
        <div class="footer">
            Profitez d'un paiement sécurisé avec Dedipass et BitPay - <span class="id"><?= session_id() ?></span>
        </div>
    </div>
</body>
</form>