<?php



require('../inc/config.php');

if (empty($_SESSION['pseudo'])) {
    header('Location: https://freegen.freemembersplus.fr');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <title>FreeGen - Pay</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet"/>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="/pay/css/style.css">
</head>
<body>
    <div class="page">
        <div class="header">
            <img src="https://freegen.freemembersplus.fr/assets/images/logo.png" style="height:60px"/>
            <div class="infos">
                <h1 style="display:inline">≈ 24.99<div class="unite">EUR</div></h1>
                <p><?= $_SESSION['pseudo'] ?> - GIANT</p>
            </div>
        </div>
        <div class="content">
            <?php if (isset($_GET['method']) AND $_GET['method'] == 'dedipass') { ?>
                <div data-dedipass="dfcba2656f3ccc720582169c98de13" data-dedipass-custom=""></div>
                <script src="https://api.dedipass.com/v1/pay.js"></script>
            <?php } else { ?>
                <h3>C'est le moment de faire chauffer la carte :)</h3>
                <p>Sélectionnez votre méthode de paiement :</p>
                <div style="text-align:center">
                    <a href="/pay/confirm/giant" class="bouton">
                        <img src="https://i.imgur.com/YZpBJhL.jpg"/>
                        <h4>Dedipass</h4>
                        <p>CB, Téléphone, SMS etc..</p>
                    </a>
                    <a href="https://commerce.coinbase.com/checkout/0e1d019e-a5ab-42fb-b8c0-8ac99837bc" class="bouton buy-with-crypto">
                        <img src="https://i.imgur.com/iKDFaMe.jpg"/>
                        <h4>Coinbase</h4>
                        <p>Cryptomonaie</p>
                    </a>
                    <a href="https://discord.gg/" class="bouton buy-with-crypto">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP_r7_uWrgrpH3VwHI-wt50CBDSS-BbLdj5ngrsDiQmaes39v6kwnIFxe9jURdZN4EmV8&usqp=CAU"/>
                        <h4>Paypal</h4>
                        <p>Passez par Discord</p>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="footer">
            Profitez d'un paiement sécurisé avec Dedipass et Coinbase - <span class="id"><?= session_id() ?></span>
        </div>
    </div>
</body>
</form>