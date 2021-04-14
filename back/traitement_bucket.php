<?php
    $productmanager = new Manager($pdo);
    if (isset($_GET['panier']) && $_GET['panier'] == 'delete') {// si la suppression d'un article est demandé
        $productmanager->updateQuantite($productmanager->get($_SESSION['panier']['libelleProduit'][$_GET['i']]),$_SESSION['panier']['qteProduit'][$_GET['i']]);
        deleteArticle($_SESSION['panier']['libelleProduit'][$_GET['i']]);
        header('location:bucket.php?delete=success');
        exit();
    }
    if (isset($_GET['-'])){
        if($_SESSION['panier']['qteProduit'][$_GET['-']] > 1){
            $productmanager->updateQuantite($productmanager->get($_SESSION['panier']['libelleProduit'][$_GET['-']]),1);
            $_SESSION['panier']['qteProduit'][$_GET['-']] = $_SESSION['panier']['qteProduit'][$_GET['-']] - 1;
            if($productmanager->get($_SESSION['panier']['libelleProduit'][$_GET['-']])->quantite() > 0){
                $productmanager->updateStock($productmanager->get($_SESSION['panier']['libelleProduit'][$_GET['-']]),"En Stock");
            }
        }
        else{
            $productmanager->updateQuantite($productmanager->get($_SESSION['panier']['libelleProduit'][$_GET['-']]),$_SESSION['panier']['qteProduit'][$_GET['-']]);
            deleteArticle($_SESSION['panier']['libelleProduit'][$_GET['-']]);
        }
    }
    if (isset($_GET['+'])){
        if($productmanager->get($_SESSION['panier']['libelleProduit'][$_GET['+']])->quantite() >= 1){
            $productmanager->updateQuantite($productmanager->get($_SESSION['panier']['libelleProduit'][$_GET['+']]),-1);
            $_SESSION['panier']['qteProduit'][$_GET['+']] = $_SESSION['panier']['qteProduit'][$_GET['+']] + 1;
            if($productmanager->get($_SESSION['panier']['libelleProduit'][$_GET['+']])->quantite() == 0)
                $productmanager->updateStock($productmanager->get($_SESSION['panier']['libelleProduit'][$_GET['+']]),"Indisponible");
        }
    }
    bucketCreation();