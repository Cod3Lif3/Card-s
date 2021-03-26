<?php
    include 'config/teamplate/head.php';
    include 'traitement_login.php';
?>
<header>
<?php
    include 'config/teamplate/nav.php';
?>
</header>
<div class="container">
    <fieldset class="login-form">
        <legend>S'identifier</legend>
        <form method="POST" class="connect-form">
            <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
            <input type="password" name="password" id="password" placeholder="Mot de Passe">
            <?php
                echo $content;
            ?>
            <input type="submit" name = 'submit' value="Connectez-Vous" class="connect-btn">
        </form>
    </fieldset>
    <h5>Nouveau sur DeckedUP?</h5>
    <a href="inscription.php"><input type="button" class="inscription-btn" value="Inscrivez-vous!"></a>
</div>
<footer>
    <?php
        include "config/teamplate/footer.php"
    ?>
</footer>