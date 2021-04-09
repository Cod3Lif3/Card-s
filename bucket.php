<?php
    session_start();
    include 'config/teamplate/head.php';
    include 'config/teamplate/nav.php';
    if (isset($_GET['panier']) && $_GET['panier'] == 'delete') {
        deleteArticle($_SESSION['panier']['libelleProduit'][$_GET['i']]);
        header('location:bucket.php?delete=success');
        exit();
    }
    bucketCreation();
?>

<div class="container">
    <h2>Votre Panier</h2>
    <div class="bucket-container">
        <?php if(bucketCreation()):?>
            <?php for ($i=0;$i<nbArticle();$i++):?>
                <div class="bucket-item">
                    <div class="bucket-item_img">
                        <img src="<?=showProduct($pdo,$_SESSION['panier']['libelleProduit'][$i],"img_produit")?>" alt="product pict">
                    </div>
                    <div class="bucket-item_text">
                        <h3><?=$_SESSION['panier']['libelleProduit'][$i]?></h3>
                        <small><?=showProduct($pdo,$_SESSION['panier']['libelleProduit'][$i],"label_stock")?></small>
                        <p> Quantité : <?=$_SESSION['panier']['qteProduit'][$i]?></p>
                        <p> Prix :<?=showProduct($pdo,$_SESSION['panier']['libelleProduit'][$i],"prix_produit")?>€</p>
                        <a href="?panier=delete&i=<?=$i?>">Supprimer</a><br>
                        <input type="text" placeholder="Ajouter un coupon promo">
                        <input type="button" value="Appliquer" class="bucket-item_btn">
                        <hr>
                    </div>
                </div>  
            <?php endfor;?>
        <?php endif;?>
        <p> Sous-Total : <?=total()?>€</p>
        <input type="button" value = "Finaliser ma commande" class="bucket-item_btn">
    </div>
</div>
<?php
    include 'config/teamplate/footer.php';
?>
</body>
</html>
