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
            <h2>Lebron James</h2>
            <div class="container-description">
                <div class="container-img">
                    <button type="submit" id="previous-btn" class="btn">
                        <img src="asset/img/left-arrow.png" class="img-btn">
                    </button>
                    <img src="asset/img/LbjGoat1.png" alt="LBJ card" id="first_pict">
                    <img src="asset/img/LbjGoat2.jpg" alt="LBJ card" class="second-card-img" id="second_pict">
                    <img src="asset/img/LbjGoat3.jpg" alt="LBJ card" class="third-card-img" id="third_pict">
                    <button type="submit" id="next-btn" class="btn">
                        <img src="asset/img/right-arrow.png" class="img-btn">
                    </button>
                </div>
                <div class="descript">
                    <h3>Description</h3>
                    <p><?= affichageProduct($pdo, "Lebron James GOAT Edition", "descrip_product"); ?></p>
                    <h3>Disponibilité</h3>
                    <p>Il reste actuellement <?= affichageProduct($pdo, "Lebron James GOAT Edition", "quantite_produit"); ?> carte(s) en stocks</p>
                    <h3>Prix</h3>
                    <h3><?= affichageProduct($pdo, "Lebron James GOAT Edition", "prix_produit"); ?> €</h3>
                    <input type="button" value="Ajouter au Panier">
                </div>
            </div>
        </div>
        <div class="Avis">
            <h3>Avis des Utilisateurs:(101 avis)</h3>
            <h4>John Doe</h4>
            <div class="container-star">
                <img src="asset/img/Vector.svg" class="stars">
                <img src="asset/img/Vector.svg" class="stars">
                <img src="asset/img/Vector.svg" class="stars">
                <img src="asset/img/Vector.svg" class="stars">
                <img src="asset/img/Vector (1).svg" class="stars">
            </div>
            <p>La qualité de cette carte est bluffante, on est clairement sur du premium</p>
        </div>
        <footer>
            <?php
            include "config/teamplate/footer.php"
            ?>
        </footer>
        <script src="asset/script/product.js"></script>
    </body>
</html>