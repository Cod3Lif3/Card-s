<?php
include 'config/teamplate/head.php';
include 'traitement_inscription.php';
?>
<header>
    <?php
    include 'config/teamplate/nav.php';
    ?>
</header>
<div class="container">
    <h2 class="title-inscription">Inscrivez-vous</h2>
    <form method="POST" class="inscription-form">
        <div class="first-form">
            <?php
            echo $content_pseudo;
            ?>
            <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
            <?php
            echo $content_mail;
            ?>
            <input type="mail" name="email" id="email" placeholder="Mail">
            <input type="password" name="password" id="mdp" placeholder="Entrez votre mot de passe">
            <input type="password" name="confpass" id="confmdp" placeholder="Confirmer votre mot de passe">
            <?php
            echo $content_mdp;
            ?>
        </div>
        <span class="vertical-line"></span>
        <div class="second-form">
            <label>Civilité :</label>
            <div class="radio-btn-container">
                <div class="radio-item">
                    <label>Femme</label>
                    <br>
                    <input type="radio" name="genre" value="Femme" id="Femme" class="radio">
                </div>
                <div class="radio-item">
                    <label>Homme</label>
                    <br>
                    <input type="radio" name="genre" value="Homme" id="Homme" class="radio">
                </div>
                <div class="radio-item">
                    <label>Autre</label>
                    <br>
                    <input type="radio" name="genre" value="Autre" id="autre" class="radio">
                </div>
            </div>
            <?php
            echo $content_gender;
            ?>
            <input type="text" name="adresse" id="adresse" placeholder="Adresse">
            <?php
            echo $content_tel;
            ?>
            <input type="tel" name="tel" id="tel" placeholder="Téléphone">
        </div>
        <input type="submit" name="submit" value="S'inscrire" class="validate">
        <small>En cliquant sur S’inscrire, vous acceptez nos Conditions générales.Découvrez comment nous recueillons, utilisons et partageons vos données en lisant notre Politique d’utilisation des données et comment nous utilisons les cookies et autres technologies similaires en consultant notre Politique d’utilisation des cookies.Vous recevrez peut-être des notifications par texto de notre part et vous pouvez à tout moment vous désabonner.</small>
    </form>



</div>
<footer>
    <?php
    include "config/teamplate/footer.php"
    ?>
</footer>
</body>
</html>