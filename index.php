        <?php
            session_start();
            include 'config/teamplate/head.php';
            include 'config/teamplate/nav.php';
            $manager = new ProductManager($pdo);
        ?>
       
        <div class="container">
            <h2> Best Selling Cards </h2>
            <div class="card-container">
                <div class="card">
                    <a href="productLBJ.php?label=Lebron James GOAT Edition">
                        <img src="<?=$manager->getList()[0]->img()?>" alt="lebron card" class="pict-card">
                    </a>
                    <?=($manager->getList()[0]->quantite() != 0) ?'<h5 style="color:chartreuse;">'.$manager->getList()[0]->label_stock().'</h5>' : '<h5 style="color:red;">'.$manager->getList()[0]->label_stock().'</h5>' ;?>
                    <h3><?= $manager->getList()[0]->prix() ?> €</h3>
                </div>
                <div class="card">
                    <a href="productKobe.php?label=Kobe Bryant GOAT Edition">
                        <img src="<?=$manager->getList()[1]->img();?>" alt="kobe card" class="pict-card">
                    </a>
                    <?=($manager->getList()[1]->quantite()!= 0) ?'<h5 style="color:chartreuse;">'.$manager->getList()[1]->label_stock().'</h5>' : '<h5 style="color:red;">'.$manager->getList()[1]->label_stock().'</h5>' ;?>
                    <h3><?= $manager->getList()[0]->prix();  ?> €</h3>
                </div>
                <div class="card">
                    <a href="productKD.php?label=Kevin Durant GOAT Edition">
                        <img src="<?=$manager->getList()[2]->img();?>" alt=" KD card" class="pict-card">
                    </a>
                    <?=($manager->getList()[2]->quantite() != 0) ?'<h5 style="color:chartreuse;">'.$manager->getList()[2]->label_stock().'</h5>' : '<h5 style="color:red;">'.$manager->getList()[2]->label_stock().'</h5>' ;?>
                    <h3><?= $manager->getList()[2]->prix() ?> €</h3>
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