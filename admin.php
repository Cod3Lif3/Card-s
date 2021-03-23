<?php
session_start();
if (isset($_GET['session']) && $_GET['session'] == 'destroy') {
    session_destroy();
    header('location:login.php');
    exit();
}
include 'config/teamplate/head.php';
?>
<header>
    <?php
    include 'config/teamplate/nav.php';
    ?>
</header>
<div class="container">
    <form method="GET" class="search-item">
            <input type="search" placeholder="Search Product" class="search-bar">
            <button type="submit"><img src="asset/img/search_icon.png" alt="search icon" class="search-icon"></button>
            <div class="radio-btn-container">
                <div class="radio-item">
                    <label>Name</label>
                    <br>
                    <input type="radio" name="tri" value="Name" class="radio">
                </div>
                <div class="radio-item">
                    <label>Price</label>
                    <br>
                    <input type="radio" name="tri" value="Price" class="radio">
                </div>
                <div class="radio-item">
                    <label>Label</label>
                    <br>
                    <input type="radio" name="tri" value="Label" class="radio">
                </div>
            </div>
    </form>
    <h2> Page admin </h2>
    <h2> Vous êtes connectés en tant qu'administrateur</h2>
    <h4> Gestion des stocks</h4>
    <div class="product-container">
        <div class="product-item">
            <div class="card-container">
                <div class="card">
                    <h4>Donovan Mitchell</h4>
                    <a href="productDM.php?'.$qs.'"><img src="asset/img/donovancard 1.png" alt="Donovan card" class="pict-card"></a>
                    <input class="product-btn_img" type="button" value="Change picture">
                </div>
            </div>
            <div class="info-container">
                <span class="aff-info">
                    <?= affichageProduct($pdo, "Lebron James GOAT Edition", "prix_produit"); ?>
                </span>
                <input class="product-btn" type="button" value="Edit Price">
                <span class="aff-info">
                    <?= affichageProduct($pdo, "Lebron James GOAT Edition", "quantite_produit"); ?>
                </span>
                <input class="product-btn" type="button" value="Stock Update">
                <span class="aff-info">
                    <?= affichageProduct($pdo, "Lebron James GOAT Edition", "descrip_product"); ?>
                </span>
                <input class="product-btn" type="button" value="Edit Description">
            </div>
        </div>
        <div class="product-item">
            <div class="card-container">
                <div class="card">
                    <h4>Donovan Mitchell</h4>
                    <a href="productDM.php?'.$qs.'"><img src="asset/img/donovancard 1.png" alt="Donovan card" class="pict-card"></a>
                    <input class="product-btn_img" type="button" value="Change picture">
                </div>
            </div>
            <div class="info-container">
                <span class="aff-info">
                    <?= affichageProduct($pdo, "Lebron James GOAT Edition", "prix_produit"); ?>
                </span>
                <input class="product-btn" type="button" value="Edit Price">
                <span class="aff-info">
                    <?= affichageProduct($pdo, "Lebron James GOAT Edition", "quantite_produit"); ?>
                </span>
                <input class="product-btn" type="button" value="Stock Update">
                <span class="aff-info">
                    <?= affichageProduct($pdo, "Lebron James GOAT Edition", "descrip_product"); ?>
                </span>
                <input class="product-btn" type="button" value="Edit Description">
            </div>
        </div>
        <div class="product-item">
            <div class="card-container">
                <div class="card">
                    <h4>Donovan Mitchell</h4>
                    <a href="productDM.php?'.$qs.'"><img src="asset/img/donovancard 1.png" alt="Donovan card" class="pict-card"></a>
                    <input class="product-btn_img" type="button" value="Change picture">
                </div>
            </div>
            <div class="info-container">
                <span class="aff-info">
                    <?= affichageProduct($pdo, "Lebron James GOAT Edition", "prix_produit"); ?>
                </span>
                <input class="product-btn" type="button" value="Edit Price">
                <span class="aff-info">
                    <?= affichageProduct($pdo, "Lebron James GOAT Edition", "quantite_produit"); ?>
                </span>
                <input class="product-btn" type="button" value="Stock Update">
                <span class="aff-info">
                    <?= affichageProduct($pdo, "Lebron James GOAT Edition", "descrip_product"); ?>
                </span>
                <input class="product-btn" type="button" value="Edit Description">
            </div>
        </div>
    </div>
    <a href="?session=destroy"><input type="button" class="destroy-btn" value="Déconnexion"></a>
    <footer>
        <?php
        include 'config/teamplate/footer.php';
        ?>
    </footer>