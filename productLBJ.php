<?php
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
        <div class="carousel" aria-label="Gallery">
            <ol class="carousel__viewport">
                <li tabindex="0" class="carousel__slide" id="carousel__slide1">
                    <img src="asset/img/lebron cardgoat 1.png" alt="LBJ card" id="LBJ1">
                    <div class="carousel__snapper">
                        <a href="#carousel__slide4" class="carousel__prev">Go to last slide </a>
                        <a href="#carousel__slide2" class="carousel__next">Go to next slide </a>
                    </div>
                </li>
                <li tabindex="0" class="carousel__slide" id="carousel__slide2">
                    <img src="asset/img/LbjGoat2.jpg" alt="LBJ card 2" id="LBJ2">
                    <div class="carousel__snapper">
                        <a href="#carousel__slide1" class="carousel__prev">Go to previous slide </a>
                        <a href="#carousel__slide3" class="carousel__next">Go to next slide </a>
                    </div>
                </li>
                <li tabindex="0" class="carousel__slide" id="carousel__slide3">
                    <img src="asset/img/LbjGoat3.jpg" alt="LBJ card 3" id="LBJ3">
                    <div class="carousel__snapper"></div>
                    <a href="#carousel__slide2" class="carousel__prev">Go to previous slide </a>
                    <a href="#carousel__slide1" class="carousel__next">Go to first slide </a>
                </li>
            </ol>
            <aside class="carousel__navigation">
                <ol class="carousel__navigation-list">
                    <li class="carousel__navigation-item">
                        <a href="#carousel__slide1" class="carousel__navigation-button">Got to slide 1</a>
                    </li>
                    <li class="carousel__navigation-item">
                        <a href="#carousel__slide2" class="carousel__navigation-button">Got to slide 2</a>
                    </li>
                    <li class="carousel__navigation-item">
                        <a href="#carousel__slide3" class="carousel__navigation-button">Got to slide 3</a>
                    </li>
                </ol>
            </aside>
        </div>
        <input type="radio" id="img1" checked=checked>
        <input type="radio" id="img2">
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
</div>
<footer>
    <?php
    include "config/teamplate/footer.php"
    ?>
</footer>
<script src="asset/script/product.js"></script>
</body>

</html>