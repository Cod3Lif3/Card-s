<?php
    session_start();
    include 'config/teamplate/head.php';
    include 'config/teamplate/nav.php';
    include 'back/traitement_product.php';
?>
<div class="container">
<h2><?= $product->label();?></h2>
<div class="container-description">
    <div>
        <img src="<?= $product->img();?>" alt="Jaren JJ card">
    </div>
    <div class="descript">
        <h3>Description</h3>
        <p><?= $product->descrip();?></p>
        <h3>Disponibilité</h3>
        <p>Il reste actuellement <?= $product->quantite();?> carte(s) en stocks</p>
        <h3>Prix</h3>
        <h3><?= $product->prix();?>€</h3>
        <a href="?session=panier&label=<?=$product->label();?>"><input type="button" value="Ajouter au Panier"></a>
    </div>
</div>
<div class="Avis">
        <h3>Avis des Utilisateurs:(101 avis)</h3>
        <h4>John Doe</h4>
        <div class="container-star">
            <img src="asset/img/Vector.svg" alt="black_star-1" class="stars">
            <img src="asset/img/Vector.svg" alt="black_star-2" class="stars">
            <img src="asset/img/Vector.svg" alt="black_star-3" class="stars">
            <img src="asset/img/Vector.svg" alt="black_star-4" class="stars">
            <img src="asset/img/Vector (1).svg" alt="white_star"class="stars">
        </div>
        <p>La qualité de cette carte est bluffante, on est clairement sur du premium</p>
    </div>