<?php
    $label = $_GET['label'];
    $manager = new Manager($pdo);
    $product = $manager->get($label);
    $content ="";
    $label = $_GET['label'];
    if (isset($_GET['session']) && $_GET['session'] == 'panier') {
        if ($product->quantite()>0){
            addArticle($label,1,$product->prix());
            $manager->updateQuantite($product,-1);
            header('location:bucket.php');
            exit();
        }
        else if ($product->quantite()<=0){
            $content ='<div style="background:tomato;padding:2%;">Désolé nous ne pouvons ajouter cette article à votre panier car il est indisponible pour le moment</div>';
    
        }
    }