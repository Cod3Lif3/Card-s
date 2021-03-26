<?php
include 'traitement_profil.php';
include 'config/teamplate/head.php';
?>
<header>
    <?php
    include 'config/teamplate/nav.php';
    ?>
</header>
<div class="container">
    <?php echo $content;?>
    <h2> Page profil </h2>
    <?php echo $status_content;?>
    <div class="avatar"></div>
    <input class="avatar-btn" type="button" value="Change picture">
    <div class="info-membre">
        Pseudo
        <span class="aff-info">
            <?= htmlspecialchars($_SESSION['user']['pseudo']); ?>
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
    <footer>
        <?php
        include "config/teamplate/footer.php"
        ?>
    </footer>