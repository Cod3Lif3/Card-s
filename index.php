        <?php
            session_start();
            include 'config/teamplate/head.php';
            include 'config/teamplate/nav.php';
            $manager = new Manager($pdo);
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
                    <h4><?= $manager->getList()[3]->label();?></h4>
                    <a href="productDM.php?label=DM ROOKIE Edition"><img src="<?= $manager->getList()[3]->img();?>" alt="Donovan card" class="pict-card"></a>
                    <h3><?= $manager->getList()[3]->prix() ?> €</h3>
                    <?=($manager->getList()[3]->quantite() != 0) ?'<h5 style="color:chartreuse;">'.$manager->getList()[3]->label_stock().'</h5>' : '<h5 style="color:red;">'.$manager->getList()[3]->label_stock().'</h5>' ;?>
                    <p>Carte rookie Donovan<br>Mitchell sortie en 2003<br>en plastique premium.</p>
                </div>
                <div class="card">
                    <h4><?= $manager->getList()[6]->label();?></h4>
                    <a href="productJarenJJ.php?label=Jaren Jackson ROOKIE Edition"><img src="<?=$manager->getList()[6]->img();?>" alt="Jarren JJ card" class="pict-card"></a>
                    <h3><?= $manager->getList()[6]->prix();?>€</h3>
                    <?=($manager->getList()[6]->quantite() != 0) ?'<h5 style="color:chartreuse;">'.$manager->getList()[6]->label_stock().'</h5>' : '<h5 style="color:red;">'.$manager->getList()[6]->label_stock().'</h5>' ;?>
                    <p>Carte rookie Jaren<br>Jacson Junior sortie en 2003<br>en plastique premium.</p>
                </div>
                <div class="card">
                    <h4><?=$manager->getList()[5]->label();?></h4>
                    <a href="productKobeRookie.php?label=Kobe Bryant ROOKIE Edition"><img src="<?=$manager->getList()[5]->img();?>" alt="rookie Kobe card" class="pict-card"></a>
                    <h3><?=$manager->getList()[5]->prix();?>€</h3>
                    <?=($manager->getList()[5]->quantite() != 0) ?'<h5 style="color:chartreuse;">'.$manager->getList()[5]->label_stock().'</h5>' : '<h5 style="color:red;">'.$manager->getList()[5]->label_stock().'</h5>' ;?>
                    <p>Carte rookie Kobe<br>Bryant sortie en 2003<br>en plastique premium.</p>
                </div>
                <div class="card">
                    <h4><?= $manager->getList()[4]->label();?></h4>
                    <a href="productTY.php?label=Trae Young ROOKIE Edition"><img src="<?= $manager->getList()[4]->img();?>" alt="Trae Young card" class="pict-card"></a>
                    <h3><?= $manager->getList()[4]->prix();?> €</h3>
                    <?=($manager->getList()[4]->quantite() != 0) ?'<h5 style="color:chartreuse;">'.$manager->getList()[4]->label_stock().'</h5>' : '<h5 style="color:red;">'.$manager->getList()[4]->label_stock().'</h5>' ;?>
                    <p>Carte rookie Trae<br>Young sortie en 2003<br>en plastique premium.</p>
                </div>
                <div class="card">
                    <h4><?= $manager->getList()[3]->label();?></h4>
                    <a href="productDM.php?label=DM ROOKIE Edition"><img src="<?= $manager->getList()[3]->img();?>" alt="Donovan card" class="pict-card"></a>
                    <h3><?= $manager->getList()[3]->prix() ?> €</h3>
                    <?=($manager->getList()[3]->quantite() != 0) ?'<h5 style="color:chartreuse;">'.$manager->getList()[3]->label_stock().'</h5>' : '<h5 style="color:red;">'.$manager->getList()[3]->label_stock().'</h5>' ;?>
                    <p>Carte rookie Donovan<br>Mitchell sortie en 2003<br>en plastique premium.</p>
                </div>
                <div class="card">
                    <h4><?= $manager->getList()[6]->label();?></h4>
                    <a href="productJarenJJ.php?label=Jaren Jackson ROOKIE Edition"><img src="<?=$manager->getList()[6]->img();?>" alt="Jarren JJ card" class="pict-card"></a>
                    <h3><?=$manager->getList()[6]->prix();?>€</h3>
                    <?=($manager->getList()[6]->quantite() != 0) ?'<h5 style="color:chartreuse;">'.$manager->getList()[6]->label_stock().'</h5>' : '<h5 style="color:red;">'.$manager->getList()[6]->label_stock().'</h5>' ;?>
                    <p>Carte rookie Jaren<br>Jackson Junior sortie en 2003<br>en plastique premium.</p>
                </div>
                <div class="card">
                    <h4><?=$manager->getList()[5]->label();?></h4>
                    <a href="productKobeRookie.php?label=Kobe Bryant ROOKIE Edition"><img src="<?=$manager->getList()[5]->img();?>" alt="rookie Kobe card" class="pict-card"></a>
                    <h3><?=$manager->getList()[5]->prix();?> €</h3>
                    <?=($manager->getList()[5]->quantite() != 0) ?'<h5 style="color:chartreuse;">'.$manager->getList()[5]->label_stock().'</h5>' : '<h5 style="color:red;">'.$manager->getList()[5]->label_stock().'</h5>' ;?>
                    <p>Carte rookie Kobe<br>Bryant sortie en 2003<br>en plastique premium.</p>
                </div>
                <div class="card">
                    <h4><?= $manager->getList()[4]->label();?></h4>
                    <a href="productTY.php?label=Trae Young ROOKIE Edition"><img src="<?= $manager->getList()[4]->img();?>" alt="Trae Young card" class="pict-card"></a>
                    <h3><?= $manager->getList()[4]->prix();?>€</h3>
                    <?=($manager->getList()[4]->quantite() != 0) ?'<h5 style="color:chartreuse;">'.$manager->getList()[4]->label_stock().'</h5>' : '<h5 style="color:red;">'.$manager->getList()[4]->label_stock().'</h5>' ;?>
                    <p>Carte rookie Trae<br>Young sortie en 2003<br>en plastique premium.</p>
                </div>
            </div>
        </div>
        <?php
            include 'config/teamplate/footer.php';
        ?>
    </body>

</html>