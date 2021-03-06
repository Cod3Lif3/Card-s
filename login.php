<?php
    include 'config/teamplate/head.php';
?>
<header>
<?php
    include 'config/teamplate/nav.php';
?>
</header>
<fieldset>
    <form method="POST">
        <input type="text" name="pseudo" id="pseudo" placeholder="pseudo">
        <input type="password" name="password" id="password" placeholder="password">
        <input type="submit" name = 'submit' value="Connectez-Vous">
    </form>
</fieldset>
<?php
    if (isset($_POST['submit']))
    {
        extract($_POST);
        if(connectPseudo($pseudo)==false)
        {
            echo 'L\identifiant ou le mot de passe ne correspondent pas';
        }
        else if(passwordConnect($password,$pseudo)==false)
        {
            echo 'L\identifiant ou le mot de passe ne correspondent pas';
        }
        else
        {
            echo 'connexion réussi';
        }
    }
