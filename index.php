<?php
    include 'config/teamplate/head.php';
?>
<header>
<?php
    include 'config/teamplate/nav.php';
?>
</header>
<div class="container">
    <h2> Best Selling Cards </h2>
    <div class="card-container">
        <div class="card">
            <a href="productLBJ.php?'. $qs .'"><img src="asset/img/lebron cardgoat 1.png" alt="lebron card" class="pict-card"></a>
            <p>149.99€</p>
        </div>
        <?php
            $params = [
                'Nom' =>  'Lebron_James',
                'Prix' => '149.99',
                'Dispo' => 'En_stock'
            ];
            $qs = http_build_query($params);
            ?>
        <div class="card">
            <a href=""><img src="asset/img/kobe card 1.png" alt="kobe card" class="pict-card"></a>
            <p>149.99€</p>
        </div>
        <div class="card">
            <a href=""><img src="asset/img/kevin durantcard 1.png" alt=" KD card" class="pict-card"></a>
            <p>149.99€</p>
        </div>
    </div>
    <h3>Les Promotions du moment</h3>
    <div class="card-container">
        <div class="card">
            <h4>Donovan Mitchell</h4>
            <a href="#"><img src="asset/img/donovancard 1.png" alt="Donovan card" class="pict-card"></a>
            <p>149.99€</p>
            <p class="stock">En Stock</p>
            <p>Carte rookie Donovan<br>Mitchell sortie en 2003<br>en plastique premium.</p>
        </div>
        <div class="card">
            <h4>Jaren Jackson Junior</h4>
            <a href="#"><img src="asset/img/JJJcard 2.png" alt="Jarren JJ card" class="pict-card"></a>
            <p>149.99€</p>
            <p class="stock">En Stock</p>
            <p>Carte rookie Jaren<br>Jacson Junior sortie en 2003<br>en plastique premium.</p>
        </div>
        <div class="card">
            <h4>Kobe Bryant</h4>
            <a href="#"><img src="asset/img/kb24card 2.png" alt="rookie Kobe card" class="pict-card"></a>
            <p>149.99€</p>
            <p class="stock">Plus Disponible</p>
            <p>Carte rookie Kobe<br>Bryant sortie en 2003<br>en plastique premium.</p>
        </div>
        <div class="card">
            <h4>Trae Young</h4>
            <a href="#"><img src="asset/img/TY11card 2.png" alt="Trae Young card" class="pict-card"></a>
            <p>149.99€</p>
            <p class="stock">Plus que 3 Disponible</p>
            <p>Carte rookie Trae<br>Young sortie en 2003<br>en plastique premium.</p>
        </div>
        <div class="card">
            <h4>Donovan Mitchell</h4>
            <a href="#"><img src="asset/img/donovancard 1.png" alt="Donovan card" class="pict-card"></a>
            <p>149.99€</p>
            <p class="stock">En Stock</p>
            <p>Carte rookie Donovan<br>Mitchell sortie en 2003<br>en plastique premium.</p>
        </div>
        <div class="card">
            <h4>Jaren Jackson Junior</h4>
            <a href="#"><img src="asset/img/JJJcard 2.png" alt="Jarren JJ card" class="pict-card"></a>
            <p>149.99€</p>
            <p class="stock">En Stock</p>
            <p>Carte rookie Jaren<br>Jacson Junior sortie en 2003<br>en plastique premium.</p>
        </div>
        <div class="card">
            <h4>Kobe Bryant</h4>
            <a href="#"><img src="asset/img/kb24card 2.png" alt="rookie Kobe card" class="pict-card"></a>
            <p>149.99€</p>
            <p class="stock">Plus Disponible</p>
            <p>Carte rookie Kobe<br>Bryant sortie en 2003<br>en plastique premium.</p>
        </div>
        <div class="card">
            <h4>Trae Young</h4>
            <a href="#"><img src="asset/img/TY11card 2.png" alt="Trae Young card" class="pict-card"></a>
            <p>149.99€</p>
            <p class="stock">Plus que 3 Disponible</p>
            <p>Carte rookie Trae<br>Young sortie en 2003<br>en plastique premium.</p>
        </div>
    </div>
</div>