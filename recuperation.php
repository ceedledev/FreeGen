<?php
require('inc/fonctions.php');

// Formulaire mot de passe oublié

if (check_login()) {
    header('Location: /');
    exit();
} else {
    if (!empty($_GET['token'])) {
        $req = $bdd->prepare('SELECT * FROM recuperation WHERE token = ?');
        $req->execute(array($_GET['token']));
        if ($req->rowCount() == 1) {
            $recuperation = $req->fetch();
        } else {
            header('Location: /recuperation');
            exit();
        }
    }
}

$title = 'Récupération';
require('inc/header_auth.php');
?>
<div class="card">
    <div class="card-header pt-4 pb-4 text-center bg-primary">
        <a href="/">
            <img src="/assets/images/logo.png" alt="Logo" height="55"/>
        </a>
    </div>
    <div class="card-body p-4">
        <?php if (!empty($recuperation)) { ?>
        <div class="text-center w-75 m-auto">
            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Réinitialiser le mot de passe</h4>
            <p class="text-muted mb-4" id="message">Entrez votre nouveau mot de passe ci-dessous.</p>
            <div id="alert"></div>
        </div>
            
        <form method="POST" async="recuperation">
            <div class="form-group mb-3">
                <label for="motdepasse">Nouveau mot de passe</label>
                <input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="Entrez votre nouveau mot de passe" required/>
            </div>

            <div class="form-group mb-3">
                <label for="motdepasse2">Confirmation du nouveau mot de passe</label>
                <input type="password" class="form-control" id="motdepasse2" name="motdepasse2" placeholder="Confirmez votre nouveau mot de passe" required/>
            </div>
            
            <div class="form-group mb-0 text-center">
                <input type="hidden" name="recuperation" value="<?=$recuperation['token'] ?>"/>
                <input type="hidden" name="token" value="<?=$_SESSION['token'] ?>"/>
                <button class="btn btn-primary" type="submit">Changer mon mot de passe</button>
            </div>
        </form>
        <?php } else { ?>
        <div class="text-center w-75 m-auto">
            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Réinitialiser le mot de passe</h4>
            <p class="text-muted mb-4" id="message">Entrez votre l'adresse mail liée a votre compte, et suivez les étapes qui vont vous êtes envoyées par mail.</p>
            <div id="alert" style="display:none"></div>
        </div>
            
        <form method="POST" async="recuperation">
            <div class="form-group mb-3">
                <label for="mail">Adresse mail</label>
                <input type="email" class="form-control" id="mail" name="mail" placeholder="Entrez votre mail" required/>
            </div>

            <div class="form-group mb-3" align="center">
                <div class="g-recaptcha" data-theme="dark" data-sitekey="6LfadWcbAAAAABIYFE2ggZ3fNDsm8OZL_SsaB7sA"></div>
            </div>
            
            <div class="form-group mb-0 text-center">
                <input type="hidden" name="token" value="<?=$_SESSION['token'] ?>"/>
                <button class="btn btn-primary" type="submit">Envoyer un e-mail</button>
            </div>
        </form>
        <?php } ?>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 text-center">
        <p class="text-muted">Retour vers la page de<a href="/connexion" class="text-muted ml-1"><b>connexion</b></a></p>
    </div>
</div>
<?php require('inc/footer_auth.php') ?>