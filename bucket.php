<?php
    session_start();
    include 'config/teamplate/head.php';
    include 'config/teamplate/nav.php';
    include 'back/traitement_bucket.php';
?>

<div class="container">
    <h2>Votre Panier</h2>
    <div class="bucket-container">
        <?php if(bucketCreation()):?> 
            <?php for ($i=0;$i<nbArticle();$i++):?>
                <div class="bucket-item">
                    <div class="bucket-item_img">
                        <img src="<?=$productmanager->get($_SESSION['panier']['libelleProduit'][$i])->img();?>" alt="product pict">
                    </div>
                    <div class="bucket-item_text">
                        <h3><?=$_SESSION['panier']['libelleProduit'][$i]?></h3>
                        <small><?=$productmanager->get($_SESSION['panier']['libelleProduit'][$i])->label();?></small>
                        <form method="GET">
                            <button type="submit" name="-" value="<?=$i;?>">-</button>
                            <p> Quantité : <?=$_SESSION['panier']['qteProduit'][$i]?></p>
                            <button type="submit" name="+" value="<?=$i;?>">+</button>
                        </form>
                        <p> Prix :<?=$productmanager->get($_SESSION['panier']['libelleProduit'][$i])->prix();?>€</p>
                        <a href="?panier=delete&i=<?=$i?>">Supprimer</a><br>
                        <form>
                            <input type="text" placeholder="Ajouter un coupon promo">
                            <input type="button" value="Appliquer" class="bucket-item_btn">
                        </form>
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
