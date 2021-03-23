<?php
    session_start();
    include 'config/teamplate/head.php';
?>
<header>
<?php
    include 'config/teamplate/nav.php';
?>
</header>
<div class="container">
<h2> Page profil </h2>
<?php
    if($_SESSION['user']['statut'] == 0){
        echo '<h3> Hello '.htmlspecialchars($_SESSION['user']['pseudo']).' <span class = "statut" >vous êtes connectés</span> en tant que membre </h3>';
    }
    else{
        header('location:admin.php');
        exit();
    }
?>
<div class="avatar"></div>
<input class="avatar-btn" type="button" value="Change picture">
<div class="info-membre">
    Pseudo
    <span class="aff-info">
        <?=htmlspecialchars($_SESSION['user']['pseudo']);?>
    </span>
</div>
<div class="info-membre">
    Numéro de Téléphone
    <span class="aff-info">
        <?=affichageTel($pdo,$_SESSION['user']['pseudo']);?>
    </span>
</div>
<div class="info-membre">
    Adresse Postale 
    <span class="aff-info">
        <?=affichageAdresse($pdo,$_SESSION['user']['pseudo']);?>
    </span>
</div>
<div class="info-membre">
    Adresse Email 
    <span class="aff-info">
        <?=affichageMail($pdo,$_SESSION['user']['pseudo']);?>
    </span>
</div>


<?php
    if (!isset($_SESSION['user']))
    {
        header('location:login.php?access=forbidden');
        exit();
    }

    if (isset($_GET['connect']) &&  $_GET['connect'] == 'forbidden')
    {
        echo '<div style="background:tomato;padding:2%;">Vous ne pouvez pas accéder à la page d\'inscription</div>';
    }
    if(isset($_GET['session']) && $_GET['session'] == 'destroy')
    {
        session_destroy();
        header('location:login.php');
        exit();
    }
?>

<a href="?session=destroy"><input type="button" class="destroy-btn" value="Déconnexion"></a>
<footer>
    <?php
    include "config/teamplate/footer.php"
    ?>
</footer>