        <?php
            session_start();
            include 'config/teamplate/head.php';
            include 'config/teamplate/nav.php';
        ?>
       
        <div class="container">
            <h2> Best Selling Cards </h2>
            <div class="card-container">
                <div class="card">
                    <a href="productLBJ.php?label=Lebron James GOAT Edition">
                        <img src="<?=showProduct($pdo, "Lebron James GOAT Edition", "img_produit");?>" alt="lebron card" class="pict-card">
                    </a>
                    <?=(showProduct($pdo, "Lebron James GOAT Edition", "quantite_produit") != 0) ?'<h5 style="color:chartreuse;">'.showProduct($pdo, "Lebron James GOAT Edition", "label_stock").'</h5>' : '<h5 style="color:red;">'.showProduct($pdo, "Lebron James GOAT Edition", "label_stock").'</h5>' ;?>
                    <h3><?= showProduct($pdo, "Lebron James GOAT Edition", "prix_produit"); ?> €</h3>
                </div>
                <div class="card">
                    <a href="productKobe.php?label=Kobe Bryant GOAT Edition">
                        <img src="<?=showProduct($pdo, "Kobe Bryant GOAT Edition", "img_produit");?>" alt="kobe card" class="pict-card">
                    </a>
                    <?=(showProduct($pdo, "Kobe Bryant GOAT Edition", "quantite_produit") != 0) ?'<h5 style="color:chartreuse;">'.showProduct($pdo, "Kobe Bryant GOAT Edition", "label_stock").'</h5>' : '<h5 style="color:red;">'.showProduct($pdo, "Kobe Bryant GOAT Edition", "label_stock").'</h5>' ;?>
                    <h3><?= showProduct($pdo, "Kobe Bryant GOAT Edition", "prix_produit"); ?> €</h3>
                </div>
                <div class="card">
                    <a href="productKD.php?label=Kevin Durant GOAT Edition">
                        <img src="<?=showProduct($pdo, "Kevin Durant GOAT Edition", "img_produit");?>" alt=" KD card" class="pict-card">
                    </a>
                    <?=(showProduct($pdo, "Kevin Durant GOAT Edition", "quantite_produit") != 0) ?'<h5 style="color:chartreuse;">'.showProduct($pdo, "Kevin Durant GOAT Edition", "label_stock").'</h5>' : '<h5 style="color:red;">'.showProduct($pdo, "Kevin Durant GOAT Edition", "label_stock").'</h5>' ;?>
                    <h3><?= showProduct($pdo, "Kevin Durant GOAT Edition", "prix_produit"); ?> €</h3>
                </div>
            </div>
            <h2>Les Promotions du moment</h2>
            <div class="card-container">
                <div class="card">
                    <h4>Donovan Mitchell</h4>
                    <a href="productDM.php?'.$qs.'"><img src="asset/img/donovancard 1.png" alt="Donovan card" class="pict-card"></a>
                    <p>149.99€</p>
                    <p class="stock">En Stock</p>
                    <p>Carte rookie Donovan<br>Mitchell sortie en 2003<br>en plastique premium.</p>
                </div>
                <div class="card">
                    <h4>Jaren Jackson Junior</h4>
                    <a href="productJarenJJ.php?'.$qs.'"><img src="asset/img/JJJcard 2.png" alt="Jarren JJ card" class="pict-card"></a>
                    <p>149.99€</p>
                    <p class="stock">En Stock</p>
                    <p>Carte rookie Jaren<br>Jacson Junior sortie en 2003<br>en plastique premium.</p>
                </div>
                <div class="card">
                    <h4>Kobe Bryant</h4>
                    <a href="productKobeRookie.php?'.$qs.'"><img src="asset/img/kb24card 2.png" alt="rookie Kobe card" class="pict-card"></a>
                    <p>149.99€</p>
                    <p class="stock">Plus Disponible</p>
                    <p>Carte rookie Kobe<br>Bryant sortie en 2003<br>en plastique premium.</p>
                </div>
                <div class="card">
                    <h4>Trae Young</h4>
                    <a href="productTY.php?'.$qs.'"><img src="asset/img/TY11card 2.png" alt="Trae Young card" class="pict-card"></a>
                    <p>149.99€</p>
                    <p class="stock">Plus que 3 Disponible</p>
                    <p>Carte rookie Trae<br>Young sortie en 2003<br>en plastique premium.</p>
                </div>
                <div class="card">
                    <h4>Donovan Mitchell</h4>
                    <a href="productDM.php?'.$qs.'"><img src="asset/img/donovancard 1.png" alt="Donovan card" class="pict-card"></a>
                    <p>149.99€</p>
                    <p class="stock">En Stock</p>
                    <p>Carte rookie Donovan<br>Mitchell sortie en 2003<br>en plastique premium.</p>
                </div>
                <div class="card">
                    <h4>Jaren Jackson Junior</h4>
                    <a href="productJarenJJ.php?'.$qs.'"><img src="asset/img/JJJcard 2.png" alt="Jarren JJ card" class="pict-card"></a>
                    <p>149.99€</p>
                    <p class="stock">En Stock</p>
                    <p>Carte rookie Jaren<br>Jacson Junior sortie en 2003<br>en plastique premium.</p>
                </div>
                <div class="card">
                    <h4>Kobe Bryant</h4>
                    <a href="productKobeRookie.php?'.$qs.'"><img src="asset/img/kb24card 2.png" alt="rookie Kobe card" class="pict-card"></a>
                    <p>149.99€</p>
                    <p class="stock">Plus Disponible</p>
                    <p>Carte rookie Kobe<br>Bryant sortie en 2003<br>en plastique premium.</p>
                </div>
                <div class="card">
                    <h4>Trae Young</h4>
                    <a href="productTY.php?'.$qs.'"><img src="asset/img/TY11card 2.png" alt="Trae Young card" class="pict-card"></a>
                    <p>149.99€</p>
                    <p class="stock">Plus que 3 Disponible</p>
                    <p>Carte rookie Trae<br>Young sortie en 2003<br>en plastique premium.</p>
                </div>
            </div>
        </div>
        <?php
            include 'config/teamplate/footer.php';
        ?>
    </body>

</html>