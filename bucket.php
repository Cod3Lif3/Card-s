<?php
    session_start();
    include 'config/teamplate/head.php';
?>
<header>
<?php
    include 'config/teamplate/nav.php';
?>
<div class="container">
    <h2>Votre Panier</h2>
    <div class="bucket-item">
        <div class="bucket-item_img">
            <img src="asset/img/kobe_miniature-GOAT.png" alt="Kobe miniature card">
        </div>
        <div class="bucket-item_text">
            <h3>Kobe Bryant GOAT Edition</h3>
            <small> En Stock </small>
            <p>Prix : 149.99 €</p>
            <a>Supprimer</a><br>
            <input type="text" placeholder="Ajouter un coupon promo">
            <input type="button" value="Appliquer" class="bucket-item_btn">
            <hr>
            <p> Sous-Total : 149.99€</p>
            <input type="button" value = "Finaliser ma commande" class="bucket-item_btn">
        </div>
    </div>
</div>
<footer>
    <?php
        include 'config/teamplate/footer.php';
    ?>
</footer>