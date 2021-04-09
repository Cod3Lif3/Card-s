<?php
    include 'config/teamplate/head.php';
?>
<header>
<?php
    include 'config/teamplate/nav.php';
?>
</header>
<div class="container">
<h2>Donovan Mitchell</h2>
<div class="container-description">
    <div>
        <img src="<?=showProduct($pdo, "DM ROOKIE Edition", "img_produit");?>" alt="Donovan card">
    </div>
    <div class="descript">
        <h3>Description</h3>
        <p><?=showProduct($pdo, "DM ROOKIE Edition", "descrip_product");?></p>
        <h3>Disponibilité</h3>
        <p>Il reste actuellement <?=showProduct($pdo, "DM ROOKIE Edition", "quantite_produit");?> carte(s) en stocks</p>
        <h3>Prix</h3>
        <h3><?=showProduct($pdo, "DM ROOKIE Edition", "prix_produit");?>€</h3>
        <input type="button" value="Ajouter au Panier">
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