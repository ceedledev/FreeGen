<?php
require('inc/fonctions.php');

// Formulaire inscription

if (check_login()) {
    header('Location: /');
}

$title = 'Incription';
require('inc/header_auth.php');
?>
<?php if (empty($_GET['mail'])) { ?>
<div class="card cta-box bg-primary text-white">
    <div class="card-body">
        <div class="text-center">
            <h3 class="m-0 font-weight-normal cta-box-title">Rejoindre notre <b>Discord ?</b></h3>
            <br>
            <a href="https://discord.gg/" class="btn btn-sm btn-light btn-rounded">Rejoindre <i class="mdi mdi-arrow-right"></i></a>
        </div>
    </div>
</div>
<?php } ?>
<div class="card">
    <div class="card-header pt-4 pb-4 text-center bg-primary">
        <a href="/">
            <img src="/assets/images/logo.png" alt="Logo" height="55">
        </a>
    </div>
    <div class="card-body p-4">
        <div class="text-center w-75 m-auto">
            <?php if (!empty($_GET['mail'])) { ?>
            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Migration</h4>
            <p class="text-muted mb-4" id="message">Vous avez presque fini la migration de votre compte !</p>
            <?php } else { ?>
            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Inscription</h4>
            <p class="text-muted mb-4" id="message">Pas encore de compte ? Inscrit toi, ça prends moins d'une minute.</p>
            <?php } ?>
            <div id="alert"></div>
        </div>
        <form method="POST" async="inscription">
            <div class="form-group">
                <label for="pseudo">Ton Pseudo</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Entrez votre pseudo" required/>
            </div>

            <div class="form-group">
                <label for="mail">Ton adresse mail</label>
                <?php if (!empty($_GET['mail'])) { ?>
                <input type="email" class="form-control" name="mail" id="mail" value="<?=$_GET['mail'] ?>" required/>
                <?php } else { ?>
                <input type="email" class="form-control" name="mail" id="mail" placeholder="Entrez votre mail" required/>
                <?php } ?>
            </div>

            <div class="form-group">
                <span class="text-muted float-right"><small id="password_message">Aucun mot de passe rentré</small></span>
                <label for="motdepasse">Ton mot de passe</label>
                <input type="password" class="form-control" name="motdepasse" id="motdepasse" placeholder="Entrez votre mot de passe" onkeyup="password(this)" required/>
            </div>

            <div class="form-group">
                <label for="motdepasse2">Confirmation de ton mot de passe</label>
                <input type="password" class="form-control" name="motdepasse2" id="motdepasse2" placeholder="Confirmation de votre mot de passe" required/>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="cgu" id="cgu" required/>
                    <label class="custom-control-label" for="cgu">J'accepte les <a href="/cgu" class="text-muted">CGU</a></label>
                </div>
            </div>
            
            <div class="form-group" align="center">
                <div class="g-recaptcha" data-theme="dark" data-sitekey="6LeG2eMiAAAAALoZNxBNuFnsm7BYKSOEu29PDHLD"></div>
            </div>

            <div class="form-group mb-0 text-center">
                <?php if (!empty($_GET['mail'])) { ?>
                <input type="hidden" name="migre" value="1"/>
                <?php } ?>
                <input type="hidden" name="token" value="<?=$_SESSION['token'] ?>"/>
                <input type="submit" class="btn btn-rounded btn-primary" value="S'inscrire"/>
            </div>
        </form>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 text-center">
        <p class="text-muted">Vous avez déjà un compte ? <a href="/connexion" class="text-muted ml-1"><b>S'identifier</b></a></p>
    </div>
</div>
<?php require('inc/footer_auth.php'); ?>