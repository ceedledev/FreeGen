<?php
require('inc/fonctions.php');

// Formulaire connexion

if (check_login()) {
    header('Location: /');
}

$title = 'Connexion';
require('inc/header_auth.php');
?>
<?php if (activation_maintenance()) { ?>
<?php } else { ?>
    <div class="card cta-box bg-danger text-white">
    <div class="card-body">
        <div class="text-center">
            <h3 class="m-0 font-weight-normal cta-box-title">Le générateur n'est pas encore ouvert.</h3>
            <br>
            <a href="https://discord.gg/" class="btn btn-sm btn-light btn-rounded">Plus d'infos sur le Discord <i class="mdi mdi-arrow-right"></i></a>
        </div>
    </div>
</div>
<?php } ?>
<div class="card cta-box bg-primary text-white">
    <div class="card-body">
        <div class="text-center">
            <h3 class="m-0 font-weight-normal cta-box-title">Rejoindre notre <b>Discord ?</b></h3>
            <br>
            <a href="https://discord.gg/" class="btn btn-sm btn-light btn-rounded">Rejoindre <i class="mdi mdi-arrow-right"></i></a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header pt-4 pb-4 text-center bg-primary">
        <a href="/">
            <img src="/assets/images/logo.png" alt="Logo" height="55">
        </a>
    </div>
    <div class="card-body p-4">
        <div class="text-center w-75 m-auto">
            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Se connecter</h4>
            <p class="text-muted mb-4" id="message">Saisissez votre adresse e-mail et votre mot de passe pour accéder au générateur</p>
            <div id="alert"></div>
        </div>
        <form method="POST" async="connexion">
            <div class="form-group">
                <label for="mail">Adresse mail</label>
                <input class="form-control" type="email" name="mail" id="mail" placeholder="Entrer votre mail" required/>
            </div>

            <div class="form-group">
                <a href="/recuperation" class="text-muted float-right"><small>Mot de passe oublié ?</small></a>
                <label for="motdepasse">Mot de passe</label>
                <input class="form-control" type="password" name="motdepasse" id="motdepasse" placeholder="Tapez votre mot de passe" required/>
            </div>

            <div class="form-group mb-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="sesouvenir" id="sesouvenir"/>
                    <label class="custom-control-label" for="sesouvenir">Se souvenir de moi</label>
                </div>
            </div>

            <div class="form-group" align="center">
                <div class="g-recaptcha" data-theme="dark" data-sitekey="6LeG2eMiAAAAALoZNxBNuFnsm7BYKSOEu29PDHLD"></div>
            </div>

            <div class="form-group mb-0 text-center">
                <input type="hidden" name="token" value="<?=$_SESSION['token'] ?>"/>
                <input type="submit" class="btn btn-rounded btn-primary" value="S'identifier"/>
            </div>
        </form>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 text-center">
        <p class="text-muted">Vous n'avez pas de compte ? <a href="/inscription" class="text-muted ml-1"><b>S'inscrire</b></a></p>
    </div>
</div>
<?php require('inc/footer_auth.php') ?>