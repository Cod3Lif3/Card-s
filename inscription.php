<?php
include 'config/teamplate/head.php';
include 'config/teamplate/nav.php';
include 'back/traitement_inscription.php';
?>

<body>
    <div class="container">
        <h2 class="title-inscription">Inscrivez-vous</h2>
        <form method="POST" class="inscription-form">
            <div class="first-form">
                <?= $content_pseudo;?>
                <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
                <?= $content_mail;?>
                <input type="mail" name="email" id="email" placeholder="Mail" required>
                <input type="password" name="mdp" id="mdp" placeholder="Entrez votre mot de passe" required>
                <input type="password" name="confpass" id="confmdp" placeholder="Confirmer votre mot de passe" required>
                <?= $content_mdp;?>
            </div>
            <span class="vertical-line"></span>
            <div class="second-form">
                <label>Civilité :</label>
                <div class="radio-btn-container">
                    <div class="radio-item">
                        <label>Femme</label>
                        <br>
                        <input type="radio" name="gender" value="Femme" id="Femme" class="radio">
                    </div>
                    <div class="radio-item">
                        <label>Homme</label>
                        <br>
                        <input type="radio" name="gender" value="Homme" id="Homme" class="radio">
                    </div>
                    <div class="radio-item">
                        <label>Autre</label>
                        <br>
                        <input type="radio" name="gender" value="Autre" id="autre" class="radio">
                    </div>
                </div>
                <?= $content_gender;?>
                <input type="text" name="adresse" id="adresse" placeholder="Adresse" required>
                <?= $content_tel;?>
                <input type="tel" name="tel" id="tel" placeholder="Téléphone" required>
            </div>
            <input type="submit" name="submit" value="S'inscrire" class="validate" required>
            <small>En cliquant sur S’inscrire, vous acceptez nos Conditions générales.Découvrez comment nous recueillons, utilisons et partageons vos données en lisant notre Politique d’utilisation des données et comment nous utilisons les cookies et autres technologies similaires en consultant notre Politique d’utilisation des cookies.Vous recevrez peut-être des notifications par texto de notre part et vous pouvez à tout moment vous désabonner.</small>
        </form>
    </div>
    <?php
        include "config/teamplate/footer.php"
    ?>
    
</body>

</html>