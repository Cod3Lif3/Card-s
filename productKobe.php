        <?php
            session_start();
            include 'config/teamplate/head.php';
            include 'config/teamplate/nav.php';
            include 'back/traitement_product.php';
        ?>
        <div class="container">
            <h2>Kobe Bryant</h2>
            <div class="container-description">
                <div class="container-img">
                    <button type="submit"  id="previous-btn" class="btn">
                        <img src="asset/img/left-arrow.png" class="img-btn">
                    </button>
                    <img src="<?= $product->img();?>" alt="Kobe card" id="first_pict">
                    <img src="<?= $product->second_img();?>" alt="Kobe card"  class="second-card-img" id="second_pict">
                    <img src="<?= $product->third_img();?>" alt="Kobe card" class="third-card-img" id="third_pict">
                    <button type="submit" id="next-btn" class="btn">
                        <img src="asset/img/right-arrow.png" class="img-btn">
                    </button>
                </div>
                <div class="descript">
                    <h3>Description</h3>
                    <p><?= htmlspecialchars($product->descrip()); ?></p>
                    <h3>Disponibilité</h3>
                    <p>Il reste actuellement <?= htmlspecialchars($product->quantite());?> carte(s) en stocks</p>
                    <h3>Prix</h3>
                    <h3><?= htmlspecialchars($product->prix())?> €</h3>
                    <a href="?session=panier&label=<?=$product->label();?>"><input type="button" value="Ajouter au Panier"></a>
                    <?= $content;?>
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
        </div>
        <footer>
            <?php
            include "config/teamplate/footer.php"
            ?>
        </footer>
        <script src="asset/script/product.js"></script>
    </body>
</html>