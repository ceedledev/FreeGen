<?php
if ($_GET['erreur'] == 400) {
    $title = 'Erreur 400';
} else if ($_GET['erreur'] == 401) {
    $title = 'Erreur 401';
} else if ($_GET['erreur'] == 403) {
    $title = 'Erreur 403';
} else if ($_GET['erreur'] == 404) {
    $title = 'Erreur 404';
} else if ($_GET['erreur'] == 500) {
    $title = 'Erreur 500';
} else {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <title>FreeGen<?php if (!empty($title)) { echo ' - '.$title; } ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet"/>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="page">
        <div class="header">
            <img src="https://i.imgur.com/oYkBFyn.png" style="height:40px"/>
        </div>
        <div class="content" style="text-align:center">
            <?php if ($_GET['erreur'] == 400) { ?>
                <h1>400</h1>
                <h4>Mauvaise requête</h4>
                <p>Il semble que vous ayez pris un mauvais virage.<br>
                Ne vous inquiétez pas... ça arrive aux meilleurs d'entre nous.<br>
                Voici un petit conseil qui pourrait vous aider à vous remettre sur la bonne voie.</p>
            <?php } else if ($_GET['erreur'] == 401) { ?>
                <h1>401</h1>
                <h4>Non autorisé</h4>
                <p>Il semble que vous ayez pris un mauvais virage.<br>
                Ne vous inquiétez pas... ça arrive aux meilleurs d'entre nous.<br>
                Voici un petit conseil qui pourrait vous aider à vous remettre sur la bonne voie.</p>
            <?php } else if ($_GET['erreur'] == 403) { ?>
                <h1>403</h1>
                <h4>Accès interdit</h4>
                <p>Il semble que vous ayez pris un mauvais virage.<br>
                Ne vous inquiétez pas... ça arrive aux meilleurs d'entre nous.<br>
                Voici un petit conseil qui pourrait vous aider à vous remettre sur la bonne voie.</p>
            <?php } else if ($_GET['erreur'] == 404) { ?>
                <h1>404</h1>
                <h4>Page non trouvée</h4>
                <p>Il semble que vous ayez pris un mauvais virage.<br>
                Ne vous inquiétez pas... ça arrive aux meilleurs d'entre nous.<br>
                Voici un petit conseil qui pourrait vous aider à vous remettre sur la bonne voie.</p>
            <?php } else if ($_GET['erreur'] == 500) { ?>
                <h1>500</h1>
                <h4>Erreur interne du serveur</h4>
                <p>Une erreur 500 se produit lorsque quelque chose ne va pas dans notre code.<br>
                Le fait que vous voyez ceci ne corrige pas cette erreur. Vous êtes probablement énervé en ce moment car<br>
                vous êtes privés de votre générateur préféré, mais tout va bien aller prenez une tisane, pétez un bon coup et rafraichissez la page.<br>
                (si dans 20min c'est toujours comme ça, passez nous dire bonjour sur <a href="https://discord.gg/" class="text-muted"><b>Discord</b></a></p>

            <?php } ?>
                <a class='btn-retour' href="https://freegen.freemembersplus.fr"></a>
        </div>
        <div class="footer">
            © 2016 - <?=date('Y') ?> FreeGen. Tous droits réservés.
        </div>
    </div>
</body>
</form>