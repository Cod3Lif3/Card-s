        <?php
            session_start();
            include 'config/teamplate/head.php';
            include 'config/teamplate/nav.php';
            include 'back/traitement_profil.php';
        ?>
        <div class="container">
            <?= $content;?>
            <h2> Page profil </h2>
            <?= $status_content;?>
            <div class="avatar"></div>
            <input class="avatar-btn" type="button" value="Change picture">
                <div class="info-membre">
                    Pseudo
                    <span class="aff-info">
                        <?=($_SESSION['user']['pseudo']);?>
                    </span>
                </div>
            <div class="info-membre">
                Numéro de Téléphone
                <span class="aff-info">
                    <?= affichageUser($pdo, $_SESSION['user']['pseudo'],'tel'); ?>
                </span>
            </div>
            <div class="info-membre">
                Adresse Postale
                <span class="aff-info">
                    <?= affichageUser($pdo, $_SESSION['user']['pseudo'],'adresse'); ?>
                </span>
            </div>
            <div class="info-membre">
                Adresse Email
                <span class="aff-info">
                    <?= affichageUser($pdo, $_SESSION['user']['pseudo'],'email'); ?>
                </span>
            </div>
            <a href="?session=destroy"><input type="button" class="destroy-btn" value="Déconnexion"></a>
        </div>
        <?php
            include "config/teamplate/footer.php"
        ?>
        
    </body>
</html>