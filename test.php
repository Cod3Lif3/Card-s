<?php
    include "config/teamplate/head.php";
    $stmt = $pdo -> prepare('SELECT id_produit,img_produit,label_produit, quantite_produit, prix_produit,descrip_product,label_stock FROM tb_product');
    $stmt -> execute();
    $result = $stmt->fetchAll();
    $manager = new ProductManager($pdo);
        echo '<pre>';
        print_r($manager->getList());
        echo '</pre>';
    
    