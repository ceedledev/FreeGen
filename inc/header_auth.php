<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>FreeGen<?php if (!empty($title)) { echo ' - '.$title; } ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="FreeGen - #1 Générateur de compte en tout genre">
        <meta name="description" content="Un générateur de compte puissant, génère des comptes premium comme ADN, Hulu, Spotify, Crunchyroll, Pornhub et plus. Mises à jour quotidiennes."/>
    <meta name="keyword" content="Account Generator,account generator free,account generator fortnite,account generator roblox,account generator fortnite free,account generator steam,account generator netflix,account generator fortnite ps4,account generator minecraft,account generator discord,account generator amazon prime,account generator apk,netflix account generator apk,fortnite account generator altsforyou.tk,fortnite account generator altsforyou,netflix account generator apk download,netflix account generator android,fake account generator amazon,spotify account generator apk,premium account generator apk,a fortnite account generatormake a account generator,what is a account generator,account creator bot,account generator buy,account generator best,account bank generator,account balance generator,twitter account generator bot,facebook account generator bot,account generator coc,account generator cheap,account generator clash of clans,account generator.com,account generator crossfire,account code generator sap business one,account code generator,account generator discord bot,account generator download,account generator discord server,account generator dominos,account generator directv,account generator defaults,account generator download roblox,account generator debug,account.data generator,account generator email,generator account epic games,fortnite account generator email and password,netflix account generator.exe,fortnite account generator ebay,fake account generator email,fortnite account generator easy,free fortnite account generator email and password,account generator for ps4,account generator for roblox,account generator for steam,account generator for netflix,account generator for minecraft,account generator fortnite link,account generator github,account generator google,nike account generator github,steam account generator github,instagram account generator github,fake account generator gmailgenerator account epic games,fortnite account generator email and password,netflix account generator.exe,fortnite account generator ebay,fake account generator email,fortnite account generator easy,free fortnite account generator email and password,account generator for ps4,account generator for roblox,account generator for steam,account generator for netflix,account generator for minecraft,account generator fortnite link,account generator github,account generator google,nike account generator github,steam account generator github,instagram account generator github,fake account generator gmail,account generator pokemon go,fake account generator google,gmail account generator with password,account generator hack,account generator html,account generator hotstar,account hacker generator,netflix account generator hackforums,paypal account generator hack,fortnite account generator hack,netflix account generator hack,roblox account generator hack,account generator instagram,account generator in oracle purchasing r12,account generator in oracle,account generator ipvanish,account generator iptv,account generator in roblox,account id generator,netflix account generator june 2019,free netflix account generator july 2019,bank account number generator java,netflix premium account generator jdownloader,account key generator yahoo,account key generator,steam account key generator,google account key generator,keep2share account generator,kahoot account generator,kkbox account generator,netflix account generator license key,kik account generator,minecraft premium account key generator,account generator leak,account login generator,fortnite account generator link,fortnite account generator legit,fortnite account generator list,premium account generator link,paypal account login generator,cash generator account login,account generator minecraft free,account generator minecraft premium,account generator minecraft download,account generator minecraft 2018,account generator minecraft online,account generator msp,generator account mail,fortnite account generator mobile,premium account generator mc,account generator nulled,account generator netflix free,account generator name,account generator netflix 2018,account generator nike,account generator nba,account number generator,account name generator random,account generator online,account generator oracle r12,account generator oracle project,account origin generator,netflix account generator online,gmail account generator online,steam account generator online,spotify account generator online"> 
        
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://freegen.xyz"/>
        <meta property="og:title" content="FreeGen - #1 Générateur de compte en tout genre"/>
        <meta property="og:description" content="Un générateur de compte puissant, génère des comptes premium comme ADN, Hulu, Spotify, Crunchyroll, Pornhub et plus. Mises à jour quotidiennes.">
        <meta name="theme-color" content="#c906d0"> <meta property="og:locale" content="fr_FR" /> 
        <meta property="og:image" content="https://i.imgur.com/buR4vxW.jpg"/>

        <meta property="twitter:card" content="summary_large_image"/>
        <meta property="twitter:url" content="https://freegen.xyz"/>
        <meta property="twitter:title" content="FreeGen - #1 Générateur de compte en tout genre"/>
        <meta property="twitter:description" content="Un générateur de compte puissant, génère des comptes premium comme ADN, Hulu, Spotify, Crunchyroll, Pornhub et plus. Mises à jour quotidiennes.">
        <meta property="twitter:image" content="https://i.imgur.com/buR4vxW.jpg"/>
        
        <link rel="shortcut icon" href="/assets/images/favicon.ico"/>
        
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style"/>
        <link href="/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style"/>
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1KRWDXM9L"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1KRWFDXM9L');
</script>

    </head>
    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":true, "showRightSidebarOnStart": true}'>
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <?php
                        if (activation_maintenance()) {
                            $req = $bdd->query('SELECT * FROM alerts WHERE connecte = 0 AND affiche = 1 ORDER BY id DESC');
                            while($r = $req->fetch()) {
                            ?>
                            <div class="card cta-box bg-<?=$r['type'] ?> text-white">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h3 class="m-0 font-weight-normal cta-box-title"><?=$r['titre'] ?></h3>
                                        <br>
                                        <?=$r['contenu'] ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        <?php } ?>