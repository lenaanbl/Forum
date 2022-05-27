<?php include_once('view/header.php'); ?>
<h2>Connexion</h2>
<p>
    Bonjour, veuillez vous connecter pour accedez au forum Foreignum.
</p>
<?php if(!empty($error)): ?>
    <div class="alert alert-danger">
        <strong>Erreur!</strong> <?=$error?>
    </div>
<?php endif; ?>
<?php if(!empty($success)): ?>
    <div class="alert alert-success">
        <strong>Validation!</strong> <?=$success?>
    </div>
<?php endif; ?>
<form action="controler/Login.php" method="post">
    <div class="form-groups">
        <label>Nom d'utilisateur/Pseudo</label>
        <input class="form-control" type="text" name="username" value="<?php echo getUsernameField() ?>"/>
    </div>
    <div class="form-groups">
        <label>Mot de passe</label>
        <input class="form-control" type="password" name="password" value="<?php echo getPasswordField() ?>" />
    </div>

    <button class="btn btn-primary" type="submit">Se connecter</button>

</form>
<?php include('view/footer.php');
